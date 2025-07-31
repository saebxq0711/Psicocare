@extends('layouts.app')

@section('title', 'PsicoCare - Sistema de Agendamiento de Citas Psicológicas')

@section('content')
<!-- Hero Section Minimalista -->
<section class="relative bg-gradient-to-br from-emerald-50 via-white to-emerald-50 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2310b981" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fadeInLeft">
                <h1 class="text-5xl lg:text-7xl font-light text-gray-900 mb-8 leading-tight">
                    Agenda tu 
                    <span class="gradient-text font-semibold">cita psicológica</span>
                    <br>de forma fácil
                </h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed font-light">
                    Sistema de agendamiento digital para citas psicológicas con la Dra. Laura Lozano. 
                    Registrate y agenda tu sesión individual o de pareja desde la comodidad de tu hogar.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('register') }}" 
                       class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-full font-medium transition-all duration-300 text-center hover:shadow-xl hover:scale-105 group">
                        <span class="mr-2">Registrarse y Agendar</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('sobre-mi') }}" 
                       class="border-2 border-emerald-500 text-emerald-600 hover:bg-emerald-500 hover:text-white px-8 py-4 rounded-full font-medium transition-all duration-300 text-center hover:shadow-lg">
                        Conoce a tu Psicóloga
                    </a>
                </div>
            </div>
            
            <div class="animate-fadeInRight">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-3xl transform rotate-6 opacity-20"></div>
                    <div class="relative bg-white rounded-3xl p-12 shadow-2xl">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mx-auto mb-8 flex items-center justify-center animate-float">
                                <i class="fas fa-calendar-check text-white text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Agendamiento Digital</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Plataforma intuitiva para agendar tus citas psicológicas de manera 
                                rápida y segura, disponible 24/7.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tipos de Citas -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Tipos de <span class="gradient-text font-semibold">Consulta</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Ofrecemos diferentes modalidades de atención psicológica adaptadas a tus necesidades
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <!-- Citas Individuales -->
            <div class="group hover:scale-105 transition-all duration-500 animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-all duration-500 border border-emerald-50 text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-6">Terapia Individual</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                        Sesiones personalizadas enfocadas en tus necesidades específicas, 
                        en un espacio seguro y confidencial.
                    </p>
                    <ul class="space-y-4 text-left">
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Atención personalizada</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Enfoque en tus objetivos</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Confidencialidad total</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Modalidad presencial o virtual</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Citas de Pareja -->
            <div class="group hover:scale-105 transition-all duration-500 animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="bg-white rounded-3xl p-10 shadow-lg hover:shadow-2xl transition-all duration-500 border border-emerald-50 text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-semibold text-gray-900 mb-6">Terapia de Pareja</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                        Sesiones diseñadas para fortalecer la comunicación y resolver 
                        conflictos en la relación de pareja.
                    </p>
                    <ul class="space-y-4 text-left">
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Mejora la comunicación</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Resolución de conflictos</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Fortalecimiento del vínculo</span>
                        </li>
                        <li class="flex items-center text-emerald-600">
                            <i class="fas fa-check-circle mr-4 text-xl"></i>
                            <span class="text-lg">Espacio neutral y seguro</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cómo Funciona -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                ¿Cómo <span class="gradient-text font-semibold">Funciona</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Agendar tu cita psicológica es muy fácil con nuestro sistema digital
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Paso 1 -->
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                        1
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Regístrate</h3>
                <p class="text-gray-600 leading-relaxed">
                    Crea tu cuenta en nuestra plataforma de forma rápida y segura. 
                    Solo necesitas tu información básica.
                </p>
            </div>
            
            <!-- Paso 2 -->
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                        2
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Agenda tu Cita</h3>
                <p class="text-gray-600 leading-relaxed">
                    Selecciona el tipo de consulta, fecha y horario que mejor se adapte 
                    a tu disponibilidad.
                </p>
            </div>
            
            <!-- Paso 3 -->
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.3s">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                        <i class="fas fa-video text-white text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                        3
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Asiste a tu Sesión</h3>
                <p class="text-gray-600 leading-relaxed">
                    Conéctate desde casa para tu cita virtual o asiste a nuestro consultorio 
                    para tu sesión presencial.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Características del Sistema -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Características del <span class="gradient-text font-semibold">Sistema</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Tecnología moderna para una experiencia de agendamiento superior
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-clock text-emerald-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Disponible 24/7</h3>
                <p class="text-gray-600 text-sm">Agenda tu cita en cualquier momento del día</p>
            </div>
            
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-bell text-emerald-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Recordatorios</h3>
                <p class="text-gray-600 text-sm">Notificaciones automáticas de tus citas</p>
            </div>
            
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.3s">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-sync-alt text-emerald-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Reprogramación</h3>
                <p class="text-gray-600 text-sm">Cambia tu cita fácilmente cuando lo necesites</p>
            </div>
            
            <div class="text-center animate-fadeInUp" style="animation-delay: 0.4s">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-emerald-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Seguro</h3>
                <p class="text-gray-600 text-sm">Tus datos están protegidos y encriptados</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Minimalista -->
<section class="py-24 bg-gradient-to-r from-emerald-500 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fadeInUp">
        <h2 class="text-4xl lg:text-5xl font-light text-white mb-8">
            ¿Listo para <span class="font-semibold">agendar tu cita</span>?
        </h2>
        <p class="text-xl text-emerald-100 mb-12 font-light leading-relaxed">
            Regístrate en nuestra plataforma y agenda tu primera sesión psicológica. 
            Tu bienestar mental está a un clic de distancia.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="{{ route('register') }}" 
               class="bg-white text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                <i class="fas fa-user-plus mr-2"></i>
                <span>Registrarse Ahora</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <a href="{{ route('contacto') }}" 
               class="border-2 border-white text-white hover:bg-white hover:text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-lg">
                <i class="fas fa-phone mr-2"></i>
                ¿Tienes Preguntas?
            </a>
        </div>
    </div>
</section>
@endsection
