<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WURGER - @yield('title')</title>

  {{-- CSS propio --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Font Awesome --}}
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  {{-- Google Fonts --}}
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Righteous&display=swap"
    rel="stylesheet" />

  @stack('styles')
</head>

<body>
  {{-- Sidebar --}}
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h3>Menú Principal</h3>
    </div>
    <ul class="sidebar-menu">
      <li><a href="{{ url('dashboard') }}"><i class="fas fa-chart-line"></i> Dashboard</a></li>
      
      {{-- Inventario --}}
      <li class="has-submenu">
        <a href="#" class="submenu-toggle">
          <i class="fas fa-boxes"></i> Inventario
          <i class="fas fa-chevron-down chevron-icon"></i>
        </a>
        <ul class="submenu">
          <li><a href="{{ url('producto') }}">Producto</a></li>
          <li><a href="{{ url('producto_terminado') }}">Producto Terminado</a></li>
          <li><a href="{{ url('unidad_medida') }}">Unidad de Medida</a></li>
          <li><a href="{{ url('movimiento') }}">Movimiento</a></li>
          <li><a href="{{ url('detalle_movimiento') }}">Detalle Movimiento</a></li>
          <li><a href="{{ url('proveedor') }}">Proveedor</a></li>
           <li><a href="{{ url('categoria_producto') }}">Categoria Producto</a></li>
        </ul>
      </li>

      {{-- Ventas --}}
      <li class="has-submenu">
        <a href="#" class="submenu-toggle">
          <i class="fas fa-shopping-cart"></i> Ventas
          <i class="fas fa-chevron-down chevron-icon"></i>
        </a>
        <ul class="submenu">
          <li><a href="{{ url('venta') }}">Ventas</a></li>
          <li><a href="{{ url('detalle_venta') }}">Detalle Venta</a></li>
          <li><a href="{{ url('tipo_descuento') }}">Tipo de Descuento</a></li>
          <li><a href="{{ url('forma_pago') }}">Forma de Pago</a></li>
          <li><a href="{{ url('rol') }}">Rol</a></li>
        </ul>
      </li>

      {{-- Atención al Cliente --}}
      <li class="has-submenu">
        <a href="#" class="submenu-toggle">
          <i class="fas fa-headset"></i> Atención al Cliente
          <i class="fas fa-chevron-down chevron-icon"></i>
        </a>
        <ul class="submenu">
          <li><a href="{{ url('promocion') }}">Promoción</a></li>
          <li><a href="{{ url('usuario') }}">Usuario</a></li>
        </ul>
      </li>

      {{-- Pedidos --}}
      <li class="has-submenu">
        <a href="#" class="submenu-toggle">
          <i class="fas fa-users"></i> Pedidos
          <i class="fas fa-chevron-down chevron-icon"></i>
        </a>
        <ul class="submenu">
          <li><a href="{{ url('pedido') }}">Pedido</a></li>
          <li><a href="{{ url('cliente') }}">Cliente</a></li>
        </ul>
      </li>

      {{-- Configuración --}}
      <li><a href="{{ url('confi') }}"><i class="fas fa-cog"></i> Configuración</a></li>
    </ul>
  </div>

  {{-- Contenido principal --}}
  <div class="content-wrapper">
    {{-- Navbar --}}
    <nav class="navbar">
      <div class="logo">
        <i class="fas fa-hamburger"></i>
        <span>WURGER</span>
      </div>
      <ul class="nav-links">
        <li><a href="{{ url('/') }}#inicio">Inicio</a></li>
        <li><a href="{{ url('/') }}#menu">Menú</a></li>
        <li><a href="{{ url('/') }}#promos">Promos</a></li>
        <li><a href="{{ url('/') }}#nosotros">Nosotros</a></li>
        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('login') }}"><button class="btn-login">Iniciar Sesión</button></a></li>
      </ul>
      <div class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
      </div>
    </nav>

    {{-- Aquí se inyecta el contenido dinámico --}}
    <div class="main-content">
      @yield('content')
    </div>
  </div>

  {{-- Scripts globales --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.querySelectorAll('.submenu-toggle').forEach(function (toggle) {
      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        this.parentElement.classList.toggle('active');
      });
    });

    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");

    hamburger.addEventListener("click", () => {
      sidebar.classList.toggle("active");
      document.body.classList.toggle("sidebar-open");
    });

    document.body.addEventListener("click", (e) => {
      if (!sidebar.contains(e.target) && !hamburger.contains(e.target) && sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
        document.body.classList.remove("sidebar-open");
      }
    });
  </script>
  @stack('scripts')
</body>
</html>
