<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_cliente' => 'required|max:50',
            'Tel_cliente' => 'nullable|max:20',
            'Direc_cliente' => 'nullable|max:100',
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom_cliente' => 'required|max:50',
            'Tel_cliente' => 'nullable|max:20',
            'Direc_cliente' => 'nullable|max:100',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
