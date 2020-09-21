<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendCode extends Mailable
{
    use Queueable, SerializesModels;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        //
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return view $thisubject('纯文本信息邮件测试')("index.reg.emailcode",['code'=>$this->code]);
        // return $this->view('view.name');
        return $this->subject("微商城验证码")->view('index.reg.emailcode',['code'=>$this->code]);
    }
}
