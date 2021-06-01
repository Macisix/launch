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
                'content' => 'Key value'
            ),
        );

        $sendingData = [
            "setApiKey" => env('MAILCHIMP_APIKEY'),
            "template_name" => $template_name,
            "template_content" => $template_content,
            "message" => $message,
        ];
        try {
            $status = '';
            //$mailchimp = new MailchimpTransactional\ApiClient();
            //$mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            //$resp = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            echo env('MAILCHIMP_APIKEY');
            $mailchimp = new MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            $response = $mailchimp->messages->sendTemplate([
                "template_name" => $template_name,
                "template_content" => $template_content,
                "message" => $message,
            ]);

        } catch (Error $e) {
            $resp = $e->getMessage();
        }
        die('Call');
    }
}
