<?php

namespace App\Http\Controllers;

use App\Models\ProductoTerminado;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoTerminadoController extends Controller
{
    public function index()
    {
        $productos_terminados = ProductoTerminado::with('producto')->get();
        return view('producto_terminado.index', compact('productos_terminados'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('producto_terminado.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_producto_terminado' => 'required|max:30',
            'Descripcion_producto_terminado' => 'required|max:255',
            'Categoria_producto_terminado' => 'required|max:30',
            'Costo_producto_terminado' => 'required|numeric|min:0',
            'Precio_producto_terminado' => 'required|numeric|min:0',
            'Stock_actual_producto_terminado' => 'required|integer|min:0',
            'Stock_min_producto_terminado' => 'required|integer|min:0',
            'Estado_producto_terminado' => 'required|in:Activo,Inactivo',
            'Fecha_ingreso_producto_terminado' => 'required|date',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        ProductoTerminado::create($request->all());
        return redirect()->route('producto_terminado.index')->with('success', 'Producto terminado creado correctamente.');
    }

    public function edit($id)
    {
        $producto_terminado = ProductoTerminado::findOrFail($id);
        $productos = Producto::all();
        return view('producto_terminado.edit', compact('producto_terminado', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_producto_terminado' => 'required|max:30',
            'Descripcion_producto_terminado' => 'required|max:255',
            'Categoria_producto_terminado' => 'required|max:30',
            'Costo_producto_terminado' => 'required|numeric|min:0',
            'Precio_producto_terminado' => 'required|numeric|min:0',
            'Stock_actual_producto_terminado' => 'required|integer|min:0',
            'Stock_min_producto_terminado' => 'required|integer|min:0',
            'Estado_producto_terminado' => 'required|in:Activo,Inactivo',
            'Fecha_ingreso_producto_terminado' => 'required|date',
            'id_producto_FK' => 'required|exists:producto,id_producto',
        ]);

        $producto_terminado = ProductoTerminado::findOrFail($id);
        $producto_terminado->update($request->all());

        return redirect()->route('producto_terminado.index')->with('success', 'Producto terminado actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto_terminado = ProductoTerminado::findOrFail($id);
        $producto_terminado->delete();

        return redirect()->route('producto_terminado.index')->with('success', 'Producto terminado eliminado correctamente.');
    }
}
