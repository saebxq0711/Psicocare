<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\PsychologistController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;

// 🌐 Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::view('/sobre-mi', 'sobre-mi')->name('sobre-mi');
Route::view('/contacto', 'contacto')->name('contacto');
Route::post('/contacto', [PublicController::class, 'submitContact'])->name('contact.submit');

// 👥 Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/psychologist/dashboard', fn() => view('psychologist.dashboard'))->name('psychologist.dashboard');
    Route::get('/patient/dashboard', fn() => view('patient.dashboard'))->name('patient.dashboard');
});

// 🚦 Redirección al dashboard según rol
Route::get('/dashboard', function () {
    $user = auth()->user();

    return match ($user->role_id) {
        1 => redirect()->route('admin.dashboard'),
        2 => redirect()->route('psychologist.dashboard'),
        3 => redirect()->route('patient.dashboard'),
        default => redirect()->route('login'),
    };
})->middleware(['auth'])->name('dashboard');

// 🔒 Rutas protegidas solo para Admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {

    // 👩‍⚕️ Gestión de Psicóloga
    Route::get('/admin/psicologa', [PsychologistController::class, 'index'])->name('admin.psychologist');
    Route::post('/admin/psicologa', [PsychologistController::class, 'store'])->name('admin.psychologist.store');
    Route::put('/admin/psicologa/{id}', [PsychologistController::class, 'update'])->name('admin.psychologist.update');

    // 👥 Gestión de Usuarios (Pacientes)
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users');
    Route::put('/admin/usuarios/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/deactivate', [UserController::class, 'deactivate'])->name('admin.users.deactivate');
    Route::post('/admin/users/activate', [UserController::class, 'activate'])->name('admin.users.activate');

    // 📅 Vistas de agendamiento y sesiones
    Route::get('/admin/agendamiento', fn() => view('admin.appointments'))->name('admin.appointments');
    Route::get('/admin/sesiones', fn() => view('admin.sessions'))->name('admin.sessions');
});

// 🤖 Chatbot IA
Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');

// 🔐 Rutas de autenticación (login, register, etc.)
require __DIR__ . '/auth.php';
