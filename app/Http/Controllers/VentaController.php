<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venta::with('usuario');

        // 🔎 Aplicar filtros si existen
        if ($request->filled('fecha_desde')) {
            $query->whereDate('Fecha_venta', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('Fecha_venta', '<=', $request->fecha_hasta);
        }

        if ($request->filled('estado')) {
            $query->where('Estado_venta', $request->estado);
        }

        if ($request->filled('usuario')) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('Nom_usuario', 'like', '%' . $request->usuario . '%');
            });
        }

        $ventas = $query->get();

        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('venta.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fecha_venta' => 'required|date',
            'Estado_venta' => 'required|in:Pendiente,Pagada,Anulada',
            'id_usuario_FK' => 'required|exists:usuario,id_usuario'
        ]);

        Venta::create($request->all());
        return redirect()->route('venta.index')->with('success', 'Venta registrada correctamente.');
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $usuarios = Usuario::all();
        return view('venta.edit', compact('venta', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Fecha_venta' => 'required|date',
            'Estado_venta' => 'required|in:Pendiente,Pagada,Anulada',
            'id_usuario_FK' => 'required|exists:usuario,id_usuario'
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());

        return redirect()->route('venta.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('venta.index')->with('success', 'Venta eliminada correctamente.');
    }
}
