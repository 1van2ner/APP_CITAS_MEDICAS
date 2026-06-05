@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-slate-100 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-red-900">Medicamentos</h1>
                <p class="text-slate-600 mt-1">Gestiona inventario de medicamentos</p>
            </div>
            <a href="{{ route('medicamentos.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Medicamento
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
            @if($medicamentos->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Nombre</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Principio Activo</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Fabricante</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Vencimiento</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Precio</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($medicamentos as $medicamento)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-slate-900 font-semibold">{{ $medicamento->nombre }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $medicamento->dosis }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ optional($medicamento->tratamiento)->nombre ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                            {{ $medicamento->duracion ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">{{ $medicamento->proveedor ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="px-3 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg font-semibold transition">
                                                Editar
                                            </a>
                                            <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" class="inline">
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
                    {{ $medicamentos->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <h3 class="text-lg font-semibold text-slate-700 mb-2">No hay medicamentos registrados</h3>
                    <a href="{{ route('medicamentos.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                        Crear Medicamento
                    </a>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-red-600 hover:text-red-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
