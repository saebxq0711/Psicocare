@extends('layouts.app')

@section('title', 'Sobre Mí - Dra. Laura Lozano | PsicoCare')

@section('content')
<!-- Hero Section con Foto -->
<section class="relative bg-gradient-to-br from-emerald-50 via-white to-emerald-50 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2310b981" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fadeInLeft">
                <h1 class="text-5xl lg:text-6xl font-light text-gray-900 mb-8 leading-tight">
                    Dra. <span class="gradient-text font-semibold">Laura Lozano</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed font-light">
                    Psicóloga Clínica recién graduada.
                    Mi pasión es acompañarte en tu proceso de crecimiento personal y bienestar emocional.
                </p>
                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="bg-white rounded-full px-6 py-3 shadow-md border border-emerald-100">
                        <span class="text-emerald-600 font-medium">
                            <i class="fas fa-graduation-cap mr-2"></i>
                            Psicóloga Clínica
                        </span>
                    </div>
                    
                </div>
                <a href="{{ route('register') }}" 
                   class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-xl hover:scale-105 group inline-flex items-center">
                    <span class="mr-2">Agendar Consulta</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>
            
            <div class="animate-fadeInRight">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-3xl transform -rotate-6 opacity-20"></div>
                    <div class="relative">
                        <img src="/assets/img/lau.jpg?height=500&width=400" 
                             alt="Dra. Laura Lozano - Psicóloga Clínica" 
                             class="w-full h-[500px] object-cover rounded-3xl shadow-2xl">
                        <div class="absolute bottom-6 left-6 right-6 glass-effect rounded-2xl p-6 text-white">
                            <h3 class="text-xl font-semibold mb-2">Mi Compromiso</h3>
                            <p class="text-sm opacity-90">
                                "Crear un espacio seguro donde puedas explorar tus emociones 
                                y desarrollar herramientas para tu bienestar."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mi Historia -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fadeInLeft">
                <h2 class="text-4xl font-light text-gray-900 mb-8">
                    Mi <span class="gradient-text font-semibold">historia</span>
                </h2>
                <div class="space-y-6 text-gray-600 leading-relaxed">
                    <p>
                        Soy Laura Lozano, psicóloga clínica recién graduada con una profunda vocación 
                        por el bienestar mental y emocional. Mi formación académica me ha preparado 
                        para ofrecer atención psicológica de calidad con un enfoque moderno y empático.
                    </p>
                    <p>
                        Durante mis estudios, me especialicé en terapia cognitivo-conductual y desarrollé 
                        un interés particular en las técnicas de mindfulness y terapia humanista. 
                        Creo firmemente en el poder de la terapia para transformar vidas.
                    </p>
                    <p>
                        Mi objetivo es crear un espacio terapéutico seguro y acogedor donde puedas 
                        explorar tus pensamientos y emociones sin juicio, trabajando juntos hacia 
                        tus metas de bienestar personal.
                    </p>
                    <p>
                        He desarrollado este sistema de agendamiento digital para hacer más accesible 
                        y conveniente el proceso de solicitar citas psicológicas, tanto individuales 
                        como de pareja.
                    </p>
                </div>
            </div>
            
            <div class="animate-fadeInRight">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-emerald-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-university text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Formación</h3>
                        <p class="text-gray-600">Universidad Nacional de Colombia</p>
                        <p class="text-sm text-emerald-600 mt-1">Psicología Clínica</p>
                    </div>
                    
                    <div class="bg-emerald-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-brain text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Especialización</h3>
                        <p class="text-gray-600">Terapia Cognitivo-Conductual</p>
                        <p class="text-sm text-emerald-600 mt-1">Mindfulness & Bienestar</p>
                    </div>
                    
                    <div class="bg-emerald-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Enfoque</h3>
                        <p class="text-gray-600">Terapia Humanista</p>
                        <p class="text-sm text-emerald-600 mt-1">Centrada en la persona</p>
                    </div>
                    
                    <div class="bg-emerald-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-laptop text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Modalidad</h3>
                        <p class="text-gray-600">Presencial y Virtual</p>
                        <p class="text-sm text-emerald-600 mt-1">Flexibilidad total</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enfoques Terapéuticos -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Enfoques <span class="gradient-text font-semibold">Terapéuticos</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Utilizo técnicas basadas en evidencia científica, adaptadas a cada persona
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Enfoque 1 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-brain text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Terapia Cognitivo-Conductual</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Identificamos y modificamos patrones de pensamiento que afectan tu bienestar emocional.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Reestructuración cognitiva</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Técnicas de relajación</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Manejo de ansiedad</span>
                    </li>
                </ul>
            </div>
            
            <!-- Enfoque 2 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Terapia Humanista</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Enfoque centrado en la persona, promoviendo el autoconocimiento y crecimiento personal.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Autoestima y autoconcepto</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Desarrollo personal</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Relaciones interpersonales</span>
                    </li>
                </ul>
            </div>
            
            <!-- Enfoque 3 -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.3s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Mindfulness</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Técnicas de atención plena para reducir el estrés y mejorar la calidad de vida.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Meditación guiada</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Reducción del estrés</span>
                    </li>
                    <li class="flex items-center text-emerald-600">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span>Bienestar emocional</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Áreas de Especialización -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Áreas de <span class="gradient-text font-semibold">Especialización</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Atención especializada en diversas áreas del bienestar mental y emocional
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Ansiedad</h3>
                <p class="text-sm text-gray-600">Trastornos de ansiedad y fobias</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cloud-rain text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Depresión</h3>
                <p class="text-sm text-gray-600">Estados depresivos y tristeza</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.3s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Estrés</h3>
                <p class="text-sm text-gray-600">Manejo del estrés laboral</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.4s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Relaciones</h3>
                <p class="text-sm text-gray-600">Terapia de pareja</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.5s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Autoestima</h3>
                <p class="text-sm text-gray-600">Fortalecimiento personal</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.6s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Estudiantes</h3>
                <p class="text-sm text-gray-600">Apoyo académico</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.7s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-seedling text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Crecimiento</h3>
                <p class="text-sm text-gray-600">Desarrollo personal</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:scale-105 animate-fadeInUp" style="animation-delay: 0.8s">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Parejas</h3>
                <p class="text-sm text-gray-600">Comunicación y vínculos</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-24 bg-gradient-to-r from-emerald-500 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fadeInUp">
        <h2 class="text-4xl lg:text-5xl font-light text-white mb-8">
            ¿Listo para comenzar tu <span class="font-semibold">proceso terapéutico</span>?
        </h2>
        <p class="text-xl text-emerald-100 mb-12 font-light leading-relaxed">
            Estoy aquí para acompañarte en tu camino hacia el bienestar. 
            Regístrate y agenda tu primera consulta hoy mismo.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="{{ route('register') }}" 
               class="bg-white text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                <i class="fas fa-calendar-plus mr-2"></i>
                <span>Agendar Primera Cita</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <a href="{{ route('contacto') }}" 
               class="border-2 border-white text-white hover:bg-white hover:text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-lg">
                <i class="fas fa-envelope mr-2"></i>
                Enviar Mensaje
            </a>
        </div>
    </div>
</section>
@endsection
