<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store()
    {
        request()->validate(['email' => 'required|email', 'problem' => 'required']);

        /*$email = request('email');
        $problem = request('problem');
        Mail::raw('Funciona', function ($message) {
            $message->to(request('email'))
            ->subject('Contacto');
        });*/

        Mail::to(request('email'))
        ->send(new ContactMe(request('problem')));

        return redirect('/')
        ->with('message','¡Correo enviado!');
    }
}
