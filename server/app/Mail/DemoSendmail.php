<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Cart;
class DemoSendmail extends Mailable
{
    public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject="Cảm ơn đã đặt hàng tại cửa hàng";
        // $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //trả về một mẫu mail với địa chỉ email, subject, nội dung từ view send_mail
        return $this->subject($this->subject)->from('ntnguyen09032001@gmail.com')->view('mail.demo');
    }
}
