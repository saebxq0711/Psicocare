@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-4xl bg-white p-8 rounded-2xl shadow-2xl border border-emerald-100 animate-fadeInUp">
            <div class="text-center mb-8">
                <img src="/assets/img/logo.png?height=64&width=64" alt="PsicoCare Logo" class="mx-auto h-16 w-16 mb-4">
                <h1 class="text-4xl font-extrabold gradient-text mb-2">Crear Cuenta</h1>
                <p class="text-gray-600 text-lg">Únete a la comunidad de PsicoCare</p>
            </div>

            {{-- CAMBIO: x-data principal en el formulario para gestionar el estado de las contraseñas --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-6" x-data="{
                    showPassword: false,
                    password: '',
                    passwordTouched: false, // Controla si el campo de contraseña ha sido tocado

                    showConfirmPassword: false,
                    passwordConfirmation: '',
                    confirmPasswordTouched: false, // Controla si el campo de confirmación ha sido tocado

                    // Propiedad computada para la validación de la contraseña
                    get isPasswordValid() {
                        const hasUppercase = /[A-Z]/.test(this.password);
                        const hasNumber = /\d/.test(this.password);
                        const hasSpecialChar = /[^A-Za-z\d]/.test(this.password);
                        const isMinLength = this.password.length >= 8;
                        return hasUppercase && hasNumber && hasSpecialChar && isMinLength;
                    },
                    // Propiedad computada para la coincidencia de contraseñas
                    get passwordsMatch() {
                        return this.password === this.passwordConfirmation && this.passwordConfirmation.length > 0;
                    }
                }">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Número de identificación -->
                    <div>
                        <x-input-label for="id" :value="__('Número de Identificación')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <x-text-input id="id" name="id" type="text"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('id')" required pattern="\d{8,10}" title="Debe contener entre 8 y 10 dígitos"
                                placeholder="Ej: 123456789" />
                        </div>
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    </div>

                    <!-- Nombres completos -->
                    <div>
                        <x-input-label for="name" :value="__('Nombres Completos')" class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <x-text-input id="name" name="name" type="text"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('name')" required placeholder="Nombre Apellido" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Correo Electrónico')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <x-text-input id="email" name="email" type="email"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('email')" required placeholder="tu@ejemplo.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <x-input-label for="password" :value="__('Contraseña')" class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <x-text-input id="password" name="password"
                                class="block mt-1 w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                x-bind:type="showPassword ? 'text' : 'password'" x-model="password"
                                @input="passwordTouched = true" {{-- Marca como tocado al escribir --}}
                                @focus="passwordTouched = true" {{-- Marca como tocado al enfocar --}}
                                @blur="if (password.length === 0) passwordTouched = false" {{-- Oculta si se desenfoca y
                                está vacío --}} required pattern="(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}"
                                title="Debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial"
                                autocomplete="new-password" placeholder="••••••••" />
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer"
                                @click="showPassword = !showPassword">
                                <i class="fas" x-bind:class="{ 'fa-eye': !showPassword, 'fa-eye-slash': showPassword }"
                                    class="text-gray-400 hover:text-gray-600"></i>
                            </div>
                        </div>
                        {{-- CAMBIO: Mensaje de validación consolidado y condicional --}}
                        <div x-show="passwordTouched && password.length > 0" x-transition class="mt-2 text-sm">
                            <p :class="isPasswordValid ? 'text-green-600' : 'text-red-600'">
                                <i class="fas mr-1" :class="isPasswordValid ? 'fa-check-circle' : 'fa-times-circle'"></i>
                                Mín. 8 caracteres, 1 mayúscula, 1 número, 1 especial.
                            </p>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <x-text-input id="password_confirmation" name="password_confirmation"
                                class="block mt-1 w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                x-bind:type="showConfirmPassword ? 'text' : 'password'" x-model="passwordConfirmation"
                                @input="confirmPasswordTouched = true" {{-- Marca como tocado al escribir --}}
                                @focus="confirmPasswordTouched = true" {{-- Marca como tocado al enfocar --}}
                                @blur="if (passwordConfirmation.length === 0) confirmPasswordTouched = false" {{-- Oculta si
                                se desenfoca y está vacío --}} required autocomplete="new-password"
                                placeholder="••••••••" />
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer"
                                @click="showConfirmPassword = !showConfirmPassword">
                                <i class="fas"
                                    x-bind:class="{ 'fa-eye': !showConfirmPassword, 'fa-eye-slash': showConfirmPassword }"
                                    class="text-gray-400 hover:text-gray-600"></i>
                            </div>
                        </div>
                        {{-- CAMBIO: Mensaje de validación para coincidencia, condicional --}}
                        <div x-show="confirmPasswordTouched && passwordConfirmation.length > 0" x-transition
                            class="mt-2 text-sm">
                            <p :class="passwordsMatch ? 'text-green-600' : 'text-red-600'">
                                <i class="fas mr-1" :class="passwordsMatch ? 'fa-check-circle' : 'fa-times-circle'"></i>
                                Las contraseñas coinciden
                            </p>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <x-input-label for="birthdate" :value="__('Fecha de Nacimiento')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-gray-400"></i>
                            </div>
                            <x-text-input id="birthdate" name="birthdate" type="date"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                required max="{{ now()->subYears(18)->format('Y-m-d') }}" />
                        </div>
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <x-input-label for="phone" :value="__('Número de Teléfono')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <x-text-input id="phone" name="phone" type="tel"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('phone')" required placeholder="Ej: 3001234567" />
                        </div>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Género -->
                    <div>
                        <x-input-label for="gender" :value="__('Género')" class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-venus-mars text-gray-400"></i>
                            </div>
                            <select id="gender" name="gender"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                required>
                                <option value="">Seleccione...</option>
                                <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Dirección -->
                    <div>
                        <x-input-label for="address" :value="__('Dirección de Residencia')"
                            class="mb-2 text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <x-text-input id="address" name="address" type="text"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('address')" required placeholder="Calle 123 #45-67" />
                        </div>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Ocupación -->
                    <div>
                        <x-input-label for="occupation" :value="__('Ocupación')" class="mb-2 text-gray-700 font-medium" autocomplete="off"/>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-briefcase text-gray-400"></i>
                            </div>
                            <x-text-input id="occupation" name="occupation" type="text"
                                class="block mt-1 w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#10b981] focus:border-transparent transition-all duration-200 text-base"
                                :value="old('occupation')" required placeholder="Estudiante, Ingeniero, etc." />
                        </div>
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>
                </div>

                <!-- Botón de registrar -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-8 pt-4 border-t border-gray-200">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#10b981] transition-colors duration-200 mb-4 sm:mb-0"
                        href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>

                    <x-primary-button
                        class="ms-0 sm:ms-4 w-full sm:w-auto flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-base font-semibold text-white bg-[#10b981] hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#10b981] transition-all duration-300 transform hover:scale-[1.01]">
                        {{ __('Registrarse') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection