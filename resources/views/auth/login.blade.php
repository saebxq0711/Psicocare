@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl border border-emerald-100 animate-fadeInUp">
            <div class="text-center mb-8">
                <img src="/assets/img/logo.png?height=64&width=64" alt="PsicoCare Logo" class="mx-auto h-16 w-16 mb-4">
                <h1 class="text-4xl font-extrabold gradient-text mb-2">Iniciar Sesión</h1>
                <p class="text-gray-600 text-lg">Accede a tu cuenta de PsicoCare</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if ($errors->has('inactive'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" role="alert">
                    <strong class="font-bold">¡Atención!</strong>
                    <span class="block sm:inline">{{ $errors->first('inactive') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" class="mb-2 text-gray-700 font-medium" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <x-text-input id="email"
                            class="block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            placeholder="tu@ejemplo.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div x-data="{{ json_encode(['showPassword' => false]) }}">
                    <x-input-label for="password" :value="__('Contraseña')" class="mb-2 text-gray-700 font-medium" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        {{-- CAMBIO: Usar x-bind:type en lugar de :type --}}
                        <x-text-input id="password"
                            class="block w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                            x-bind:type="showPassword ? 'text' : 'password'" name="password" required
                            autocomplete="current-password" placeholder="••••••••" />
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer"
                            @click="showPassword = !showPassword">
                            {{-- CAMBIO: Añadir clase de color al icono --}}
                            <i class="fas" x-bind:class="{ 'fa-eye': !showPassword, 'fa-eye-slash': showPassword }"
                                class="text-gray-500 hover:text-gray-700"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-[#10b981] shadow-sm focus:ring-[#10b981] focus:ring-offset-0 transition-colors duration-200"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-700">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-emerald-600 hover:text-emerald-800 hover:underline font-medium transition-colors duration-200"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <x-primary-button
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-base font-semibold text-white bg-[#10b981] hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#10b981] transition-all duration-300 transform hover:scale-[1.01]">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-gray-600 text-sm">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}"
                            class="text-emerald-600 hover:text-emerald-800 hover:underline font-medium transition-colors duration-200">
                            {{ __('Regístrate aquí') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection