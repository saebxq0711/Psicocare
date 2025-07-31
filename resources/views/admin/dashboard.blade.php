@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Panel de Administración</h1>

        <!-- Tarjetas resumen -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <!-- Pacientes -->
            <div class="bg-white shadow rounded-xl p-6 border-l-4 border-blue-500">
                <h2 class="text-lg font-semibold text-gray-800">👥 Pacientes</h2>
                <p class="text-3xl font-bold text-blue-500 mt-2">132</p>
                <p class="text-sm text-gray-500 mt-1">Registrados en el sistema</p>
            </div>

            <!-- Citas -->
            <div class="bg-white shadow rounded-xl p-6 border-l-4 border-green-500">
                <h2 class="text-lg font-semibold text-gray-800">📅 Citas</h2>
                <p class="text-3xl font-bold text-green-500 mt-2">87</p>
                <p class="text-sm text-gray-500 mt-1">Agendadas este mes</p>
            </div>

            <!-- Sesiones -->
            <div class="bg-white shadow rounded-xl p-6 border-l-4 border-purple-500">
                <h2 class="text-lg font-semibold text-gray-800">🧠 Sesiones</h2>
                <p class="text-3xl font-bold text-purple-500 mt-2">45</p>
                <p class="text-sm text-gray-500 mt-1">Completadas este mes</p>
            </div>

            <!-- Usuarios del sistema -->
            <div class="bg-white shadow rounded-xl p-6 border-l-4 border-yellow-500">
                <h2 class="text-lg font-semibold text-gray-800">🔐 Usuarios</h2>
                <p class="text-3xl font-bold text-yellow-500 mt-2">4</p>
                <p class="text-sm text-gray-500 mt-1">Administradores activos</p>
            </div>
        </div>

        <!-- Secciones rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Gestión de usuarios -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">👩‍⚕️ Gestión de usuarios</h3>
                <p class="text-gray-600 mb-4">Administra roles, registros y datos de los usuarios del sistema.</p>
                <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Ir a gestión</a>
            </div>

            <!-- Configuración general -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">⚙️ Configuración</h3>
                <p class="text-gray-600 mb-4">Ajusta parámetros del sistema, seguridad y control del chatbot.</p>
                <a href="#" class="inline-block bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 transition">Ir a configuración</a>
            </div>
        </div>
    </div>
@endsection
