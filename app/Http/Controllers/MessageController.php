<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Breeder;
use App\Message;

class MessageController extends Controller
{
    //
    public function send(Request $request){
      $this->validate($request, [
          'your_email' => 'required|email',
          'personname' => 'required',
          'lid' => 'required|exists:breeders,randomKey',
          'message' => 'required'
      ]);

      $verify = \App\Breeder::where('randomKey',$request->lid)->first();
      if($verify == null){
        return redirect()->route('listingremoved');
      }

      $post = \App\Message::create([
        'sent' => '0',
        'msg_from' => $request->personname,
        'msg_from_email' => $request->your_email,
        'msg_to' => $request->lid,
        'msg' => $request->message,
        'msg_creation_date' => date('Y-m-d H:i:s'),
      ]);
      if($post->exists){
        Session::flash('success', 'Message Sent.');
      }else{
        Session::flash('status', 'There was an error sending your message.');
      }
      return redirect()->route('view-breeder',['url' => $verify->baseUrl]);

    }
}
