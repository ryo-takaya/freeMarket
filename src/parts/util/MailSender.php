<?php

namespace App\Parts\Util;

class MailSender{

    static public function sendEmail($to,$sub,$msg,$from)
    {
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');
        return mb_send_mail($to,$sub,$msg, "From: ". $from);
    }
}
