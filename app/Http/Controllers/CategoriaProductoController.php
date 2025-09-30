<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriaProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = CategoriaProducto::query();

        // Filtros
        if ($request->filled('nombre')) {
            $query->where('Nombre_categoria', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('cantidad_min')) {
            $query->where('cantidad_categoria', '>=', $request->cantidad_min);
        }

        if ($request->filled('cantidad_max')) {
            $query->where('cantidad_categoria', '<=', $request->cantidad_max);
        }

        $categorias = $query->orderBy('id_categoria', 'asc')->get();

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
        try {
            $categoria = CategoriaProducto::findOrFail($id);
            $categoria->delete();

            return redirect()->route('categoria_producto.index')->with('success', 'Categoría eliminada correctamente.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return redirect()->route('categoria_producto.index')
                                 ->with('error', 'No se puede eliminar esta categoría porque tiene productos asociados.');
            }
            return redirect()->route('categoria_producto.index')
                             ->with('error', 'Error al eliminar la categoría.');
        }
    }
}
