<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with('producto')->get();
        return view('movimiento.index', compact('movimientos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('movimiento.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tipo_movimiento' => 'required|in:Entrada,Salida',
            'Cantidad_movimiento' => 'required|integer|min:0',
            'Fecha_movimiento' => 'required|date',
            'Descripcion_movimiento' => 'nullable|string|max:30',
            'id_producto_FK' => 'required|exists:producto,id_producto'
        ]);

        Movimiento::create($request->all());

        return redirect()->route('movimiento.index')->with('success', 'Movimiento registrado correctamente.');
    }

    public function edit($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $productos = Producto::all();
        return view('movimiento.edit', compact('movimiento', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Tipo_movimiento' => 'required|in:Entrada,Salida',
            'Cantidad_movimiento' => 'required|integer|min:0',
            'Fecha_movimiento' => 'required|date',
            'Descripcion_movimiento' => 'nullable|string|max:30',
            'id_producto_FK' => 'required|exists:producto,id_producto'
        ]);

        $movimiento = Movimiento::findOrFail($id);
        $movimiento->update($request->all());

        return redirect()->route('movimiento.index')->with('success', 'Movimiento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->delete();

        return redirect()->route('movimiento.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}
