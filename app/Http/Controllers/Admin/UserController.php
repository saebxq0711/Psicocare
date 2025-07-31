<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('patient')->where('role_id', 3)->get();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[^a-zA-Z0-9]/'
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date|before:today',
            'gender' => 'nullable|string|in:Masculino,Femenino,Otro', // Add gender validation
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|integer|in:1,2,3', // Add role_id validation
        ]);

        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id; // Use requested role_id
        $user->state_id = 1; // activo por defecto

        // Procesar avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = 'avatar_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $user->avatar = 'assets/img/' . $imageName;
        } else {
            $user->avatar = 'assets/img/user.png';
        }

        $user->save();

        // Crear datos de paciente asociados solo si el rol es Paciente
        if ($user->role_id == 3) {
            $user->patient()->create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'occupation' => $request->occupation,
                'birth_date' => $request->birthdate,
                'gender' => $request->gender, // Add gender
                'couple_code' => $this->generateUniqueCoupleCode(),
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'Usuario registrado correctamente');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[^a-zA-Z0-9]/'
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date|before:today',
            'gender' => 'nullable|string|in:Masculino,Femenino,Otro', 
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($request->id);
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = 'avatar_' . $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $user->avatar = 'assets/img/' . $imageName;
        }

        $user->save();

        // Actualizar datos del paciente si el usuario tiene un registro de paciente
        if ($user->patient) {
            $user->patient()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'occupation' => $request->occupation,
                    'birth_date' => $request->birthdate,
                    'gender' => $request->gender, // Add gender
                    'updated_at' => now(),
                ]
            );
        }

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente');
    }

    public function deactivate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id);
        $user->state_id = 2; // Inactivo
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Usuario desactivado correctamente.');
    }

    public function activate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id);
        $user->state_id = 1; // Activo
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Usuario activado correctamente.');
    }

    private function generateUniqueCoupleCode()
    {
        do {
            $code = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
        } while (\App\Models\Patient::where('couple_code', $code)->exists());
        return $code;
    }
}
