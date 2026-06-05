@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 to-slate-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('diagnosticos.index') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-semibold mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a Diagnósticos
            </a>
            <h1 class="text-3xl font-bold text-amber-900">Editar Diagnóstico</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('diagnosticos.update', $diagnostico->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Paciente</label>
                        <select name="paciente_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ old('paciente_id', $diagnostico->paciente_id) == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->nombre }} {{ $paciente->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('paciente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Médico</label>
                        <select name="medico_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}" {{ old('medico_id', $diagnostico->medico_id) == $medico->id ? 'selected' : '' }}>
                                    {{ $medico->nombre }} {{ $medico->apellido }}
                                </option>
                            @endforeach
                        </select>
                        @error('medico_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Descripción</label>
                        <textarea name="descripcion" required rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('descripcion', $diagnostico->descripcion) }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha del Diagnóstico</label>
                            <input type="datetime-local" name="fecha" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent" value="{{ old('fecha', optional($diagnostico->fecha)->format('Y-m-d\TH:i')) }}">
                            @error('fecha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Gravedad</label>
                            <input type="text" name="gravedad" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent" value="{{ old('gravedad', $diagnostico->gravedad) }}">
                            @error('gravedad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tipo de Diagnóstico</label>
                        <input type="text" name="tipo_diagnostico" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent" value="{{ old('tipo_diagnostico', $diagnostico->tipo_diagnostico) }}">
                        @error('tipo_diagnostico') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Observaciones</label>
                        <textarea name="recomendaciones" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('recomendaciones', $diagnostico->recomendaciones) }}</textarea>
                        @error('recomendaciones') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg transition">
                        Actualizar Diagnóstico
                    </button>
                    <a href="{{ route('diagnosticos.index') }}" class="flex-1 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
