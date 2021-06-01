<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpTransactional;

class MailChimpController extends Controller
{
    //Customer Template Function
    public function sendMailToClient($template_name, $subject, $email)
    {
        $message = [
            "from_name" => env('MAIL_FROM_NAME'),
            "from_email" => env('MAIL_FROM_ADDRESS'),
            "subject" => $subject,
            "to" => [
                [
                    "email" => $email,
                    "type" => "to"
                ]
            ],
            "tags" => [
                'template-test',
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
            $resp = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
        } catch (Error $e) {
            $resp = $e->getMessage();
        }
        echo '<pre>';print_r($resp );echo '</pre>';die('Call');
    }
}
