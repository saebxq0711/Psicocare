<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PsychologistController extends Controller
{
    /**
     * Mostrar los datos de la psicóloga.
     */
    public function index()
    {
        $psychologist = User::where('role_id', 2)->first();
        return view('admin.psychologist', compact('psychologist'));
    }

    /**
     * Registrar una nueva psicóloga (si no existe aún).
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|unique:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',      // al menos una mayúscula
                'regex:/[0-9]/',      // al menos un número
                'regex:/[@$!%*#?&]/', // al menos un caracter especial
            ],
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Rol psicóloga
            'state_id' => 1, // Estado activa (opcional)
            'avatar' => 'assets/img/user.png', // Avatar por defecto
        ]);

        return redirect()->route('admin.psychologist')->with('success', 'Psicóloga registrada correctamente.');
    }

    /**
     * Actualizar los datos de la psicóloga existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => "required|email|unique:users,email,{$id},id",
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // validación de imagen
        ]);

        $psychologist = User::where('id', $id)->where('role_id', 2)->firstOrFail();

        $psychologist->email = $request->email;

        if ($request->filled('password')) {
            $psychologist->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = 'avatar_' . $id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $filename); // guarda en /public/assets/img
            $psychologist->avatar = 'assets/img/' . $filename;
        }


        $psychologist->save();

        return redirect()->route('admin.psychologist')->with('success', 'Datos actualizados correctamente.');
    }
}
