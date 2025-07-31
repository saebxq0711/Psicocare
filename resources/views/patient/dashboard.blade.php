@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-6">Hola Juan, este es tu panel de paciente</h1>

        <!-- Secciones del dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

            <!-- Próxima cita -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">📅 Próxima cita</h2>
                <p class="text-gray-600">Fecha: <strong>2025-08-02</strong></p>
                <p class="text-gray-600">Hora: <strong>10:30 AM</strong></p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Ver todas las citas</a>
            </div>

            <!-- Progreso terapéutico -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">📈 Tu progreso</h2>
                <p class="text-gray-600">Revisa tus sesiones anteriores, observaciones y recomendaciones.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Ver mi progreso</a>
            </div>

            <!-- Chat con psicóloga -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">💬 Chatea con tu psicóloga</h2>
                <p class="text-gray-600">¿Tienes una duda o necesitas apoyo? Puedes escribirle directamente.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Ir al chat</a>
            </div>
        </div>

        <!-- Panel del Chatbot -->
        <x-chatbot />
    </div>
@endsection