@extends('layouts.app')

@section('title', 'Gestión de Usuarios - PsicoCare Admin')

@section('content')
    {{-- Font Awesome CDN for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center animate-fade-in-down">Gestión de Usuarios</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Search, Filter, User List, and Register Button Section (Left Panel) --}}
            <div class="space-y-6 bg-white p-6 rounded-2xl shadow-xl transition-all duration-300 hover:shadow-2xl">
                <div class="relative">
                    <input type="text" id="searchInput" onkeyup="filterUsers()" placeholder="Buscar por ID o nombre..."
                        class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 text-base outline-none">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="relative">
                    <select onchange="filterUsers()" id="stateFilter"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 bg-white text-base outline-none cursor-pointer">
                        <option value="">-- Todos los estados --</option>
                        <option value="1">Activos</option>
                        <option value="2">Inactivos</option>
                    </select>
                </div>
                <ul id="userList"
                    class="divide-y divide-gray-200 max-h-[500px] overflow-y-auto overflow-x-hidden custom-scrollbar rounded-lg border border-gray-200">
                    @forelse ($users as $user)
                        <li onclick="selectUser({{ $user->id }})"
                            class="p-3 flex items-center gap-3 hover:bg-emerald-50 cursor-pointer transition-all duration-200 ease-in-out group
                                    @if($user->state_id == 1) border-l-4 border-transparent hover:border-emerald-400 @else border-l-4 border-transparent hover:border-red-400 @endif"
                            data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                            data-state="{{ $user->state_id }}" data-document="{{ $user->id }}" data-avatar="{{ $user->avatar }}"
                            data-phone="{{ $user->patient->phone ?? '' }}"
                            data-birthdate="{{ $user->patient->birth_date ?? '' }}"
                            data-gender="{{ $user->patient->gender ?? '' }}" data-address="{{ $user->patient->address ?? '' }}"
                            data-occupation="{{ $user->patient->occupation ?? '' }}">
                            <img src="{{ $user->avatar ? asset($user->avatar) : '/placeholder.svg?height=40&width=40&text=User' }}"
                                alt="Avatar"
                                class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 group-hover:border-emerald-400 transition-all duration-200">
                            <div class="flex-1 min-w-0">
                                <strong class="text-base font-semibold text-gray-800 truncate block">{{ $user->name }}</strong>
                                <small class="text-gray-500 text-sm truncate block">ID: {{ $user->id }}</small>
                            </div>
                            <span
                                class="ml-auto px-2 py-0.5 rounded-full text-xs font-medium flex-shrink-0
                                        @if($user->state_id == 1) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                {{ $user->state_id == 1 ? 'Activo' : 'Inactivo' }}
                            </span>
                        </li>
                    @empty
                        <li class="p-4 text-center text-gray-500">No se encontraron usuarios.</li>
                    @endforelse
                </ul>
                <button onclick="openRegisterModal()"
                    class="mt-6 w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white py-3 px-6 rounded-xl text-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                    <i class="fas fa-user-plus"></i>
                    Registrar nuevo paciente
                </button>
            </div>

            {{-- User Details Section (Right Panel) --}}
            <div id="userDetails"
                class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-xl hidden transition-all duration-500 ease-in-out opacity-0 scale-95">
                <div class="flex flex-col sm:flex-row items-center gap-6 mb-6 border-b pb-6 border-gray-200">
                    <img id="userAvatar" src="/placeholder.svg?height=128&width=128&text=User" alt="Avatar"
                        class="w-28 h-28 rounded-full border-4 border-emerald-300 object-cover shadow-md">
                    <h2 class="text-3xl font-extrabold text-gray-900" id="userName"></h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 text-base text-gray-700">
                    <p class="flex items-center gap-2"><strong><i
                                class="fas fa-envelope text-emerald-600"></i>Email:</strong> <span id="userEmail"></span>
                    </p>
                    <p class="flex items-center gap-2"><strong><i class="fas fa-id-card text-emerald-600"></i>ID:</strong>
                        <span id="userDocument"></span>
                    </p>
                    <p class="flex items-center gap-2"><strong><i
                                class="fas fa-toggle-on text-emerald-600"></i>Estado:</strong> <span id="userStateText"
                            class="font-semibold"></span></p>
                    <p class="flex items-center gap-2"><strong><i
                                class="fas fa-phone text-emerald-600"></i>Teléfono:</strong> <span id="userPhone"></span>
                    </p>
                    <p class="flex items-center gap-2"><strong><i class="fas fa-calendar-alt text-emerald-600"></i>Fecha de
                            nacimiento:</strong> <span id="userBirthdate"></span></p>
                    <p class="flex items-center gap-2"><strong><i
                                class="fas fa-venus-mars text-emerald-600"></i>Género:</strong> <span
                            id="userGender"></span></p>
                    <p class="col-span-full flex items-center gap-2"><strong><i
                                class="fas fa-map-marker-alt text-emerald-600"></i>Dirección:</strong> <span
                            id="userAddress"></span></p>
                    <p class="col-span-full flex items-center gap-2"><strong><i
                                class="fas fa-briefcase text-emerald-600"></i>Ocupación:</strong> <span
                            id="userOccupation"></span></p>
                </div>
                <div class="flex flex-wrap gap-4 mt-8 justify-end">
                    <button onclick="openEditModalFromDetails()"
                        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-5 rounded-xl text-base font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <i class="fas fa-edit"></i>
                        Editar
                    </button>
                    <button onclick="openConfirmModalFromDetails()" id="toggleStateBtnDetails"
                        class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white py-2.5 px-5 rounded-xl text-base font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <i class="fas fa-power-off"></i>
                        Desactivar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Form for activate/deactivate (hidden) --}}
    <form method="POST" id="toggleStateForm" class="hidden">
        @csrf
        <input type="hidden" name="id" id="toggleUserId">
    </form>

    {{-- Confirmation Modal --}}
    <div id="confirmModal"
        class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 transition-opacity duration-300">
        <div
            class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full transform scale-95 opacity-0 transition-all duration-300 ease-out">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2"><i
                    class="fas fa-exclamation-triangle text-yellow-500"></i> ¿Estás seguro?</h3>
            <p class="mb-6 text-gray-700">Esta acción cambiará el estado del usuario. ¿Deseas continuar?</p>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeConfirmModal()"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-in-out">
                    Cancelar
                </button>
                <button type="button" onclick="submitToggleState()"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                    Sí, continuar
                </button>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal"
        class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 transition-opacity duration-300">
        <div
            class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-2xl transform scale-95 opacity-0 transition-all duration-300 ease-out overflow-y-auto max-h-[90vh]">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center gap-2"><i
                    class="fas fa-user-edit text-blue-600"></i> Editar Usuario</h2>
            <form method="POST" action="{{ route('admin.users.update') }}" enctype="multipart/form-data"
                onsubmit="return validateEditForm(event)">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editUserId">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="editUserName" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" name="name" id="editUserName"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'name')">
                        <p id="editUserNameError" class="text-red-500 text-sm mt-1 hidden">Solo letras y espacios.</p>
                    </div>
                    <div>
                        <label for="editUserEmail" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="editUserEmail"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'email')">
                        <p id="editUserEmailError" class="text-red-500 text-sm mt-1 hidden">Formato de email inválido.</p>
                    </div>
                    <div>
                        <label for="editUserPassword" class="block text-sm font-medium text-gray-700 mb-2">Contraseña
                            (opcional)</label>
                        <input type="password" name="password" id="editUserPassword"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'password')">
                        <p id="editUserPasswordError" class="text-red-500 text-sm mt-1 hidden">Mín. 8 caracteres, 1
                            mayúscula, 1 número, 1 especial.</p>
                    </div>
                    <div>
                        <label for="editUserPasswordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmar
                            Contraseña</label>
                        <input type="password" name="password_confirmation" id="editUserPasswordConfirm"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'passwordConfirm', 'editUserPassword')">
                        <p id="editUserPasswordConfirmError" class="text-red-500 text-sm mt-1 hidden">Las contraseñas no
                            coinciden.</p>
                    </div>
                    <div>
                        <label for="editUserPhone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                        <input type="text" name="phone" id="editUserPhone"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'number')">
                        <p id="editUserPhoneError" class="text-red-500 text-sm mt-1 hidden">Solo números.</p>
                    </div>
                    <div>
                        <label for="editUserAddress" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                        <input type="text" name="address" id="editUserAddress"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none">
                    </div>
                    <div>
                        <label for="editUserOccupation"
                            class="block text-sm font-medium text-gray-700 mb-2">Ocupación</label>
                        <input type="text" name="occupation" id="editUserOccupation"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none">
                    </div>
                    <div>
                        <label for="editUserAvatar" class="block text-sm font-medium text-gray-700 mb-2">Avatar</label>
                        <div class="flex items-center space-x-2">
                            <label for="editUserAvatar"
                                class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2">
                                <i class="fas fa-upload"></i> Subir archivo
                            </label>
                            <span id="editUserAvatarFileName"
                                class="text-gray-600 text-sm truncate max-w-[calc(100%-120px)]">No file chosen</span>
                            <input type="file" name="avatar" id="editUserAvatar" class="hidden"
                                onchange="updateFileName(this, 'editUserAvatarFileName')">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeEditModal()"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                        <i class="fas fa-save mr-2"></i>Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Register Modal --}}
    <div id="registerModal"
        class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden z-50 transition-opacity duration-300">
        <div
            class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-3xl transform scale-95 opacity-0 transition-all duration-300 ease-out overflow-y-auto max-h-[90vh]">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center gap-2"><i
                    class="fas fa-user-plus text-emerald-600"></i> Registrar Nuevo Paciente</h2>
            <form method="POST" action="{{ route('admin.users.store') }}" onsubmit="return validateRegisterForm(event)">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="registerId" class="block text-sm font-medium text-gray-700 mb-2">ID</label>
                        <input type="text" name="id" id="registerId"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'number')" required>
                        <p id="registerIdError" class="text-red-500 text-sm mt-1 hidden">Solo números.</p>
                    </div>
                    <div>
                        <label for="registerName" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input type="text" name="name" id="registerName"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'name')" required>
                        <p id="registerNameError" class="text-red-500 text-sm mt-1 hidden">Solo letras y espacios.</p>
                    </div>
                    <div>
                        <label for="registerEmail" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="registerEmail"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'email')" required>
                        <p id="registerEmailError" class="text-red-500 text-sm mt-1 hidden">Formato de email inválido.</p>
                    </div>
                    <div>
                        <label for="registerPassword"
                            class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <input type="password" name="password" id="registerPassword"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'password')" required>
                        <p id="registerPasswordError" class="text-red-500 text-sm mt-1 hidden">Mín. 8 caracteres, 1
                            mayúscula, 1 número, 1 especial.</p>
                    </div>
                    <div>
                        <label for="registerPasswordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmar
                            Contraseña</label>
                        <input type="password" name="password_confirmation" id="registerPasswordConfirm"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'passwordConfirm', 'registerPassword')" required>
                        <p id="registerPasswordConfirmError" class="text-red-500 text-sm mt-1 hidden">Las contraseñas no
                            coinciden.</p>
                    </div>
                    <div>
                        <label for="registerBirthdate" class="block text-sm font-medium text-gray-700 mb-2">Fecha de
                            Nacimiento</label>
                        <input type="date" name="birthdate" id="registerBirthdate"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none">
                    </div>
                    <div>
                        <label for="registerPhone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                        <input type="text" name="phone" id="registerPhone"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none"
                            oninput="validateInput(this, 'number')">
                        <p id="registerPhoneError" class="text-red-500 text-sm mt-1 hidden">Solo números.</p>
                    </div>
                    <div>
                        <label for="registerGender" class="block text-sm font-medium text-gray-700 mb-2">Género</label>
                        <select name="gender" id="registerGender"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 bg-white outline-none cursor-pointer">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div>
                        <label for="registerAddress" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                        <input type="text" name="address" id="registerAddress"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none">
                    </div>
                    <div>
                        <label for="registerOccupation"
                            class="block text-sm font-medium text-gray-700 mb-2">Ocupación</label>
                        <input type="text" name="occupation" id="registerOccupation"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 outline-none">
                    </div>
                </div>
                <input type="hidden" name="role_id" value="3">
                <div class="flex justify-end mt-6 gap-3">
                    <button type="button" onclick="closeRegisterModal()"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg transition-all duration-300 ease-in-out">
                        <i class="fas fa-user-plus mr-2"></i>Registrar
                    </button>
                </div>
            </form>
        </div>
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

        // Generic validation function
        function validateInput(inputElement, type, relatedInputId = null) {
            const value = inputElement.value.trim();
            let isValid = true;
            let errorMessage = '';
            const errorElement = document.getElementById(inputElement.id + 'Error');

            // Determine focus color based on modal type
            const isEditModal = inputElement.closest('#editModal');
            const focusColorClass = isEditModal ? 'focus:border-blue-500 focus:ring-blue-500' : 'focus:border-emerald-500 focus:ring-emerald-500';

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

        function validateEditForm(event) {
            const fields = [
                { id: 'editUserName', type: 'name' },
                { id: 'editUserEmail', type: 'email' },
                { id: 'editUserPassword', type: 'password' }, // Optional, so empty is valid
                { id: 'editUserPasswordConfirm', type: 'passwordConfirm', relatedInputId: 'editUserPassword' },
                { id: 'editUserPhone', type: 'number' }
            ];
            const isValid = validateFormFields(fields);
            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
            return isValid;
        }

        function validateRegisterForm(event) {
            const fields = [
                { id: 'registerId', type: 'number' },
                { id: 'registerName', type: 'name' },
                { id: 'registerEmail', type: 'email' },
                { id: 'registerPassword', type: 'password' },
                { id: 'registerPasswordConfirm', type: 'passwordConfirm', relatedInputId: 'registerPassword' },
                { id: 'registerPhone', type: 'number' }
            ];
            const isValid = validateFormFields(fields);
            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
            return isValid;
        }

        function filterUsers() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const state = document.getElementById('stateFilter').value;
            document.querySelectorAll('#userList li').forEach(li => { // Target the list items
                const id = li.dataset.id.toLowerCase();
                const name = li.dataset.name.toLowerCase();
                const userState = li.dataset.state;
                const matchSearch = id.includes(search) || name.includes(search);
                const matchState = !state || userState === state;
                li.style.display = (matchSearch && matchState) ? 'flex' : 'none'; // Use flex for list items
            });
        }

        function selectUser(id) {
            const userLi = document.querySelector(`#userList li[data-id="${id}"]`);
            if (!userLi) return;

            // Populate user details section
            document.getElementById('userName').textContent = userLi.dataset.name;
            document.getElementById('userEmail').textContent = userLi.dataset.email;
            document.getElementById('userDocument').textContent = userLi.dataset.document;
            document.getElementById('userStateText').textContent = userLi.dataset.state == 1 ? 'Activo' : 'Inactivo';
            document.getElementById('userAvatar').src = userLi.dataset.avatar ? `{{ asset('') }}${userLi.dataset.avatar}` : '/placeholder.svg?height=128&width=128&text=User';
            document.getElementById('userPhone').textContent = userLi.dataset.phone || 'N/A';
            document.getElementById('userBirthdate').textContent = userLi.dataset.birthdate || 'N/A';
            document.getElementById('userGender').textContent = userLi.dataset.gender || 'N/A';
            document.getElementById('userAddress').textContent = userLi.dataset.address || 'N/A';
            document.getElementById('userOccupation').textContent = userLi.dataset.occupation || 'N/A';

            // Show user details section with animation
            const userDetails = document.getElementById('userDetails');
            userDetails.classList.remove('hidden', 'opacity-0', 'scale-95');
            userDetails.classList.add('opacity-100', 'scale-100');

            // Update toggle state button in details panel
            document.getElementById('toggleUserId').value = id;
            const toggleStateForm = document.getElementById('toggleStateForm');
            const toggleStateBtnDetails = document.getElementById('toggleStateBtnDetails');
            const isActive = userLi.dataset.state == "1";
            toggleStateForm.action = isActive ? "{{ route('admin.users.deactivate') }}" : "{{ route('admin.users.activate') }}";
            toggleStateBtnDetails.innerHTML = isActive ? '<i class="fas fa-power-off mr-2"></i>Desactivar' : '<i class="fas fa-check-circle mr-2"></i>Activar';
            toggleStateBtnDetails.classList.toggle("bg-red-600", isActive);
            toggleStateBtnDetails.classList.toggle("hover:bg-red-700", isActive);
            toggleStateBtnDetails.classList.toggle("bg-green-600", !isActive);
            toggleStateBtnDetails.classList.toggle("hover:bg-green-700", !isActive);

            // Highlight selected user in the list
            document.querySelectorAll('#userList li').forEach(li => {
                li.classList.remove('bg-emerald-100', 'border-emerald-600');
                li.classList.add('border-transparent'); // Ensure border is transparent when not selected
            });
            userLi.classList.add('bg-emerald-100', 'border-emerald-600');
        }

        // Modal functions with animations
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            setTimeout(() => { // Allow CSS to register 'display: block' before starting transition
                modal.querySelector(':scope > div').classList.remove('opacity-0', 'scale-95');
                modal.querySelector(':scope > div').classList.add('opacity-100', 'scale-100');
                modal.classList.remove('opacity-0'); // For the overlay
                modal.classList.add('opacity-100');
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.querySelector(':scope > div').classList.remove('opacity-100', 'scale-100');
            modal.querySelector(':scope > div').classList.add('opacity-0', 'scale-95');
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            modal.addEventListener('transitionend', function handler() {
                modal.classList.add('hidden');
                modal.removeEventListener('transitionend', handler);
            }, { once: true }); // Ensure listener is removed after one use

            // Clear form fields and errors when closing modals
            if (modalId === 'editModal') {
                document.getElementById('editUserPassword').value = '';
                document.getElementById('editUserPasswordConfirm').value = '';
                document.querySelectorAll('#editModal .text-red-500').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('#editModal input').forEach(el => {
                    el.classList.remove('border-red-500');
                    const focusColorClass = el.closest('#editModal') ? 'focus:border-blue-500 focus:ring-blue-500' : 'focus:border-emerald-500 focus:ring-emerald-500';
                    el.classList.add('border-gray-300', ...focusColorClass.split(' '));
                });
                document.getElementById('editUserAvatarFileName').textContent = 'No file chosen'; // Reset file name display
                document.getElementById('editUserAvatar').value = ''; // Clear file input
            } else if (modalId === 'registerModal') {
                document.querySelector('#registerModal form').reset();
                document.querySelectorAll('#registerModal .text-red-500').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('#registerModal input, #registerModal select').forEach(el => {
                    el.classList.remove('border-red-500');
                    const focusColorClass = el.closest('#editModal') ? 'focus:border-blue-500 focus:ring-blue-500' : 'focus:border-emerald-500 focus:ring-emerald-500';
                    el.classList.add('border-gray-300', ...focusColorClass.split(' '));
                });
            }
        }

        function openEditModal() {
            openModal('editModal');
        }

        function closeEditModal() {
            closeModal('editModal');
        }

        function openRegisterModal() {
            openModal('registerModal');
        }

        function closeRegisterModal() {
            closeModal('registerModal');
        }

        function openConfirmModal() {
            openModal('confirmModal');
        }

        function closeConfirmModal() {
            closeModal('confirmModal');
        }

        function submitToggleState() {
            document.getElementById('toggleStateForm').submit();
        }

        // New functions to handle opening modals from the details panel
        function openEditModalFromDetails() {
            // Populate fields before opening edit modal
            const currentUserId = document.getElementById('toggleUserId').value; // Get the ID from the hidden input
            const userLi = document.querySelector(`#userList li[data-id="${currentUserId}"]`);
            if (!userLi) return; // Should not happen if selectUser was called

            document.getElementById('editUserId').value = userLi.dataset.id;
            document.getElementById('editUserEmail').value = userLi.dataset.email;
            document.getElementById('editUserName').value = userLi.dataset.name;
            document.getElementById('editUserPhone').value = userLi.dataset.phone || '';
            document.getElementById('editUserAddress').value = userLi.dataset.address || '';
            document.getElementById('editUserOccupation').value = userLi.dataset.occupation || '';

            // Reset password fields and file input display
            document.getElementById('editUserPassword').value = '';
            document.getElementById('editUserPasswordConfirm').value = '';
            document.getElementById('editUserAvatarFileName').textContent = 'No file chosen';
            document.getElementById('editUserAvatar').value = '';

            openModal('editModal');
        }

        function openConfirmModalFromDetails() {
            openModal('confirmModal');
        }


        // Initial filter and select first user on page load
        document.addEventListener('DOMContentLoaded', () => {
            filterUsers();
            const firstUser = document.querySelector('#userList li');
            if (firstUser) {
                selectUser(firstUser.dataset.id);
            }
        });
    </script>
@endsection