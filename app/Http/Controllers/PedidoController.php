<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pedido::with('cliente');

        // 🔹 Filtro por estado
        if ($request->filled('estado')) {
            $query->where('Estado_pedido', $request->estado);
        }

        // 🔹 Filtro por cliente
        if ($request->filled('cliente')) {
            $query->whereHas('cliente', function ($q) use ($request) {
                $q->where('Nom_cliente', 'like', '%' . $request->cliente . '%');
            });
        }

        // 🔹 Filtro por fecha desde
        if ($request->filled('fecha_desde')) {
            $query->whereDate('Fecha_pedido', '>=', $request->fecha_desde);
        }

        // 🔹 Filtro por fecha hasta
        if ($request->filled('fecha_hasta')) {
            $query->whereDate('Fecha_pedido', '<=', $request->fecha_hasta);
        }

        $pedidos = $query->paginate(10);
        $clientes = Cliente::all(); // para un select si lo quieres

        return view('pedido.index', compact('pedidos', 'clientes'));
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
