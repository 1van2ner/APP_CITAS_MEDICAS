<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $citas = Cita::with(['paciente', 'medico'])->paginate(10);
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('citas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:500',
            'estado' => 'required|string|max:100',
            'observaciones' => 'nullable|string',
            'sala' => 'required|string|max:100',
        ]);

        // Asegurar que la columna obligatoria 'observaciones' esté presente en el array
        if (!array_key_exists('observaciones', $validated)) {
            $validated['observaciones'] = '';
        }

        Cita::create($validated);

        return redirect()->route('citas.index')
            ->with('success', 'Cita creada exitosamente');
    }

    public function edit(Cita $cita)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));
    }

    public function update(Request $request, Cita $cita)
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date_format:Y-m-d\TH:i',
            'motivo' => 'required|string|max:500',
            'estado' => 'required|string|max:100',
            'observaciones' => 'nullable|string',
            'sala' => 'required|string|max:100',
        ]);

        $cita->update($validated);

        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada exitosamente');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada exitosamente');
    }
}
