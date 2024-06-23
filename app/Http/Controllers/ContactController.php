<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store()
    {
        $mailToAddress = env('MAIL_TO_ADDRESS');
        if (!$mailToAddress) {
            return response()->json(['error' => 'MAIL_TO_ADDRESS não definido no arquivo .env'], 500);
        }
        $data = array();
        $data = [
            'success' => false,
            'errors' => []
        ];
        $data['errors'] = [];
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable|min:5|max:50',
            'message' => 'required|min:5|max:500'
        ];

        $validated = Validator::make(request()->all(), $rules);

        if ($validated->fails()) {
            $data['errors']['first_name'] = $validated->errors()->first('first_name');
            $data['errors']['last_name'] = $validated->errors()->first('last_name');
            $data['errors']['email'] = $validated->errors()->first('email');
            $data['errors']['subject'] = $validated->errors()->first('subject');
            $data['errors']['message'] = $validated->errors()->first('message');
        } else {

            $attributes = $validated->validated();
            Contact::create($attributes);

            Mail::to($mailToAddress)->send(new ContactMail(
                $attributes['first_name'],
                $attributes['last_name'],
                $attributes['email'],
                $attributes['subject'],
                $attributes['message']
            ));

            $data['success'] = true;
            $data['message'] = 'Sua mensagem foi enviada com sucesso!';
        }

        return response()->json($data);

    }
}