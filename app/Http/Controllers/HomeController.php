<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailChimpController;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $messages = [
            'email.required' => "Please type a valid email address!"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ], $messages);
        if ($validator->fails()) {
            return back()->with('error', 'Please type a valid email address!');
        }
        else{
            $mailc = new MailChimpController();

            $subject = 'Moving sucks! Organise your move in 90 seconds';
            $template = 'move';
            echo $from_name = env('MAIL_FROM_NAME');
            echo $from_email = env('MAIL_FROM_ADDRESS');die('Call232321');
            //Send email to User
            $mailc->sendMailToClient($template, $subject, $email, $from_email, $from_name);
            return redirect()->back()->with('message', 'Thanks for signing up, We will notify you on your email when we go live in June');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
