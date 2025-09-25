<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = CategoriaProducto::all();
        return view('producto.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_producto' => 'required|max:30',
            'Stock_producto' => 'required|integer|min:0',
            'Stock_min_producto' => 'nullable|integer|min:0',
            'Stock_max_producto' => 'nullable|integer|min:0',
            'Precio_recibimiento' => 'nullable|numeric|min:0',
            'Precio_venta' => 'nullable|numeric|min:0',
            'Tipo_producto' => 'nullable|max:30',
            'Estado_producto' => 'required|in:Activo,Inactivo',
            'Fecha_ingreso_producto' => 'nullable|date',
            'id_categoria_FK' => 'required|exists:categoria_producto,id_categoria'
        ]);

        Producto::create($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = CategoriaProducto::all();
        return view('producto.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_producto' => 'required|max:30',
            'Stock_producto' => 'required|integer|min:0',
            'Stock_min_producto' => 'nullable|integer|min:0',
            'Stock_max_producto' => 'nullable|integer|min:0',
            'Precio_recibimiento' => 'nullable|numeric|min:0',
            'Precio_venta' => 'nullable|numeric|min:0',
            'Tipo_producto' => 'nullable|max:30',
            'Estado_producto' => 'required|in:Activo,Inactivo',
            'Fecha_ingreso_producto' => 'nullable|date',
            'id_categoria_FK' => 'required|exists:categoria_producto,id_categoria'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente.');
    }
}
