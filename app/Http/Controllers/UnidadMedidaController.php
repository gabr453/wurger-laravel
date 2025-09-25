<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use App\Models\Producto;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $unidades = UnidadMedida::with('producto')->get();
        return view('unidad_medida.index', compact('unidades'));
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
