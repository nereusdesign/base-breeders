<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Session;
use DB;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\Breed;
use App\Breeder;
use App\Listing;
use App\breederPictures;
use App\User;
use App\Account;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folder_path = public_path()."/images/static/"; // in my test case it's under /public folder
        $files = preg_grep('~\.(jpeg|jpg|png)$~', scandir($folder_path));
        $randomFile = $files[array_rand($files)];
        $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
        $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
        $featured = \App\Breeder::inRandomOrder()->select('breeders.*','zip_code.*','breeds.id as bid','breeds.url as burl','breeds.breedName','breeds.breedType')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->limit(9)->get();


        $pix = null;
        $haslistings = array();
        foreach($featured as $b){
          $getpic = null;
          $checkforlistings = null;
          $bid = $b->id;
          $getpic = \App\breederPictures::where([['breeder_id','=',$bid],['isMain','=','1']])->first();
          $checkforlistings = \App\Listing::where('breeder_id',$bid)->first();
          if($checkforlistings){
            if($b->breedType == 'cat'){
              $haslistings[$bid] = 'Has Kittens';
            }else{
              $haslistings[$bid] = 'Has Puppies';
            }
          }
          if($getpic){
            if(file_exists('storage/'.$getpic->filename)){
            $pix[$bid] = 'storage/'.$getpic->filename;
          }else{
            $pix[$bid] = 'storage/photos/default.jpg';
          }
          }else{
            $pix[$bid] = 'storage/photos/default.jpg';
          }
        }

        return view('home',['mainimage' => $randomFile,'dogarr' => $dogarr,'catarr' => $catarr,'featured' => $featured,'pix' => $pix,'haslistings' => $haslistings]);
    }

    public function checkout(){
      if(!Auth::check()){
        return redirect()->route('member-only');
      }

        $data = DB::table('accounts')->get();
        foreach($data as $value){
          $accounts[$value->accountKey] = $value->accountName." - $".$value->amount;
        }


      $error = '';
      $success = '';
      $accountName = '';
      $stripamount = '';
      $amount = '';
      $payerror = FALSE;
      $payKey = null;
      $payKey = Account::where('accountKey',Auth::user()->payKey)->first();
      switch(env('STRIPE_STATUS','TEST')){
        case "LIVE":
          $publishable = env('STRIPE_PUBLIC_KEY_LIVE','NoKey');
        break;
        default:
          $publishable = env('STRIPE_PUBLIC_KEY_TEST','NoKey');
        break;
      }
      if(Auth::user()){
        if(Auth::user()->accountActive == '0'){
            $thisyear = date('Y');
            $addayear = $thisyear + 21;
            while($thisyear < $addayear){
              $years[] = $thisyear;
              $thisyear++;
            }
            if($payKey == null){
              $payerror = TRUE;
            }else{
              $accountName = $payKey->accountName;
              $stripePayAmount = $payKey->stripePayAmount;
              $amount = $payKey->amount;
            }

            return view('checkout',['years' => $years,'success' => $success,'err' =>$error,'publishable' => $publishable,'payerror' => $payerror,'accounts' => $accounts,'amount' => $amount,'stripePayAmount' => $stripePayAmount,'accountName' => $accountName]);
        }else{
          return redirect()->route('home');
        }
      }else{
        return redirect()->route('home');
      }
    }

    public function postOrder(Request $request)
    {
          if(!Auth::check()){
            return redirect()->route('member-only');
          }
        switch(env('STRIPE_STATUS','TEST')){
          case "LIVE":
            $publishable = env('STRIPE_PUBLIC_KEY_LIVE','NoKey');
            $secret = env('STRIPE_PRIVATE_KEY_LIVE','NoKey');
          break;
          default:
            $publishable = env('STRIPE_PUBLIC_KEY_TEST','NoKey');
            $secret = env('STRIPE_PRIVATE_KEY_TEST','NoKey');
          break;
        }
        $user = User::find(Auth::id());
        $payKey = Account::where('accountKey',$user->payKey)->first();


        Stripe::setApiKey($secret);
        $error = '';
        $success = '';
        try {
          if($payKey == null){
            throw new Exception("This was not a valid account option. Your account is currently under review.");
          }

          $customer = Customer::create(array(
                             "email" => Auth::user()->email,
                             "source" => $request->stripeToken
                             ));

          $customerCharge = Charge::create(array(
                             "customer" => $customer->id,
                             "amount" => 999,
                             "currency" => "usd",
                             ));

          $user->accountActive = '1';
          if($user->save()){
            Session::flash('success', 'Your payment was successful and your account has been activated.');
            return redirect()->route('listings');
          }else{
            Session::flash('status', 'Your payment was successful your account is in the process of being reviewed and activated. Please come back after your review to create your listings.');
            return redirect()->route('home');
          }
        } catch (Exception $e) {
          $error = $e->getMessage();
        }

        $thisyear = date('Y');
        $addayear = $thisyear + 21;
        while($thisyear < $addayear){
          $years[] = $thisyear;
          $thisyear++;
        }
        Session::flash('status', $error);
        return redirect()->route('checkout');

    }

}
