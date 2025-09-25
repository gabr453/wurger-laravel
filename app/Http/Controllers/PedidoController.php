<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente')->get();
        return view('pedido.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('pedido.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fecha_pedido' => 'required|date',
            'Observaciones_devoluciones' => 'nullable|string|max:30',
            'Estado_pedido' => 'required|in:Pendiente,Entregado,Cancelado',
            'id_cliente_FK' => 'required|exists:cliente,id_cliente',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedido.index')->with('success', 'Pedido creado correctamente.');
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::all();
        return view('pedido.edit', compact('pedido', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Fecha_pedido' => 'required|date',
            'Observaciones_devoluciones' => 'nullable|string|max:30',
            'Estado_pedido' => 'required|in:Pendiente,Entregado,Cancelado',
            'id_cliente_FK' => 'required|exists:cliente,id_cliente',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedido.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedido.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
