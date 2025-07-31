<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function submitContact(Request $request)
    {
        // Aquí puedes enviar correo o guardar el mensaje en DB
        // Por ahora, solo volvemos con un mensaje
        return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente.');
    }
}
