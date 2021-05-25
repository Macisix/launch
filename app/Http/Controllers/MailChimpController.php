<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpTransactional;

class MailChimpController extends Controller
{
    //Customer Template Function
    public function sendMailToClient($template_name, $email)
    {
        $message = [
            "from_name" => env('MAIL_FROM_NAME'),
            "from_email" => env('MAIL_FROM_ADDRESS'),
            "subject" => "You’re on your way...  Haulmate",
            "to" => [
                [
                    "email" => $email,
                    "type" => "to"
                ]
            ],
            "global_merge_vars" => [
                [
                    "name" => "First_Name",
                    "content" => ''
                ],
            ],
            "tags" => [
                'mail-to-customer',
            ],
        ];

        $template_content = array(
            array(
                'name' => 'main',
                'content' => ''),
        );
        try {
            $mailchimp = new MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            //$status = $response[0]->status;
        } catch (Error $e) {
            $status = $e->getMessage();
        }
        return $status;
    }
}
