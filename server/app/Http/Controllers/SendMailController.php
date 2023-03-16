<?php

namespace App\Http\Controllers;

use App\Mail\DemoSendmail;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Order;
use Mail;
=======
use Illuminate\Support\Facades\Mail;

>>>>>>> 7aa7b4c739fcd2d0299b3dc1838e19202d44148e

class SendMailController extends Controller
{
    //
    function demo1()
    {
        
        Mail::to('ntnguyen09032001@gmail.com')->send(new DemoSendmail);
    }
}
