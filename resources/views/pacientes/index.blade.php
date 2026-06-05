@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-slate-100 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-blue-900">Pacientes</h1>
                <p class="text-slate-600 mt-1">Gestiona todos los registros de pacientes</p>
            </div>
            <a href="{{ route('pacientes.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Nuevo Paciente
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
            @if($pacientes->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Nombre</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Cédula</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Email</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Teléfono</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach($pacientes as $paciente)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-900">{{ $paciente->nombre }} {{ $paciente->apellido }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">{{ $paciente->cedula }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $paciente->email }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $paciente->telefono }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="px-3 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg font-semibold transition">
                                                Editar
                                            </a>
                                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="inline">
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
                    {{ $pacientes->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 00.586 13H4"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-slate-700 mb-2">No hay pacientes registrados</h3>
                    <p class="text-slate-500 mb-6">Comienza creando tu primer paciente</p>
                    <a href="{{ route('pacientes.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                        Crear Paciente
                    </a>
                </div>
            @endif
        </div>

        <!-- Botón Volver -->
        <div class="mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
