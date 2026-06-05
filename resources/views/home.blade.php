@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-slate-100 py-12 px-4">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex justify-between items-start mb-12">
            <div>
                <h1 class="text-4xl font-bold text-blue-900 mb-2">Dashboard</h1>
                <p class="text-slate-600">Gestiona todas las tablas de tu sistema médico</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-900 text-white text-sm font-semibold rounded-lg transition flex items-center gap-2 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('pacientes.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-200 transition">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM16 11h4m-2-2v4M6 20v-2a9 9 0 0118 0v2H6z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Pacientes</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona registros de pacientes</p>
                <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full group-hover:bg-blue-100 transition">Ver →</span>
            </a>

            <a href="{{ route('medicos.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-teal-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-teal-200 transition">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Médicos</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona profesionales médicos</p>
                <span class="inline-block px-3 py-1 bg-teal-50 text-teal-700 text-xs font-semibold rounded-full group-hover:bg-teal-100 transition">Ver →</span>
            </a>

            <a href="{{ route('citas.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-purple-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-200 transition">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Citas</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona citas médicas</p>
                <span class="inline-block px-3 py-1 bg-purple-50 text-purple-700 text-xs font-semibold rounded-full group-hover:bg-purple-100 transition">Ver →</span>
            </a>

            <a href="{{ route('diagnosticos.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-amber-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-amber-200 transition">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Diagnósticos</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona diagnósticos médicos</p>
                <span class="inline-block px-3 py-1 bg-amber-50 text-amber-700 text-xs font-semibold rounded-full group-hover:bg-amber-100 transition">Ver →</span>
            </a>

            <a href="{{ route('tratamientos.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-green-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-200 transition">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Tratamientos</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona tratamientos</p>
                <span class="inline-block px-3 py-1 bg-green-50 text-green-700 text-xs font-semibold rounded-full group-hover:bg-green-100 transition">Ver →</span>
            </a>

            <a href="{{ route('medicamentos.index') }}" class="group block p-6 bg-white rounded-xl border border-slate-200 hover:border-red-400 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-red-200 transition">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Medicamentos</h3>
                <p class="text-sm text-slate-500 mb-4">Gestiona medicamentos</p>
                <span class="inline-block px-3 py-1 bg-red-50 text-red-700 text-xs font-semibold rounded-full group-hover:bg-red-100 transition">Ver →</span>
            </a>
        </div>
    </div>
</div>
@endsection
