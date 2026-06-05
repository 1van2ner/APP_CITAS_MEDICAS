@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-50 via-white to-teal-50 py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="absolute top-8 right-8 md:top-12 md:right-12">
        <a href="/" class="flex items-center space-x-1 hover:opacity-80 transition-opacity">
            <span class="text-3xl font-black text-blue-900 tracking-tighter">Med</span>
            <span class="text-3xl font-black text-teal-500 tracking-tighter">Care+</span>
        </a>
    </div>

    <div class="max-w-md w-full">
        <div class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_25px_50px_-12px_rgba(0,0,0,0.1)] border border-white/50">
            
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-gradient-to-br from-blue-600 to-teal-500 text-white mb-6 shadow-lg shadow-blue-500/30">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-black text-slate-900 tracking-tight">Crea tu cuenta</h2>
                <p class="mt-3 text-slate-500 text-base">Únete a la nueva era de gestión médica</p>
            </div>

            <form class="space-y-5" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="space-y-4">
                    @foreach(['name' => 'Nombre completo', 'email' => 'Correo electrónico', 'password' => 'Contraseña', 'password_confirmation' => 'Confirmar contraseña'] as $field => $label)
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">{{ $label }}</label>
                        <input id="{{ $field }}" type="{{ str_contains($field, 'password') ? 'password' : 'text' }}" 
                               name="{{ $field === 'password_confirmation' ? 'password_confirmation' : $field }}" 
                               required 
                               class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:bg-white focus:border-teal-500 transition-all outline-none text-slate-700 shadow-inner">
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="w-full py-4 mt-8 rounded-2xl bg-gradient-to-r from-blue-900 to-blue-700 hover:from-blue-800 hover:to-blue-600 text-white font-bold text-lg shadow-xl shadow-blue-900/20 transition-all hover:-translate-y-1 active:scale-95">
                    {{ __('Registrarse ahora') }}
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-slate-500">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="text-teal-600 font-black hover:text-teal-700 hover:underline decoration-2">Inicia sesión aquí</a>
            </div>

            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                <div class="relative flex justify-center text-xs uppercase font-bold tracking-widest text-slate-400 bg-white/50 px-4">O continuar con</div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('auth.google') }}" class="flex items-center justify-center py-4 bg-white border border-slate-200 rounded-2xl hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5 mr-3" alt="Google">
                    <span class="font-semibold text-slate-700">Google</span>
                </a>

                <a href="{{ route('auth.github') }}" class="flex items-center justify-center py-4 bg-white border border-slate-200 rounded-2xl hover:border-slate-800 hover:shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.22-3.33.555-4.035-1.425-4.035-1.425-.54-1.38-1.335-1.755-1.335-1.755-1.095-.75.075-.735.075-.735 1.215.075 1.86 1.245 1.86 1.245 1.08 1.83 2.82 1.305 3.51.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.285 0 .315.21.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"></path></svg>
                    <span class="font-semibold text-slate-700">GitHub</span>
                </a>
            </div>
        </div>
        
        <p class="text-center text-slate-400 text-xs mt-10">
            Al registrarte, aceptas nuestros <a href="#" class="text-teal-600 hover:underline font-bold">Términos de servicio</a>
        </p>
    </div>
</div>
@endsection