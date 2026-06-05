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
            <h1 class="text-3xl font-bold text-red-900">Crear Medicamento</h1>
        </div>

        {{-- Mostrar errores generales si los hay --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <form action="{{ route('medicamentos.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nombre</label>
                        <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('nombre') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Principio Activo</label>
                        <input type="text" name="principio_activo" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('principio_activo') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Presentación</label>
                        <input type="text" name="presentacion" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('presentacion') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Dosis</label>
                        <input type="text" name="dosis" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('dosis') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fabricante</label>
                        <input type="text" name="fabricante" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('fabricante') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Lote</label>
                        <input type="text" name="lote" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('lote') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('fecha_vencimiento') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Precio</label>
                        <input type="number" name="precio" required step="0.01" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" value="{{ old('precio') }}">
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition shadow-md">
                        Crear Medicamento
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