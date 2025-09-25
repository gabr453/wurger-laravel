<?php

namespace App\Http\Controllers;

use App\Models\TipoDescuento;
use App\Models\FormaPago;
use Illuminate\Http\Request;

class TipoDescuentoController extends Controller
{
    public function index()
    {
        $tiposDescuento = TipoDescuento::with('formaPago')->get();
        return view('tipo_descuento.index', compact('tiposDescuento'));
    }

    public function create()
    {
        $formasPago = FormaPago::all();
        $tipoDescuento = null; // Necesario para el formulario compartido
        return view('tipo_descuento.create', compact('formasPago', 'tipoDescuento'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_tipo_descuento' => 'required|max:30',
            'id_fp_FK' => 'required|exists:forma_pago,id_fp'
        ]);

        TipoDescuento::create($request->all());
        return redirect()->route('tipo_descuento.index')->with('success', 'Tipo de descuento creado correctamente.');
    }

    public function show($id)
    {
        $tipoDescuento = TipoDescuento::with('formaPago')->findOrFail($id);
        return view('tipo_descuento.show', compact('tipoDescuento'));
    }

    public function edit($id)
    {
        $tipoDescuento = TipoDescuento::findOrFail($id);
        $formasPago = FormaPago::all();
        return view('tipo_descuento.edit', compact('tipoDescuento', 'formasPago'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre_tipo_descuento' => 'required|max:30',
            'id_fp_FK' => 'required|exists:forma_pago,id_fp'
        ]);

        $tipoDescuento = TipoDescuento::findOrFail($id);
        $tipoDescuento->update($request->all());

        return redirect()->route('tipo_descuento.index')->with('success', 'Tipo de descuento actualizado correctamente.');
    }

    public function destroy($id)
    {
        $tipoDescuento = TipoDescuento::findOrFail($id);
        $tipoDescuento->delete();

        return redirect()->route('tipo_descuento.index')->with('success', 'Tipo de descuento eliminado correctamente.');
    }
}
