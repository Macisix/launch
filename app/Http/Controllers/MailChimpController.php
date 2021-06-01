<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpTransactional;

class MailChimpController extends Controller
{
    //Customer Template Function
    public function sendMailToClient($template_name, $subject, $email)
    {
        $from_name = env('MAIL_FROM_NAME');
        if(empty($from_name) === true){
            $from_name = 'Mike Male';
        }
        $from_email = env('MAIL_FROM_ADDRESS');
        if(empty($from_email) === true){
            $from_email = 'move@haulmate.co';
        }
        $message = [
            "from_name" => $from_name,
            "from_email" => $from_email,
            "subject" => $subject,
            "to" => [
                [
                    "email" => $email,
                    "type" => "to"
                ]
            ],
            "tags" => [
                'mail-to-customer',
            ],
        ];

        $template_content = array(
            array(
                'name' => 'main',
                'content' => ''
            ),
        );

        try {
            $status = '';
            $mailchimp = new MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            $response = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            echo '<pre>';print_r($response );echo '</pre>';die('Ca232ll');
        } catch (Error $e) {
            $resp = $e->getMessage();
        }
        die('Call');
    }
}
