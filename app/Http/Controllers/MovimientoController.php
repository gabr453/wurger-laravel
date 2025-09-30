<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index(Request $request)
    {
        $query = Movimiento::with('producto');

        // FILTROS
        if ($request->filled('Tipo_movimiento')) {
            $query->where('Tipo_movimiento', $request->Tipo_movimiento);
        }

        if ($request->filled('id_producto_FK')) {
            $query->where('id_producto_FK', $request->id_producto_FK);
        }

        if ($request->filled('fecha_desde')) {
            $query->whereDate('Fecha_movimiento', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('Fecha_movimiento', '<=', $request->fecha_hasta);
        }

        if ($request->filled('descripcion')) {
            $query->where('Descripcion_movimiento', 'LIKE', "%{$request->descripcion}%");
        }

        // Paginación con filtros persistentes
        $movimientos = $query->orderBy('Fecha_movimiento', 'desc')->paginate(10)->appends($request->all());

        $productos = Producto::all();

        return view('movimiento.index', compact('movimientos', 'productos'));
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
