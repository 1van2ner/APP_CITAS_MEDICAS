<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $medicos = Medico::paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:medicos',
            'licencia' => 'required|string|unique:medicos',
            'años_experiencia' => 'required|integer|min:0',
        ]);

        Medico::create($validated);

        return redirect()->route('medicos.index')
            ->with('success', 'Médico creado exitosamente');
    }

    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, Medico $medico)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:medicos,email,' . $medico->id,
            'licencia' => 'required|string|unique:medicos,licencia,' . $medico->id,
            'años_experiencia' => 'required|integer|min:0',
        ]);

        $medico->update($validated);

        return redirect()->route('medicos.index')
            ->with('success', 'Médico actualizado exitosamente');
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Médico eliminado exitosamente');
    }
}
