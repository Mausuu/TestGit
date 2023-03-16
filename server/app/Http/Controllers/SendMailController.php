<?php

namespace App\Http\Controllers;

use App\Mail\DemoSendmail;
use Illuminate\Http\Request;
use App\Models\Order;
use Mail;

class SendMailController extends Controller
{
    //
    function demo1()
    {
        
        Mail::to('ntnguyen09032001@gmail.com')->send(new DemoSendmail);
    }
}
