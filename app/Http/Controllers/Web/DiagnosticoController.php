<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Diagnostico;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $diagnosticos = Diagnostico::with(['paciente', 'medico'])->paginate(10);
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('diagnosticos.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'descripcion' => 'required|string',
            'fecha' => 'required|date_format:Y-m-d\TH:i',
            'gravedad' => 'required|string|max:100',
            'recomendaciones' => 'nullable|string',
            'tipo_diagnostico' => 'required|string|max:100',
        ]);

        $validated['recomendaciones'] = $validated['recomendaciones'] ?? '';

        Diagnostico::create($validated);

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnóstico creado exitosamente');
    }

    public function edit(Diagnostico $diagnostico)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('diagnosticos.edit', compact('diagnostico', 'pacientes', 'medicos'));
    }

    public function update(Request $request, Diagnostico $diagnostico)
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'descripcion' => 'required|string',
            'fecha' => 'required|date_format:Y-m-d\TH:i',
            'gravedad' => 'required|string|max:100',
            'recomendaciones' => 'nullable|string',
            'tipo_diagnostico' => 'required|string|max:100',
        ]);

        $diagnostico->update($validated);

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnóstico actualizado exitosamente');
    }

    public function destroy(Diagnostico $diagnostico)
    {
        try {
            $diagnostico->delete();

            return redirect()->route('diagnosticos.index')
                ->with('success', 'Diagnóstico eliminado exitosamente');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle FK constraint violation
            if ($e->getCode() == '23000') {
                return redirect()->route('diagnosticos.index')
                    ->with('error', 'No se puede eliminar este diagnóstico porque tiene tratamientos asociados. Elimina los tratamientos primero.');
            }
            throw $e;
        }
    }
}
