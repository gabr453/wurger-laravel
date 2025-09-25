<?php

namespace App\Http\Controllers;

use App\Models\DetalleMovimiento;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class DetalleMovimientoController extends Controller
{
    public function index()
    {
        $detalles = DetalleMovimiento::with('movimiento')->get();
        return view('detalle_movimiento.index', compact('detalles'));
    }

    public function create()
    {
        $movimientos = Movimiento::all();
        return view('detalle_movimiento.create', compact('movimientos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Cantidad_detalle_movimiento' => 'required|integer|min:0',
            'id_movimiento_FK' => 'required|exists:movimiento,id_movimiento',
        ]);

        DetalleMovimiento::create($request->all());

        return redirect()->route('detalle_movimiento.index')->with('success', 'Detalle registrado correctamente.');
    }

    public function edit($id)
    {
        $detalle = DetalleMovimiento::findOrFail($id);
        $movimientos = Movimiento::all();
        return view('detalle_movimiento.edit', compact('detalle', 'movimientos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Cantidad_detalle_movimiento' => 'required|integer|min:0',
            'id_movimiento_FK' => 'required|exists:movimiento,id_movimiento',
        ]);

        $detalle = DetalleMovimiento::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle_movimiento.index')->with('success', 'Detalle actualizado correctamente.');
    }

    public function destroy($id)
    {
        $detalle = DetalleMovimiento::findOrFail($id);
        $detalle->delete();

        return redirect()->route('detalle_movimiento.index')->with('success', 'Detalle eliminado correctamente.');
    }
}
