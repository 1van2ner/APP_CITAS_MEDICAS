<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pacientes = Paciente::paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:50',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'tipo_sangre' => 'required|string|max:5',
        ]);

        Paciente::create($validated);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado exitosamente');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:50',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'tipo_sangre' => 'required|string|max:5',
        ]);

        $paciente->update($validated);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado exitosamente');
    }

    public function destroy(Paciente $paciente)
    {
        try {
            $paciente->delete();

            return redirect()->route('pacientes.index')
                ->with('success', 'Paciente eliminado exitosamente');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle FK constraint violation
            if ($e->getCode() == '23000') {
                return redirect()->route('pacientes.index')
                    ->with('error', 'No se puede eliminar este paciente porque tiene registros relacionados (citas, diagnósticos, etc.). Elimina esos registros primero.');
            }
            throw $e;
        }
    }
}
