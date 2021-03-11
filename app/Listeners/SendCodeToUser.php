<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\GenerateCodeForUserAuth;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use Trez\RayganSms\Facades\RayganSms;


class SendCodeToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param GenerateCodeForUserAuth $event
     * @return void
     */
    public function handle($event, $message)
    {
        $user = $event->getUser();
//todo send code

//     Smsirlaravel::sendVerification($user->code,$user->mobile);

        //  SendSmsJob::dispatch($user->mobile, 'کد تایید تلگرام شما: ' . $event->getCode());

        RayganSms::sendMessage($user->mobile, $message);
    }
}
