<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;

/**
 *  Mailer
 */
class Mailer
{
    protected $mailer;
    function __construct()
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->IsSMTP();
        $mail->Host = config("mail.host");//"smtp.gmail.com";//$this->host;
        $mail->SMTPAuth = true;
        $mail->Username = config("mail.username");//"autoassistant010@gmail.com";//$this->mail_username;
        $mail->Password = config("mail.password");//"ItsSecureEnough&*";///$this->mail_password;
        $mail->SMTPSecure = config("mail.encryption");//"tls";//$this->mail_encryption;
        $mail->Port =  config("mail.port");//587; //$this->port;
        $mail->setFrom(config("mail.from.address"), config("mail.from.name"));
        // $mail->addReplyTo('autoassistant010@gmail.com', 'AutoAssistant');
        $mail->isHTML(true);
        $this->mailer = $mail;
    }
    public function getMailer()
    {
        return $this->mailer;
    }
}