<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpTransactional;

class MailChimpController extends Controller
{
    //Customer Template Function
    public function sendMailToClient($template_name, $subject, $email)
    {
        $key = env('MAILCHIMP_APIKEY');
        if(empty($key) === true){
            $key = 'F1RQZ9pABNL4T9LhQsav9g';
        }
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
            $mailchimp->setApiKey($key);
            $response = $mailchimp->messages->sendTemplate(["template_name" => $template_name, "template_content" => $template_content, "message" => $message]);
            if(isset($response) && $response != "" && isset($response[0]) && isset($response[0]->status)){
                $status = $response[0]->status;
            }
            else{
                $status = 'error';
            }
        } catch (Error $e) {
            $resp = $e->getMessage();
            $status = 'error';
        }
        return $status;
    }
}
