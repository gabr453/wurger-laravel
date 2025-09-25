<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaProducto::all();
        return view('categoria_producto.index', compact('categorias'));
    }

    public function create()
    {
        return view('categoria_producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_categoria' => 'required|max:30',
            'cantidad_categoria' => 'required|integer|min:0'
        ]);

        CategoriaProducto::create($request->all());
        return redirect()->route('categoria_producto.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        return view('categoria_producto.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_categoria' => 'required|max:30',
            'cantidad_categoria' => 'required|integer|min:0'
        ]);

        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categoria_producto.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria_producto.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
