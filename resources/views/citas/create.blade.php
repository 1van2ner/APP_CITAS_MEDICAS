@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-slate-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('citas.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a Citas
            </a>
            <h1 class="text-3xl font-bold text-purple-900">Crear Cita</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('citas.store') }}" method="POST" class="space-y-6">
                @csrf
                
                {{-- Campos ocultos necesarios para evitar errores de integridad en BD --}}
                <input type="hidden" name="estado" value="pendiente">
                <input type="hidden" name="sala" value="Consultorio 1">

                <div class="space-y-4">
                    {{-- Paciente --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Paciente</label>
                        <select name="paciente_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Seleccionar paciente...</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->nombre }} {{ $paciente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('paciente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Médico --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Médico</label>
                        <select name="medico_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Seleccionar médico...</option>
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                                    {{ $medico->nombre }} ({{ $medico->especialidad }})
                                </option>
                            @endforeach
                        </select>
                        @error('medico_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Fecha y Hora Unificadas --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha y Hora</label>
                        <input type="datetime-local" name="fecha" required 
                               class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                               value="{{ old('fecha') }}">
                        @error('fecha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Motivo --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Motivo</label>
                        <textarea name="motivo" required rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ old('motivo') }}</textarea>
                        @error('motivo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition">
                        Crear Cita
                    </button>
                    <a href="{{ route('citas.index') }}" class="flex-1 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection