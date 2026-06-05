@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-md w-full">
        <div class="bg-white p-8 rounded-[2rem] shadow-[0_20px_50px_rgba(8,_112,_184,_0.1)] border border-slate-100">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <h2 class="text-3xl font-extrabold text-blue-950 tracking-tight">¿Olvidaste tu contraseña?</h2>
                <p class="mt-2 text-slate-500 text-sm">No te preocupes, ingresa tu correo y te enviaremos las instrucciones.</p>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-teal-50 text-teal-700 text-sm font-medium border border-teal-100 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1 ml-1">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all outline-none text-slate-700 @error('email') border-red-300 @enderror">
                    
                    @error('email')
                        <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold shadow-lg shadow-blue-900/20 transition-transform active:scale-[0.98]">
                    {{ __('Enviar enlace de restablecimiento') }}
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-blue-900 font-medium transition">
                    ← Volver al inicio de sesión
                </a>
            </div>
        </div>
    </div>
</div>
@endsection