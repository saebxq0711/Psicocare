@extends('layouts.app')

@section('title', 'Gestión de la Psicóloga - PsicoCare Admin')

@section('content')
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center animate-fade-in-down">Gestión de la Psicóloga</h1>

        @if(session('success'))
            <div id="successMessage"
                class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 flex items-center gap-3 shadow-md animate-fade-in">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if(!$psychologist)
            <div
                class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto transition-all duration-300 hover:shadow-xl animate-fade-in">
                <p class="text-gray-700 mb-6 text-lg">No hay una psicóloga registrada aún. Puedes registrarla aquí:</p>
                <form action="{{ route('admin.psychologist.store') }}" method="POST" class="space-y-6"
                    onsubmit="return validateRegisterPsychologistForm(event)">
                    @csrf
                    <div>
                        <label for="registerPsyId" class="block text-sm font-medium text-gray-700 mb-2">Número de
                            identificación</label>
                        <div class="relative">
                            <input type="text" name="id" id="registerPsyId"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'number')">
                            <i class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p id="registerPsyIdError" class="text-red-500 text-sm mt-1 hidden">Solo números.</p>
                    </div>
                    <div>
                        <label for="registerPsyName" class="block text-sm font-medium text-gray-700 mb-2">Nombre
                            completo</label>
                        <div class="relative">
                            <input type="text" name="name" id="registerPsyName"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'name')">
                            <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p id="registerPsyNameError" class="text-red-500 text-sm mt-1 hidden">Solo letras y espacios.</p>
                    </div>
                    <div>
                        <label for="registerPsyEmail" class="block text-sm font-medium text-gray-700 mb-2">Correo
                            electrónico</label>
                        <div class="relative">
                            <input type="email" name="email" id="registerPsyEmail"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'email')">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p id="registerPsyEmailError" class="text-red-500 text-sm mt-1 hidden">Formato de email inválido.</p>
                    </div>
                    <div>
                        <label for="registerPsyPassword" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password" id="registerPsyPassword"
                                class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'password')">
                            <i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer"
                                onclick="togglePasswordVisibility('registerPsyPassword', this)"></i>
                        </div>
                        <p id="registerPsyPasswordError" class="text-red-500 text-sm mt-1 hidden">Mín. 8 caracteres, 1
                            mayúscula, 1 número, 1 especial.</p>
                        <small class="text-gray-500 mt-2 block">Debe tener al menos 8 caracteres, una mayúscula, un número y un
                            símbolo.</small>
                    </div>
                    <div>
                        <label for="registerPsyPasswordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmar
                            Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="registerPsyPasswordConfirm"
                                class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'passwordConfirm', 'registerPsyPassword')">
                            <i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer"
                                onclick="togglePasswordVisibility('registerPsyPasswordConfirm', this)"></i>
                        </div>
                        <p id="registerPsyPasswordConfirmError" class="text-red-500 text-sm mt-1 hidden">Las contraseñas no
                            coinciden.</p>
                    </div>
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white py-3 px-6 rounded-xl text-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <i class="fas fa-user-plus"></i>
                        Registrar Psicóloga
                    </button>
                </form>
            </div>
        @else
            <div
                class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto space-y-6 transition-all duration-300 hover:shadow-xl animate-fade-in">
                <p class="text-gray-700 mb-6 text-lg">Actualmente hay una psicóloga registrada. Puedes editar sus datos:</p>
                <div class="flex flex-col sm:flex-row items-center space-x-6 border-b pb-6 border-gray-200">
                    <img src="{{ $psychologist->avatar ? asset($psychologist->avatar) : '/assets/img/user.png?height=96&width=96&text=Psicóloga' }}"
                        alt="Avatar" class="w-24 h-24 rounded-full border-4 border-emerald-300 object-cover shadow-md">
                    <div>
                        <p class="font-extrabold text-3xl text-gray-900">{{ $psychologist->name }}</p>
                        <p class="text-gray-600 text-lg mt-1">ID: {{ $psychologist->id }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.psychologist.update', $psychologist->id) }}" method="POST" class="space-y-6 mt-6"
                    enctype="multipart/form-data" onsubmit="return validateEditPsychologistForm(event)">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="editPsyEmail" class="block text-sm font-medium text-gray-700 mb-2">Correo
                            electrónico</label>
                        <div class="relative">
                            <input type="email" name="email" id="editPsyEmail" value="{{ $psychologist->email }}"
                                class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                                required oninput="validateInput(this, 'email')">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p id="editPsyEmailError" class="text-red-500 text-sm mt-1 hidden">Formato de email inválido.</p>
                    </div>
                    <div>
                        <label for="editPsyPassword" class="block text-sm font-medium text-gray-700 mb-2">Nueva contraseña
                            (opcional)</label>
                        <div class="relative">
                            <input type="password" name="password" id="editPsyPassword"
                                class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                                oninput="validateInput(this, 'password')">
                            <i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer"
                                onclick="togglePasswordVisibility('editPsyPassword', this)"></i>
                        </div>
                        <p id="editPsyPasswordError" class="text-red-500 text-sm mt-1 hidden">Mín. 8 caracteres, 1 mayúscula, 1
                            número, 1 especial.</p>
                        <small class="text-gray-500 mt-2 block">Dejar en blanco si no deseas cambiarla. Debe tener al menos 8
                            caracteres, una mayúscula, un número y un símbolo.</small>
                    </div>
                    <div>
                        <label for="editPsyPasswordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmar Nueva
                            Contraseña</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="editPsyPasswordConfirm"
                                class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                                oninput="validateInput(this, 'passwordConfirm', 'editPsyPassword')">
                            <i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer"
                                onclick="togglePasswordVisibility('editPsyPasswordConfirm', this)"></i>
                        </div>
                        <p id="editPsyPasswordConfirmError" class="text-red-500 text-sm mt-1 hidden">Las contraseñas no
                            coinciden.</p>
                    </div>
                    <div>
                        <label for="editPsyAvatar" class="block text-sm font-medium text-gray-700 mb-2">Avatar</label>
                        <div class="flex items-center space-x-2">
                            <label for="editPsyAvatar"
                                class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2">
                                <i class="fas fa-upload"></i> Subir archivo
                            </label>
                            <span id="editPsyAvatarFileName" class="text-gray-600 text-sm truncate max-w-[calc(100%-120px)]">No
                                file chosen</span>
                            <input type="file" name="avatar" id="editPsyAvatar" class="hidden"
                                onchange="updateFileName(this, 'editPsyAvatarFileName')">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-xl text-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <i class="fas fa-save"></i>
                        Actualizar Datos
                    </button>
                </form>
            </div>
        @endif
    </div>

    {{-- Scripts --}}
    <script>
        // Helper function to update file name display
        function updateFileName(inputElement, displayElementId) {
            const displayElement = document.getElementById(displayElementId);
            if (inputElement.files && inputElement.files.length > 0) {
                displayElement.textContent = inputElement.files[0].name;
            } else {
                displayElement.textContent = 'No file chosen';
            }
        }

        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, iconElement) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                iconElement.classList.remove('fa-eye');
                iconElement.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                iconElement.classList.remove('fa-eye-slash');
                iconElement.classList.add('fa-eye');
            }
        }

        // Generic validation function
        function validateInput(inputElement, type, relatedInputId = null) {
            const value = inputElement.value.trim();
            let isValid = true;
            let errorMessage = '';
            const errorElement = document.getElementById(inputElement.id + 'Error');

            // Determine focus color based on form context
            const isEditForm = inputElement.closest('form[action*="update"]');
            const focusColorClass = isEditForm ? 'focus:border-blue-500 focus:ring-blue-500' : 'focus:border-emerald-500 focus:ring-emerald-500';

            // Remove previous error styling and reset to default
            inputElement.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
            inputElement.classList.add('border-gray-300', ...focusColorClass.split(' '));

            switch (type) {
                case 'number':
                    isValid = /^[0-9]*$/.test(value);
                    errorMessage = 'Solo números.';
                    break;
                case 'name':
                    isValid = /^[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]*$/.test(value);
                    errorMessage = 'Solo letras y espacios.';
                    break;
                case 'email':
                    isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                    errorMessage = 'Formato de email inválido.';
                    break;
                case 'password':
                    // At least 8 characters, one uppercase, one number, one special character
                    isValid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value) || value === ''; // Allow empty for optional password
                    errorMessage = 'Mín. 8 caracteres, 1 mayúscula, 1 número, 1 especial.';
                    break;
                case 'passwordConfirm':
                    const relatedInput = document.getElementById(relatedInputId);
                    isValid = value === relatedInput.value;
                    errorMessage = 'Las contraseñas no coinciden.';
                    break;
            }

            if (!isValid) {
                inputElement.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                inputElement.classList.remove(...focusColorClass.split(' ')); // Remove normal focus color
                if (errorElement) {
                    errorElement.textContent = errorMessage;
                    errorElement.classList.remove('hidden');
                }
            } else {
                if (errorElement) errorElement.classList.add('hidden');
            }
            return isValid;
        }

        // Helper to validate all fields in a form
        function validateFormFields(fieldsConfig) {
            let allValid = true;
            fieldsConfig.forEach(field => {
                const inputElement = document.getElementById(field.id);
                if (inputElement) {
                    // For required fields, ensure they are not empty before applying specific validation
                    if (inputElement.hasAttribute('required') && inputElement.value.trim() === '') {
                        allValid = false;
                        inputElement.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                        const errorElement = document.getElementById(inputElement.id + 'Error');
                        if (errorElement) {
                            errorElement.textContent = 'Este campo es requerido.';
                            errorElement.classList.remove('hidden');
                        }
                    } else {
                        const isValid = validateInput(inputElement, field.type, field.relatedInputId);
                        if (!isValid) {
                            allValid = false;
                        }
                    }
                }
            });
            return allValid;
        }

        function validateRegisterPsychologistForm(event) {
            const fields = [
                { id: 'registerPsyId', type: 'number' },
                { id: 'registerPsyName', type: 'name' },
                { id: 'registerPsyEmail', type: 'email' },
                { id: 'registerPsyPassword', type: 'password' },
                { id: 'registerPsyPasswordConfirm', type: 'passwordConfirm', relatedInputId: 'registerPsyPassword' }
            ];
            const isValid = validateFormFields(fields);
            if (!isValid) {
                event.preventDefault();
            }
            return isValid;
        }

        function validateEditPsychologistForm(event) {
            const fields = [
                { id: 'editPsyEmail', type: 'email' },
                { id: 'editPsyPassword', type: 'password' },
                { id: 'editPsyPasswordConfirm', type: 'passwordConfirm', relatedInputId: 'editPsyPassword' }
            ];
            const isValid = validateFormFields(fields);
            if (!isValid) {
                event.preventDefault();
            }
            return isValid;
        }

        // Fade out success message after a few seconds
        document.addEventListener('DOMContentLoaded', () => {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                    successMessage.addEventListener('transitionend', () => {
                        successMessage.remove();
                    }, { once: true });
                }, 5000); // Message fades out after 5 seconds
            }
        });
    </script>
@endsection