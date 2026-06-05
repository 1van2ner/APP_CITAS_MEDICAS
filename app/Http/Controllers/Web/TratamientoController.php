<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tratamiento;
use App\Models\Diagnostico;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tratamientos = Tratamiento::with(['diagnostico', 'medico'])->paginate(10);
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('tratamientos.create', compact('diagnosticos', 'medicos', 'pacientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'diagnostico_id' => 'required|exists:diagnosticos,id',
            'medico_id' => 'required|exists:medicos,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'duracion' => 'required|string|max:100',
            'estado' => 'required|in:activo,completado,suspendido',
            'frecuencia_administracion' => 'required|string|max:100',
        ]);

        Tratamiento::create($validated);

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento creado exitosamente');
    }

    public function edit(Tratamiento $tratamiento)
    {
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();
        return view('tratamientos.edit', compact('tratamiento', 'diagnosticos', 'medicos'));
    }

    public function update(Request $request, Tratamiento $tratamiento)
    {
        $validated = $request->validate([
            'diagnostico_id' => 'required|exists:diagnosticos,id',
            'medico_id' => 'required|exists:medicos,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'duracion' => 'required|string|max:100',
            'estado' => 'required|in:activo,completado,suspendido',
            'frecuencia_administracion' => 'required|string|max:100',
        ]);

        $tratamiento->update($validated);

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento actualizado exitosamente');
    }

    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('tratamientos.index')
            ->with('success', 'Tratamiento eliminado exitosamente');
    }
}
