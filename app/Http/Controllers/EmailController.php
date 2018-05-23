<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class EmailController extends Controller
{
    public function sendEmail()
    {
//         SYNC Version
//         Mail::to('ehsan120@gmail.com')->send(new SendMailable());


        // A-SYNC VERSION
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);

        echo '<h1>email sent</h1>';
    }
}
