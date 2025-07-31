@extends('layouts.app')

@section('title', 'Contacto - PsicoCare')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-emerald-50 via-white to-emerald-50 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2310b981" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center animate-fadeInUp">
            <div class="w-24 h-24 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-full mx-auto mb-8 flex items-center justify-center animate-float">
                <i class="fas fa-envelope text-white text-3xl"></i>
            </div>
            <h1 class="text-5xl lg:text-6xl font-light text-gray-900 mb-8 leading-tight">
                <span class="gradient-text font-semibold">Contáctame</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed">
                ¿Tienes preguntas sobre el proceso de agendamiento o necesitas más información? 
                Estamos aquí para ayudarte.
            </p>
        </div>
    </div>
</section>

<!-- Información de Contacto y Formulario -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Información de contacto -->
            <div class="animate-fadeInLeft">
                <h2 class="text-3xl font-light text-gray-900 mb-12">
                    Información de <span class="gradient-text font-semibold">Contacto</span>
                </h2>
                
                <div class="space-y-8">
                    <!-- Teléfono -->
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-emerald-100 group-hover:bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300">
                            <i class="fas fa-phone text-emerald-500 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Teléfono</h3>
                            <p class="text-gray-600 text-lg">+57 300 123 4567</p>
                            <p class="text-sm text-emerald-600 mt-1">Para consultas generales</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-emerald-100 group-hover:bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300">
                            <i class="fas fa-envelope text-emerald-500 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Email</h3>
                            <p class="text-gray-600 text-lg">dra.lozano@psicocare.com</p>
                            <p class="text-sm text-emerald-600 mt-1">Respuesta en 24 horas</p>
                        </div>
                    </div>
                    
                    <!-- Ubicación -->
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-emerald-100 group-hover:bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300">
                            <i class="fas fa-map-marker-alt text-emerald-500 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Consultorio</h3>
                            <p class="text-gray-600 text-lg">Carrera 15 #93-47</p>
                            <p class="text-gray-600">Bogotá, Colombia</p>
                            <p class="text-sm text-emerald-600 mt-1">Para citas presenciales</p>
                        </div>
                    </div>
                    
                    <!-- WhatsApp -->
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-emerald-100 group-hover:bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300">
                            <i class="fab fa-whatsapp text-emerald-500 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">WhatsApp</h3>
                            <p class="text-gray-600 text-lg">+57 300 123 4567</p>
                            <a href="https://wa.me/573001234567" target="_blank" 
                               class="inline-flex items-center bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-full transition-all duration-300 mt-3 hover:shadow-lg hover:scale-105 group">
                                <i class="fab fa-whatsapp mr-2"></i>
                                <span>Chatear Ahora</span>
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Nota importante -->
                <div class="mt-12 bg-emerald-50 rounded-2xl p-6 border border-emerald-100">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-info text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-emerald-800 mb-2">Importante</h4>
                            <p class="text-emerald-700 text-sm leading-relaxed">
                                Para agendar citas psicológicas, debes registrarte en nuestra plataforma. 
                                El agendamiento se realiza únicamente a través del sistema web una vez 
                                que tengas tu cuenta creada.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de Contacto -->
            <div class="animate-fadeInRight">
                <div class="bg-gray-50 rounded-3xl p-8 lg:p-12">
                    <h2 class="text-3xl font-light text-gray-900 mb-8">
                        Envíame un <span class="gradient-text font-semibold">Mensaje</span>
                    </h2>
                    
                    <form class="space-y-6" method="POST" action="#">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-3">Nombre Completo</label>
                                <input type="text" id="nombre" name="nombre" required
                                    class="w-full px-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300 bg-white">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-3">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300 bg-white">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-3">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono"
                                    class="w-full px-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300 bg-white">
                            </div>
                            
                            <div>
                                <label for="asunto" class="block text-sm font-medium text-gray-700 mb-3">Asunto</label>
                                <select id="asunto" name="asunto" required
                                    class="w-full px-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300 bg-white">
                                    <option value="">Selecciona un asunto</option>
                                    <option value="informacion">Información sobre el sistema</option>
                                    <option value="registro">Ayuda con el registro</option>
                                    <option value="agendamiento">Proceso de agendamiento</option>
                                    <option value="tecnico">Soporte técnico</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-3">Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="6" required
                                class="w-full px-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-300 bg-white resize-none"
                                placeholder="Cuéntanos cómo podemos ayudarte..."></textarea>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" id="privacidad" name="privacidad" required
                                class="mt-1 w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <label for="privacidad" class="text-sm text-gray-600 leading-relaxed">
                                Acepto la <a href="#" class="text-emerald-600 hover:underline">Política de Privacidad</a> 
                                y autorizo el tratamiento de mis datos personales.
                            </label>
                        </div>
                        
                        <button type="submit" 
                            class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-4 px-6 rounded-2xl transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                            <span class="mr-2">Enviar Mensaje</span>
                            <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-300"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Horarios de Atención -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Horarios de <span class="gradient-text font-semibold">Atención</span>
            </h2>
            <p class="text-xl text-gray-600 font-light">Disponibilidad para citas psicológicas</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Consultas Presenciales -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 text-center group hover:scale-105 animate-fadeInUp" style="animation-delay: 0.1s">
                <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-clinic-medical text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-6">Citas Presenciales</h3>
                <div class="space-y-3 text-gray-600 mb-6">
                    <p><span class="font-medium">Lunes a Viernes:</span> 8:00 AM - 6:00 PM</p>
                    <p><span class="font-medium">Sábados:</span> 9:00 AM - 2:00 PM</p>
                    <p><span class="font-medium">Domingos:</span> Cerrado</p>
                </div>
                <div class="bg-emerald-50 rounded-2xl p-4">
                    <p class="text-sm text-emerald-700">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        En nuestro consultorio en Bogotá
                    </p>
                </div>
            </div>
            
            <!-- Consultas Virtuales -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 text-center group hover:scale-105 animate-fadeInUp" style="animation-delay: 0.2s">
                <div class="w-20 h-20 bg-gradient-to-r from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-video text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-6">Citas Virtuales</h3>
                <div class="space-y-3 text-gray-600 mb-6">
                    <p><span class="font-medium">Lunes a Viernes:</span> 7:00 AM - 8:00 PM</p>
                    <p><span class="font-medium">Sábados:</span> 8:00 AM - 4:00 PM</p>
                    <p><span class="font-medium">Domingos:</span> 10:00 AM - 2:00 PM</p>
                </div>
                <div class="bg-emerald-50 rounded-2xl p-4">
                    <p class="text-sm text-emerald-700">
                        <i class="fas fa-home mr-2"></i>
                        Desde la comodidad de tu hogar
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ sobre Agendamiento -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-4xl lg:text-5xl font-light text-gray-900 mb-6">
                Preguntas <span class="gradient-text font-semibold">Frecuentes</span>
            </h2>
            <p class="text-xl text-gray-600 font-light">Dudas comunes sobre el agendamiento de citas</p>
        </div>
        
        <div class="space-y-4" x-data="{ openFaq: null }">
            <!-- FAQ 1 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.1s">
                <button @click="openFaq = openFaq === 1 ? null : 1" 
                    class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                    <h3 class="text-lg font-semibold text-gray-900">¿Cómo puedo agendar mi primera cita?</h3>
                    <i class="fas fa-chevron-down text-emerald-500 transform transition-transform duration-200" 
                       :class="{ 'rotate-180': openFaq === 1 }"></i>
                </button>
                <div x-show="openFaq === 1" x-transition class="px-8 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        Para agendar tu cita, primero debes registrarte en nuestra plataforma creando una cuenta. 
                        Una vez registrado, podrás acceder al sistema de agendamiento donde seleccionarás el tipo 
                        de consulta (individual o de pareja), fecha y horario disponible.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 2 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.2s">
                <button @click="openFaq = openFaq === 2 ? null : 2" 
                    class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                    <h3 class="text-lg font-semibold text-gray-900">¿Puedo agendar sin registrarme?</h3>
                    <i class="fas fa-chevron-down text-emerald-500 transform transition-transform duration-200" 
                       :class="{ 'rotate-180': openFaq === 2 }"></i>
                </button>
                <div x-show="openFaq === 2" x-transition class="px-8 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        No, el registro es obligatorio para agendar citas. Esto nos permite mantener un historial 
                        de tus sesiones, enviarte recordatorios y garantizar la seguridad de tu información personal. 
                        El proceso de registro es rápido y seguro.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 3 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.3s">
                <button @click="openFaq = openFaq === 3 ? null : 3" 
                    class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                    <h3 class="text-lg font-semibold text-gray-900">¿Qué diferencia hay entre cita individual y de pareja?</h3>
                    <i class="fas fa-chevron-down text-emerald-500 transform transition-transform duration-200" 
                       :class="{ 'rotate-180': openFaq === 3 }"></i>
                </button>
                <div x-show="openFaq === 3" x-transition class="px-8 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        Las citas individuales están enfocadas en tus necesidades personales y objetivos específicos. 
                        Las citas de pareja están diseñadas para trabajar temas de comunicación, resolución de conflictos 
                        y fortalecimiento de la relación, donde ambos miembros participan activamente en la sesión.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 4 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.4s">
                <button @click="openFaq = openFaq === 4 ? null : 4" 
                    class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                    <h3 class="text-lg font-semibold text-gray-900">¿Puedo cambiar de modalidad presencial a virtual?</h3>
                    <i class="fas fa-chevron-down text-emerald-500 transform transition-transform duration-200" 
                       :class="{ 'rotate-180': openFaq === 4 }"></i>
                </button>
                <div x-show="openFaq === 4" x-transition class="px-8 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        Sí, puedes cambiar la modalidad de tu cita desde tu panel de usuario. Te recomendamos hacer 
                        este cambio con al menos 24 horas de anticipación. Las citas virtuales ofrecen mayor flexibilidad 
                        horaria, mientras que las presenciales brindan un contacto más directo.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 5 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.5s">
                <button @click="openFaq = openFaq === 5 ? null : 5" 
                    class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors duration-200">
                    <h3 class="text-lg font-semibold text-gray-900">¿Cómo funciona el sistema de recordatorios?</h3>
                    <i class="fas fa-chevron-down text-emerald-500 transform transition-transform duration-200" 
                       :class="{ 'rotate-180': openFaq === 5 }"></i>
                </button>
                <div x-show="openFaq === 5" x-transition class="px-8 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        El sistema envía recordatorios automáticos por email y SMS (si proporcionas tu número). 
                        Recibirás una notificación 24 horas antes de tu cita y otra 2 horas antes. También puedes 
                        configurar recordatorios adicionales desde tu panel de usuario.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-24 bg-gradient-to-r from-emerald-500 to-emerald-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fadeInUp">
        <h2 class="text-4xl lg:text-5xl font-light text-white mb-8">
            ¿Listo para <span class="font-semibold">registrarte</span>?
        </h2>
        <p class="text-xl text-emerald-100 mb-12 font-light leading-relaxed">
            Crea tu cuenta y comienza a agendar tus citas psicológicas de forma fácil y segura. 
            Tu bienestar mental está a un clic de distancia.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="{{ route('register') }}" 
               class="bg-white text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                <i class="fas fa-user-plus mr-2"></i>
                <span>Registrarse Ahora</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <a href="https://wa.me/573001234567" target="_blank" 
               class="border-2 border-white text-white hover:bg-white hover:text-emerald-600 px-10 py-4 rounded-full font-medium transition-all duration-300 hover:shadow-lg">
                <i class="fab fa-whatsapp mr-2"></i>
                WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
