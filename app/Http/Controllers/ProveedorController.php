<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $query = Proveedor::with('usuario');

        // filtros dinámicos
        if ($request->filled('nombre')) {
            $query->where('Nom_proveedor', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('telefono')) {
            $query->where('Tel_proveedor', 'like', '%' . $request->telefono . '%');
        }

        if ($request->filled('email')) {
            $query->where('Email_proveedor', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('direccion')) {
            $query->where('Direccion_proveedor', 'like', '%' . $request->direccion . '%');
        }

        if ($request->filled('estado')) {
            $query->where('Estado_proveedor', $request->estado);
        }

        if ($request->filled('usuario')) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('Nom_usuario', 'like', '%' . $request->usuario . '%');
            });
        }

        $proveedores = $query->paginate(10)->appends($request->all());

        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        $usuarios = User::all();
        $proveedor = null;
        return view('proveedor.create', compact('usuarios', 'proveedor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_proveedor' => 'required|max:30',
            'Tel_proveedor' => 'nullable|max:20',
            'Email_proveedor' => 'nullable|email|max:30',
            'Direccion_proveedor' => 'nullable|max:30',
            'Estado_proveedor' => 'required|in:Activo,Inactivo',
            'id_usuario_FK' => 'required|exists:usuario,id_usuario',
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $usuarios = User::all();
        return view('proveedor.edit', compact('proveedor', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom_proveedor' => 'required|max:30',
            'Tel_proveedor' => 'nullable|max:20',
            'Email_proveedor' => 'nullable|email|max:30',
            'Direccion_proveedor' => 'nullable|max:30',
            'Estado_proveedor' => 'required|in:Activo,Inactivo',
            'id_usuario_FK' => 'required|exists:usuario,id_usuario',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedor.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
