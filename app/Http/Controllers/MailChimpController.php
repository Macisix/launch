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
            $status = '';
            $mailchimp = new MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(env('MAILCHIMP_APIKEY'));
            $resp = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            echo '<pre>';print_r($resp[0] );echo '</pre>';
            /*if(isset($response) && empty($response) === false && empty($response[0]) === false){
                $status = $response[0]->status;
            }*/
        } catch (Error $e) {
            echo '<pre>';print_r($e->getMessage() );echo '</pre>';
            $status = $e->getMessage();
        }
        die('Call');
    }
}
