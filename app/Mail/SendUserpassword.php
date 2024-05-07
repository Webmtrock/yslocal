<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserpassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    
        $data=$this->data;
        
        $mail_data = $this->from($this->data['from_email'],$this->data['name'])
        ->subject($this->data['subject']);
        $mail_data->view('mails.user-password',compact('data'));
        return $mail_data;
    }
}
