<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar la vista de registro
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Procesar el formulario de registro
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'digits_between:8,10', 'numeric', 'unique:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
            'birthdate' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'phone' => ['required', 'string', 'max:20'],
            'gender' => ['required', Rule::in(['Masculino', 'Femenino', 'Otro'])],
            'address' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
        ]);

        // Crear usuario con state_id = 1 (activo)
        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3, // Paciente
            'state_id' => 1, // Estado activo
            'avatar' => 'assets/img/user.png',
        ]);

        // Generar código único de pareja
        $coupleCode = $this->generateUniqueCoupleCode();

        // Crear paciente
        Patient::create([
            'user_id' => $user->id,
            'birth_date' => $request->birthdate,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'diagnosis' => null,
            'couple_code' => $coupleCode,
            'partner_patient_id' => null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Generar un código único para pareja
     */
    protected function generateUniqueCoupleCode(): string
    {
        do {
            $code = strtoupper(uniqid('CPL'));
        } while (Patient::where('couple_code', $code)->exists());

        return $code;
    }
}
