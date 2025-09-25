<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Producto;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::with('producto')->get();
        return view('promocion.index', compact('promociones'));
    }

    public function create()
    {
        $productos = Producto::all();
        $promocion = null;
        return view('promocion.create', compact('productos', 'promocion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_promocion' => 'required|max:30',
            'Inicio_promocion' => 'required|date',
            'Fin_promocion' => 'required|date|after_or_equal:Inicio_promocion',
            'Cantidad_us_promocion' => 'required|integer|min:0',
            'Estado_promocion' => 'required|in:Activa,Inactiva',
            'Descripcion_promocion' => 'nullable|max:50',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        Promocion::create($request->all());
        return redirect()->route('promocion.index')->with('success', 'Promoción creada correctamente.');
    }

    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        $productos = Producto::all();
        return view('promocion.edit', compact('promocion', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_promocion' => 'required|max:30',
            'Inicio_promocion' => 'required|date',
            'Fin_promocion' => 'required|date|after_or_equal:Inicio_promocion',
            'Cantidad_us_promocion' => 'required|integer|min:0',
            'Estado_promocion' => 'required|in:Activa,Inactiva',
            'Descripcion_promocion' => 'nullable|max:50',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        $promocion = Promocion::findOrFail($id);
        $promocion->update($request->all());

        return redirect()->route('promocion.index')->with('success', 'Promoción actualizada correctamente.');
    }

    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->delete();

        return redirect()->route('promocion.index')->with('success', 'Promoción eliminada correctamente.');
    }
}
