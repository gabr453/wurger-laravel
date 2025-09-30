<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index(Request $request)
    {
        $query = DetalleVenta::with('venta');

        // 🔎 Filtros
        if ($request->filled('cantidad_min')) {
            $query->where('Cantidad_detalle_venta', '>=', $request->cantidad_min);
        }

        if ($request->filled('cantidad_max')) {
            $query->where('Cantidad_detalle_venta', '<=', $request->cantidad_max);
        }

        if ($request->filled('precio_min')) {
            $query->where('Precio_unitario', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('Precio_unitario', '<=', $request->precio_max);
        }

        if ($request->filled('venta')) {
            $query->whereHas('venta', function ($q) use ($request) {
                $q->where('id_venta', $request->venta);
            });
        }

        $detalles = $query->get();
        $ventas = Venta::all();

        return view('detalle_venta.index', compact('detalles', 'ventas'));
    }

    public function create()
    {
        $ventas = Venta::all();
        return view('detalle_venta.create', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Cantidad_detalle_venta' => 'required|integer|min:1',
            'Precio_unitario' => 'required|numeric|min:0',
            'Subtotal' => 'required|numeric|min:0',
            'Descuento' => 'nullable|numeric|min:0',
            'id_venta_FK' => 'required|exists:venta,id_venta'
        ]);

        DetalleVenta::create($request->all());
        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta creado correctamente.');
    }

    public function edit($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $ventas = Venta::all();
        return view('detalle_venta.edit', compact('detalle', 'ventas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Cantidad_detalle_venta' => 'required|integer|min:1',
            'Precio_unitario' => 'required|numeric|min:0',
            'Subtotal' => 'required|numeric|min:0',
            'Descuento' => 'nullable|numeric|min:0',
            'id_venta_FK' => 'required|exists:venta,id_venta'
        ]);

        $detalle = DetalleVenta::findOrFail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta actualizado correctamente.');
    }

    public function destroy($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $detalle->delete();

        return redirect()->route('detalle_venta.index')->with('success', 'Detalle de venta eliminado correctamente.');
    }
}
