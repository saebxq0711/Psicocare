<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PsicoCare - Cuidado Psicológico Profesional')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Estilos personalizados para la barra de scroll */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 10px;
            border: 2px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #059669, #047857);
            border: 2px solid #e2e8f0;
            transform: scale(1.1);
        }

        ::-webkit-scrollbar-thumb:active {
            background: linear-gradient(135deg, #047857, #065f46);
        }

        ::-webkit-scrollbar-corner {
            background: #f1f5f9;
        }

        /* Para Firefox */
        html {
            scrollbar-width: thin;
            scrollbar-color: #10b981 #f1f5f9;
        }

        /* Estilos para scrollbars en elementos específicos */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(16, 185, 129, 0.1);
            border-radius: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.6);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(16, 185, 129, 0.8);
        }

        /* Animaciones personalizadas */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes scrollbarPulse {

            0%,
            100% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-fadeInLeft {
            animation: fadeInLeft 0.8s ease-out;
        }

        .animate-fadeInRight {
            animation: fadeInRight 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Efecto de scroll suave */
        html {
            scroll-behavior: smooth;
        }

        /* Animación sutil cuando se hace scroll */
        body::-webkit-scrollbar-thumb {
            animation: scrollbarPulse 2s ease-in-out infinite;
        }

        /* Estilos responsivos para la scrollbar */
        @media (max-width: 768px) {
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }

            ::-webkit-scrollbar-thumb {
                border: 1px solid #f1f5f9;
            }
        }

        /* Scrollbar para elementos con overflow */
        .overflow-auto::-webkit-scrollbar,
        .overflow-y-auto::-webkit-scrollbar,
        .overflow-x-auto::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .overflow-auto::-webkit-scrollbar-track,
        .overflow-y-auto::-webkit-scrollbar-track,
        .overflow-x-auto::-webkit-scrollbar-track {
            background: rgba(16, 185, 129, 0.05);
            border-radius: 6px;
        }

        .overflow-auto::-webkit-scrollbar-thumb,
        .overflow-y-auto::-webkit-scrollbar-thumb,
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: rgba(16, 185, 129, 0.4);
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .overflow-auto::-webkit-scrollbar-thumb:hover,
        .overflow-y-auto::-webkit-scrollbar-thumb:hover,
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: rgba(16, 185, 129, 0.7);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-emerald-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <img src="/assets/img/logo.png?height=40&width=40" alt="PsicoCare Logo" class="w-20 h-20">
                        <div>
                            <h1 class="text-2xl font-bold gradient-text">PsicoCare</h1>
                            <p class="text-xs text-emerald-600 font-medium">Bienestar Mental</p>
                        </div>
                    </div>

                    <!-- Navegación Desktop -->
                    <nav class="hidden md:flex items-center space-x-8">
                        @auth
                            @if(Auth::user()->role_id == 3) {{-- Paciente --}}
                                <a href="{{ route('dashboard') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-home group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Inicio</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-chart-line group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Progreso</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-calendar-alt group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Citas</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-heart group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Pareja</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-comments group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Chat</span>
                                </a>
                            @elseif(Auth::user()->role_id == 2) {{-- Psicóloga --}}
                                <a href="{{ route('dashboard') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-home group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Inicio</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i
                                        class="fas fa-calendar-check group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Agenda</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-users group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Pacientes</span>
                                </a>
                                <a href="#"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-comments group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Chats</span>
                                </a>
                            @elseif(Auth::user()->role_id == 1) {{-- Admin --}}
                                <a href="{{ route('dashboard') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i
                                        class="fas fa-tachometer-alt group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Dashboard</span>
                                </a>
                                <a href="{{ route('admin.psychologist') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-user-md group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Psicóloga</span>
                                </a>
                                <a href="{{ route('admin.users') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-users-cog group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Usuarios</span>
                                </a>
                                <a href="{{ route('admin.appointments') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i class="fas fa-calendar-alt group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Agendamiento</span>
                                </a>
                                <a href="{{ route('admin.sessions') }}"
                                    class="flex items-center space-x-2 text-gray-700 hover:text-emerald-600 transition-all duration-300 group">
                                    <i
                                        class="fas fa-clipboard-list group-hover:scale-110 transition-transform duration-300"></i>
                                    <span class="font-medium">Sesiones</span>
                                </a>
                            @endif

                            <!-- Usuario Dropdown (se mantiene igual para todos los roles autenticados) -->
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center space-x-3 bg-emerald-50 hover:bg-emerald-100 px-4 py-2 rounded-full transition-all duration-300 group">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center">
                                        <span
                                            class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <span class="text-gray-800 font-medium">{{ Auth::user()->name }}</span>
                                    <i
                                        class="fas fa-chevron-down text-emerald-500 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-1 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-1 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-emerald-100 z-50 custom-scrollbar">
                                    <div class="py-2">
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-user-circle text-emerald-500"></i>
                                            <span>Mi Perfil</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-cog text-emerald-500"></i>
                                            <span>Configuración</span>
                                        </a>
                                        <hr class="my-2 border-emerald-100">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center space-x-3 w-full px-4 py-3 text-red-600 hover:bg-red-50 transition-colors duration-200">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>Cerrar Sesión</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth

                        @guest
                            <a href="{{ url('/') }}"
                                class="text-gray-700 hover:text-emerald-600 transition-colors duration-300 font-medium">Inicio</a>
                            <a href="{{ route('sobre-mi') }}"
                                class="text-gray-700 hover:text-emerald-600 transition-colors duration-300 font-medium">Sobre
                                Mí</a>
                            <a href="{{ route('contacto') }}"
                                class="text-gray-700 hover:text-emerald-600 transition-colors duration-300 font-medium">Contacto</a>
                            <a href="{{ route('login') }}"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-2.5 rounded-full transition-all duration-300 font-medium hover:shadow-lg hover:scale-105">
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}"
                                class="border border-emerald-500 text-emerald-500 hover:bg-emerald-500 hover:text-white px-6 py-2.5 rounded-full transition-all duration-300 font-medium hover:shadow-lg">
                                Registrarse
                            </a>
                        @endguest
                    </nav>

                    <!-- Menú móvil -->
                    <div x-data="{ open: false }" class="md:hidden">
                        <button @click="open = !open"
                            class="text-gray-700 hover:text-emerald-600 transition-colors duration-300">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-1 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-1 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-16 right-4 w-64 bg-white rounded-xl shadow-lg border border-emerald-100 z-50 custom-scrollbar max-h-96 overflow-y-auto">

                            @auth
                                <!-- Menú para usuarios autenticados -->
                                <div class="py-2">
                                    <!-- Información del usuario -->
                                    <div class="px-4 py-3 border-b border-emerald-100">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center">
                                                <span
                                                    class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <p class="text-gray-800 font-medium text-sm">{{ Auth::user()->name }}</p>
                                                <p class="text-gray-500 text-xs">Usuario registrado</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Enlaces de navegación -->
                                    @if(Auth::user()->role_id == 3) {{-- Paciente --}}
                                        <a href="{{ route('dashboard') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-home text-emerald-500"></i>
                                            <span>Inicio</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-chart-line text-emerald-500"></i>
                                            <span>Progreso</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-calendar-alt text-emerald-500"></i>
                                            <span>Citas</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-heart text-emerald-500"></i>
                                            <span>Pareja</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-comments text-emerald-500"></i>
                                            <span>Chat</span>
                                        </a>
                                    @elseif(Auth::user()->role_id == 2) {{-- Psicóloga --}}
                                        <a href="{{ route('dashboard') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-home text-emerald-500"></i>
                                            <span>Inicio</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-calendar-check text-emerald-500"></i>
                                            <span>Agenda</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-users text-emerald-500"></i>
                                            <span>Pacientes</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-comments text-emerald-500"></i>
                                            <span>Chats</span>
                                        </a>
                                    @elseif(Auth::user()->role_id == 1) {{-- Admin --}}
                                        <a href="{{ route('dashboard') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-tachometer-alt text-emerald-500"></i>
                                            <span>Dashboard</span>
                                        </a>
                                        <a href="{{ route('admin.psychologist') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-user-md text-emerald-500"></i>
                                            <span>Psicóloga</span>
                                        </a>
                                        <a href="{{ route('admin.users') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-users-cog text-emerald-500"></i>
                                            <span>Usuarios</span>
                                        </a>
                                        <a href="{{ route('admin.appointments') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-calendar-alt text-emerald-500"></i>
                                            <span>Agendamiento</span>
                                        </a>
                                        <a href="{{ route('admin.sessions') }}"
                                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                            <i class="fas fa-clipboard-list text-emerald-500"></i>
                                            <span>Sesiones</span>
                                        </a>
                                    @endif

                                    <hr class="my-2 border-emerald-100">

                                    <!-- Opciones de perfil (se mantienen igual para todos los roles autenticados) -->
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                        <i class="fas fa-user-circle text-emerald-500"></i>
                                        <span>Mi Perfil</span>
                                    </a>
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                        <i class="fas fa-cog text-emerald-500"></i>
                                        <span>Configuración</span>
                                    </a>

                                    <hr class="my-2 border-emerald-100">

                                    <!-- Cerrar sesión -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center space-x-3 w-full px-4 py-3 text-red-600 hover:bg-red-50 transition-colors duration-200">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Cerrar Sesión</span>
                                        </button>
                                    </form>
                                </div>
                            @endauth

                            @guest
                                <!-- Menú para usuarios invitados -->
                                <div class="py-2">
                                    <a href="{{ url('/') }}"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                        <i class="fas fa-home text-emerald-500"></i>
                                        <span>Inicio</span>
                                    </a>
                                    <a href="{{ route('sobre-mi') }}"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                        <i class="fas fa-user-md text-emerald-500"></i>
                                        <span>Sobre Mí</span>
                                    </a>
                                    <a href="{{ route('contacto') }}"
                                        class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-emerald-50 transition-colors duration-200">
                                        <i class="fas fa-envelope text-emerald-500"></i>
                                        <span>Contacto</span>
                                    </a>

                                    <hr class="my-2 border-emerald-100">

                                    <!-- Botones de autenticación -->
                                    <div class="px-4 py-3 space-y-3">
                                        <a href="{{ route('login') }}"
                                            class="block w-full bg-emerald-500 hover:bg-emerald-600 text-white text-center px-4 py-2.5 rounded-full transition-all duration-300 font-medium">
                                            Iniciar Sesión
                                        </a>
                                        <a href="{{ route('register') }}"
                                            class="block w-full border border-emerald-500 text-emerald-500 hover:bg-emerald-500 hover:text-white text-center px-4 py-2.5 rounded-full transition-all duration-300 font-medium">
                                            Registrarse
                                        </a>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenido principal -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer minimalista -->
        @guest
            <footer class="bg-white border-t border-emerald-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <!-- Logo y descripción -->
                        <div class="col-span-1 md:col-span-2">
                            <div class="flex items-center space-x-3 mb-6">
                                <img src="/assets/img/logo.png?height=32&width=32" alt="PsicoCare Logo" class="w-20 h-20">
                                <div>
                                    <h3 class="text-xl font-bold gradient-text">PsicoCare</h3>
                                    <p class="text-sm text-emerald-600">Bienestar Mental</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Cuidado psicológico profesional con un enfoque moderno y personalizado para tu bienestar
                                integral.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="w-10 h-10 bg-emerald-100 hover:bg-emerald-500 rounded-full flex items-center justify-center transition-all duration-300 group">
                                    <i class="fab fa-facebook-f text-emerald-500 group-hover:text-white"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-emerald-100 hover:bg-emerald-500 rounded-full flex items-center justify-center transition-all duration-300 group">
                                    <i class="fab fa-instagram text-emerald-500 group-hover:text-white"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 bg-emerald-100 hover:bg-emerald-500 rounded-full flex items-center justify-center transition-all duration-300 group">
                                    <i class="fab fa-whatsapp text-emerald-500 group-hover:text-white"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Enlaces -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Enlaces</h4>
                            <ul class="space-y-3">
                                <li><a href="{{ url('/') }}"
                                        class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Inicio</a>
                                </li>
                                <li><a href="{{ route('sobre-mi') }}"
                                        class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Sobre
                                        Mí</a></li>
                                <li><a href="{{ route('contacto') }}"
                                        class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Contacto</a>
                                </li>
                                <li><a href="{{ route('register') }}"
                                        class="text-gray-600 hover:text-emerald-600 transition-colors duration-300">Registrarse</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Contacto -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Contacto</h4>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-phone text-emerald-500"></i>
                                    <span>+57 300 123 4567</span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-emerald-500"></i>
                                    <span>dra.lozano@psicocare.com</span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <i class="fas fa-map-marker-alt text-emerald-500"></i>
                                    <span>Bogotá, Colombia</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr class="border-emerald-100 my-8">

                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-500">&copy; {{ date('Y') }} PsicoCare. Todos los derechos reservados.</p>
                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <a href="#"
                                class="text-gray-500 hover:text-emerald-600 transition-colors duration-300 text-sm">Privacidad</a>
                            <a href="#"
                                class="text-gray-500 hover:text-emerald-600 transition-colors duration-300 text-sm">Términos</a>
                        </div>
                    </div>
                </div>
            </footer>
        @endguest
    </div>
</body>

</html>