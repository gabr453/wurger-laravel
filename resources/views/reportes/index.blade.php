@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<style>
    .report-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .report-card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        flex: 1 1 calc(50% - 40px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .report-card h2 {
        margin-top: 0;
        font-size: 1.5em;
        color: #333;
    }

    .report-card p {
        color: #666;
        font-size: 0.95em;
    }

    .report-card .btn {
        margin-top: 10px;
    }
</style>

<h1 class="section-title">Reportes</h1>

<div class="report-grid">
    <div class="report-card">
        <h2>Detalle de Ventas</h2>
        <p>Reporte detallado de todas las ventas registradas, incluyendo cantidades, precios unitarios y descuentos.</p>
        <a href="{{ route('reportes.detalleVenta') }}" class="btn btn-success">📄 Descargar PDF</a>
    </div>

    <div class="report-card">
        <h2>Ventas</h2>
        <p>Listado completo de todas las ventas realizadas, con fechas, usuarios responsables y estado.</p>
        <a href="{{ route('reportes.ventas') }}" class="btn btn-success">📄 Descargar PDF</a>
    </div>

    <div class="report-card">
        <h2>Productos</h2>
        <p>Reporte de todos los productos registrados, incluyendo stock, precios y categorías.</p>
        <a href="{{ route('reportes.productos') }}" class="btn btn-success">📄 Descargar PDF</a>
    </div>

    <div class="report-card">
        <h2>Clientes</h2>
        <p>Informe completo de todos los clientes registrados, con datos de contacto y detalles relevantes.</p>
        <a href="{{ route('reportes.clientes') }}" class="btn btn-success">📄 Descargar PDF</a>
    </div>

    <div class="report-card">
        <h2>Promociones</h2>
        <p>Resumen de todas las promociones activas e inactivas, con fechas de inicio y fin y descripciones.</p>
        <a href="{{ route('reportes.promociones') }}" class="btn btn-success">📄 Descargar PDF</a>
    </div>
</div>
@endsection
