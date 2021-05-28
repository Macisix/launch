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
            "global_merge_vars" => [
                [
                    "name" => "First_Name",
                    "content" => 'Mike'
                ],
            ],
        ];

        $template_content = array(
            "tags" => [
                'mail-to-customer',
            ]/*,
            array(
                'name' => 'main',
                'content' => ''
            ),*/
        );

        try {
            $status = '';
            $mailchimp = new MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            echo '<pre>';print_r($template_content );echo '</pre>';
            $resp = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            echo '1';
            echo '<pre>';print_r($resp );echo '</pre>';
        } catch (Error $e) {
            $resp2 = $e->getMessage();
            echo '2';
            echo '<pre>';print_r($resp );echo '</pre>';
        }

die('Call');
    }
}
