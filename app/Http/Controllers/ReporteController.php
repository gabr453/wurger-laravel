<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Promocion;

class ReporteController extends Controller
{
    // Vista índice con listado de reportes
    public function index()
    {
        return view('reportes.index');
    }

    // Reporte PDF: Detalle Venta
    public function detalleVentaPDF()
    {
        $detalleVentas = DetalleVenta::with('venta')->get();
        $pdf = Pdf::loadView('reportes.detalle_venta', compact('detalleVentas'));
        return $pdf->download('reporte_detalle_venta.pdf');
    }

    // Reporte PDF: Ventas
    public function ventasPDF()
    {
        $ventas = Venta::with('usuario')->get();
        $pdf = Pdf::loadView('reportes.ventas', compact('ventas'));
        return $pdf->download('reporte_ventas.pdf');
    }

    // Reporte PDF: Productos
    public function productosPDF()
    {
        $productos = Producto::all();
        $pdf = Pdf::loadView('reportes.productos', compact('productos'));
        return $pdf->download('reporte_productos.pdf');
    }

    // Reporte PDF: Clientes
    public function clientesPDF()
    {
        $clientes = Cliente::all();
        $pdf = Pdf::loadView('reportes.clientes', compact('clientes'));
        return $pdf->download('reporte_clientes.pdf');
    }

    // Reporte PDF: Promociones
    public function promocionesPDF()
    {
        $promociones = Promocion::all();
        $pdf = Pdf::loadView('reportes.promociones', compact('promociones'));
        return $pdf->download('reporte_promociones.pdf');
    }
}
