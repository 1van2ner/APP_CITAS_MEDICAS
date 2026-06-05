<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Medicamento;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $medicamentos = Medicamento::with('tratamiento')->paginate(10);
        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        $tratamientos = Tratamiento::all();
        return view('medicamentos.create', compact('tratamientos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'nombre' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'frecuencia' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
            'proveedor' => 'required|string|max:255',
            'efectos_secundarios' => 'nullable|string',
        ]);

        try {
            Medicamento::create($validated);

            return redirect()->route('medicamentos.index')
                ->with('success', 'Medicamento creado exitosamente');
        } catch (\Exception $e) {
            \Log::error('Medicamento store error: ' . $e->getMessage(), ['exception' => $e]);
            return back()->withInput()->withErrors(['error' => 'Ocurrió un error al crear el medicamento. Revisa el log para más detalles.']);
        }
    }

    public function edit(Medicamento $medicamento)
    {
        $tratamientos = Tratamiento::all();
        return view('medicamentos.edit', compact('medicamento', 'tratamientos'));
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        $validated = $request->validate([
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'nombre' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'frecuencia' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
            'proveedor' => 'required|string|max:255',
            'efectos_secundarios' => 'nullable|string',
        ]);

        $medicamento->update($validated);

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento actualizado exitosamente');
    }

    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento eliminado exitosamente');
    }
}
