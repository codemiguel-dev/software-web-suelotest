<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendMail()
    {
        $destails = [
            'title' => 'Correo de un amigo',
            'body' => 'Ejemplo de envio de correo'
        ];

        Mail::to('jose.calderon15@inacapmail.cl')->send(new TestMail($destails));
        return 'correo enviado';
    }
}
