<!DOCTYPE html>
<html lang="es">
    <script src="https://cdn.tailwindcss.com"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Médico | MedCare Professional</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-900 min-h-screen">

    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="text-2xl font-extrabold text-teal-700">MED<span class="text-blue-900">CARE</span></div>
        <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-900 hover:text-teal-600 transition">Iniciar Sesión</a>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
            <div>
                <span class="bg-teal-100 text-teal-800 px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase">Innovación Clínica</span>
                <h1 class="text-5xl lg:text-6xl font-extrabold text-blue-950 mt-6 leading-tight">
                    El futuro de la gestión médica en tus manos.
                </h1>
                <p class="text-lg text-slate-600 mt-6 leading-relaxed">
                    Unificamos tecnología y bienestar para ofrecerte una experiencia médica transparente, segura y eficiente.
                </p>
                
                <div class="flex gap-4 mt-10">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-blue-900 text-white font-bold rounded-xl hover:bg-teal-700 transition shadow-lg shadow-blue-200">
                        Registrar Paciente
                    </a>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-teal-700 to-blue-900 rounded-3xl p-12 text-white shadow-2xl">
                <h2 class="text-2xl font-bold mb-8 text-teal-100">Nuestros Servicios</h2>
                <div class="space-y-8">
                    <div class="flex gap-4 items-start">
                        <div class="bg-teal-500/20 p-3 rounded-lg text-xl border border-teal-400">📅</div>
                        <div>
                            <h4 class="font-bold text-teal-50">Agendamiento 24/7</h4>
                            <p class="text-teal-100/80 text-sm mt-1">Gestión de citas inteligente con especialistas certificados.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="bg-teal-500/20 p-3 rounded-lg text-xl border border-teal-400">📄</div>
                        <div>
                            <h4 class="font-bold text-teal-50">Historial Digital</h4>
                            <p class="text-teal-100/80 text-sm mt-1">Tu expediente médico siempre disponible y bajo estricta privacidad.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="bg-teal-500/20 p-3 rounded-lg text-xl border border-teal-400">💊</div>
                        <div>
                            <h4 class="font-bold text-teal-50">Control de Tratamientos</h4>
                            <p class="text-teal-100/80 text-sm mt-1">Seguimiento detallado de dosis, efectos y continuidad clínica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="border-t border-slate-200 pt-20">
            <h3 class="text-3xl font-bold text-center text-blue-950 mb-16">Estandares de Excelencia</h3>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center group">
                    <div class="text-4xl mb-4 text-teal-600 transition-transform group-hover:scale-110">🔒</div>
                    <h5 class="font-bold text-lg mb-2 text-blue-900">Seguridad Total</h5>
                    <p class="text-slate-500 text-sm">Cifrado de grado bancario para toda tu información confidencial.</p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl mb-4 text-teal-600 transition-transform group-hover:scale-110">🚀</div>
                    <h5 class="font-bold text-lg mb-2 text-blue-900">Rapidez de Gestión</h5>
                    <p class="text-slate-500 text-sm">Procesos optimizados para reducir tiempos de espera en clínica.</p>
                </div>
                <div class="text-center group">
                    <div class="text-4xl mb-4 text-teal-600 transition-transform group-hover:scale-110">👨‍⚕️</div>
                    <h5 class="font-bold text-lg mb-2 text-blue-900">Atención Especializada</h5>
                    <p class="text-slate-500 text-sm">Acceso directo a profesionales con experiencia en tu área de salud.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-blue-950 text-teal-100 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center text-sm">
            <p>&copy; 2026 MedCare Systems. Tecnología para la vida.</p>
        </div>
    </footer>

</body>
</html>