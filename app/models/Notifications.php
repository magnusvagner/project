<?php
namespace App\models;

class Notifications
{
    private Mailer $mailer;
    public function __construct(Mailer $mailer)
{
    $this->mailer = $mailer;
}

public  function confirm($email, $selector, $token){
    $message = 'http://example2/verify_email?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
    $this->mailer->send($email, $message );
}

}