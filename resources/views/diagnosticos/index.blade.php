@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 to-slate-100 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-amber-900">Diagnósticos</h1>
                <p class="text-slate-600 mt-1">Gestiona diagnósticos médicos</p>
            </div>
            <a href="{{ route('diagnosticos.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Diagnóstico
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
            @if($diagnosticos->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Paciente</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Descripción</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Fecha</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($diagnosticos as $diagnostico)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-slate-900 font-semibold">{{ $diagnostico->paciente->nombre }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ Str::limit($diagnostico->descripcion, 50) }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $diagnostico->fecha->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('diagnosticos.edit', $diagnostico->id) }}" class="px-3 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg font-semibold transition">
                                                Editar
                                            </a>
                                            <form action="{{ route('diagnosticos.destroy', $diagnostico->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Seguro?')" class="px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-semibold transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">
                    {{ $diagnosticos->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <h3 class="text-lg font-semibold text-slate-700 mb-2">No hay diagnósticos registrados</h3>
                    <a href="{{ route('diagnosticos.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg transition">
                        Crear Diagnóstico
                    </a>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
