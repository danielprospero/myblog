<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{
    
    use HasFactory;
    protected $table = 'newsletters';
    protected $fillable = ['email'];
    
    public static function store($request)
    {
        self::create( $request->all() );
    

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix')
        ]);

        $list_id = '1cb1a46505';

        try {
            $response = $mailchimp->lists->addListMember($list_id, [
                'email_address' => $request->input('email'),
                'status' => 'subscribed'
            ]);
            return response()->json(['success' => 'Obrigado por se inscrever!'], 200);
        } catch (\MailchimpMarketing\ApiException $e) {
            return response()->json(['error' => 'Ocorreu um erro ao tentar se inscrever!'], 400);
        }
    }
}
