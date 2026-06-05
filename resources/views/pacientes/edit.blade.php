@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-slate-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('pacientes.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a Pacientes
            </a>
            <h1 class="text-3xl font-bold text-blue-900">Editar Paciente</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nombre</label>
                        <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('nombre', $paciente->nombre) }}">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Apellido</label>
                        <input type="text" name="apellido" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('apellido', $paciente->apellido) }}">
                        @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento?->format('Y-m-d')) }}">
                        @error('fecha_nacimiento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Género</label>
                        <select name="genero" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="Masculino" {{ old('genero', $paciente->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('genero', $paciente->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro" {{ old('genero', $paciente->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('genero') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Teléfono</label>
                        <input type="tel" name="telefono" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('telefono', $paciente->telefono) }}">
                        @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tipo de Sangre</label>
                        <select name="tipo_sangre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="O+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="A+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('tipo_sangre', $paciente->tipo_sangre) == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                        @error('tipo_sangre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Dirección</label>
                    <input type="text" name="direccion" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ old('direccion', $paciente->direccion) }}">
                    @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                        Actualizar Paciente
                    </button>
                    <a href="{{ route('pacientes.index') }}" class="flex-1 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
