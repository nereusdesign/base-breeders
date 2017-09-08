<?php
namespace App;

use Illuminate\Console\Command;
use Mail;

class Automatic extends Command {

    protected $name = 'test';

    protected $description = 'This is a test.';

    public function __construct()
    {
        parent::__construct();
    }

    public function sendEmail()
    {
            $title = "test title";
            $content = "email body";
      if(FALSE){
            Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
              {
                $message->from('contact@findyourbreeder.com', 'Test Emailer');
                $message->to('marcust3355@gmail.com');
              });
        }
          //  mail("marcust3355@gmail.com","Old school mailer","This is the body");
    }
}
