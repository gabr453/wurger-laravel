<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use App\Models\Venta;
use Illuminate\Http\Request;

class FormaPagoController extends Controller
{
    public function index()
    {
        $formasPago = FormaPago::with('venta')->get();
        return view('forma_pago.index', compact('formasPago'));
    }

    public function create()
    {
        $ventas = Venta::all();
        return view('forma_pago.create', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_fp' => 'required|string|max:30',
            'id_venta_FK' => 'required|exists:venta,id_venta',
        ]);

        FormaPago::create($request->all());
        return redirect()->route('forma_pago.index')->with('success', 'Forma de pago creada correctamente.');
    }

    public function show(FormaPago $formaPago)
    {
        return view('forma_pago.show', compact('formaPago'));
    }

    public function edit(FormaPago $formaPago)
    {
        $ventas = Venta::all();
        return view('forma_pago.edit', compact('formaPago', 'ventas'));
    }

    public function update(Request $request, FormaPago $formaPago)
    {
        $request->validate([
            'Nombre_fp' => 'required|string|max:30',
            'id_venta_FK' => 'required|exists:venta,id_venta',
        ]);

        $formaPago->update($request->all());
        return redirect()->route('forma_pago.index')->with('success', 'Forma de pago actualizada correctamente.');
    }

    public function destroy(FormaPago $formaPago)
    {
        $formaPago->delete();
        return redirect()->route('forma_pago.index')->with('success', 'Forma de pago eliminada correctamente.');
    }
}
