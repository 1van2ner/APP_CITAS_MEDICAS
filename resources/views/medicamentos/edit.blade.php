@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-slate-100 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('medicamentos.index') }}" class="inline-flex items-center text-red-600 hover:text-red-700 font-semibold mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver a Medicamentos
            </a>
            <h1 class="text-3xl font-bold text-red-900">Editar Medicamento</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nombre</label>
                        <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('nombre', $medicamento->nombre) }}">
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Principio Activo</label>
                        <input type="text" name="principio_activo" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('principio_activo', $medicamento->principio_activo) }}">
                        @error('principio_activo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Presentación</label>
                        <input type="text" name="presentacion" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('presentacion', $medicamento->presentacion) }}">
                        @error('presentacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Dosis</label>
                        <input type="text" name="dosis" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('dosis', $medicamento->dosis) }}">
                        @error('dosis') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fabricante</label>
                        <input type="text" name="fabricante" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('fabricante', $medicamento->fabricante) }}">
                        @error('fabricante') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Lote</label>
                        <input type="text" name="lote" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('lote', $medicamento->lote) }}">
                        @error('lote') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('fecha_vencimiento', $medicamento->fecha_vencimiento->format('Y-m-d')) }}">
                        @error('fecha_vencimiento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Precio</label>
                        <input type="number" name="precio" required step="0.01" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('precio', $medicamento->precio) }}">
                        @error('precio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                        Actualizar Medicamento
                    </button>
                    <a href="{{ route('medicamentos.index') }}" class="flex-1 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
