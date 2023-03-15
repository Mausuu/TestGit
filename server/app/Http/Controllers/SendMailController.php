<?php

namespace App\Http\Controllers;

use App\Mail\DemoSendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SendMailController extends Controller
{
    //
    function demo1()
    {
        //dia  chi  khach hang
        Mail::to('nguyen.nhut.99.2017@gmail.com')->send(new DemoSendmail);
    }
}
