<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use App\Models\Producto;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index(Request $request)
    {
        $query = UnidadMedida::with('producto');

        // Filtro por nombre
        if ($request->filled('nombre')) {
            $query->where('Nombre_unidad', 'like', '%' . $request->nombre . '%');
        }

        // Filtro por rango de cantidad
        if ($request->filled('cantidad_min')) {
            $query->where('Cantidad_unidad', '>=', $request->cantidad_min);
        }
        if ($request->filled('cantidad_max')) {
            $query->where('Cantidad_unidad', '<=', $request->cantidad_max);
        }

        // Filtro por producto
        if ($request->filled('producto')) {
            $query->where('id_producto_FK', $request->producto);
        }

        $unidades = $query->orderBy('id_unidad', 'asc')->get();
        $productos = Producto::all();

        return view('unidad_medida.index', compact('unidades', 'productos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('unidad_medida.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_unidad' => 'required|max:30',
            'Cantidad_unidad' => 'required|integer|min:0',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        UnidadMedida::create($request->all());
        return redirect()->route('unidad_medida.index')->with('success', 'Unidad creada correctamente.');
    }

    public function edit($id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $productos = Producto::all();
        return view('unidad_medida.edit', compact('unidad', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_unidad' => 'required|max:30',
            'Cantidad_unidad' => 'required|integer|min:0',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        $unidad = UnidadMedida::findOrFail($id);
        $unidad->update($request->all());

        return redirect()->route('unidad_medida.index')->with('success', 'Unidad actualizada correctamente.');
    }

    public function destroy($id)
    {
        $unidad = UnidadMedida::findOrFail($id);
        $unidad->delete();

        return redirect()->route('unidad_medida.index')->with('success', 'Unidad eliminada correctamente.');
    }
}
