@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-slate-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('tratamientos.index') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a Tratamientos
            </a>
            <h1 class="text-3xl font-bold text-green-900">Editar Tratamiento</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('tratamientos.update', $tratamiento->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Paciente</label>
                        <select name="paciente_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ old('paciente_id', $tratamiento->paciente_id) == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->nombre }} {{ $paciente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('paciente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nombre del Tratamiento</label>
                        <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ old('nombre', $tratamiento->nombre) }}">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Descripción</label>
                        <textarea name="descripcion" required rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('descripcion', $tratamiento->descripcion) }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ old('fecha_inicio', $tratamiento->fecha_inicio->format('Y-m-d')) }}">
                            @error('fecha_inicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha Fin</label>
                            <input type="date" name="fecha_fin" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" value="{{ old('fecha_fin', $tratamiento->fecha_fin->format('Y-m-d')) }}">
                            @error('fecha_fin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Estado</label>
                        <select name="estado" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="activo" {{ old('estado', $tratamiento->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="completado" {{ old('estado', $tratamiento->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
                            <option value="suspendido" {{ old('estado', $tratamiento->estado) == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                        </select>
                        @error('estado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                        Actualizar Tratamiento
                    </button>
                    <a href="{{ route('tratamientos.index') }}" class="flex-1 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
