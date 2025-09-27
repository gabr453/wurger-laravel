<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WURGER - Dashboard</title>

  {{-- CSS propio --}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Font Awesome --}}
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />

  {{-- Google Fonts --}}
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Righteous&display=swap"
    rel="stylesheet"
  />


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
          <li><a href="{{ url('ventas') }}">Ventas</a></li>
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

  {{-- Contenedor principal --}}
  <div class="content-wrapper">
    {{-- Navbar --}}
    <nav class="navbar">
      <div class="logo">
        <i class="fas fa-hamburger"></i>
        <span>WURGER</span>
      </div>
      <ul class="nav-links">
               

        <li><a href="{{ url('inicio') }}">Inicio</a></li>
        <li><a href="{{ url('login') }}"><button class="btn-login">Iniciar Sesión</button></a></li>
      </ul>
      <div class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
      </div>
    </nav>

    {{-- Contenido principal --}}
    <div class="main-content">
      <h2 class="section-title">Dashboard de Ventas</h2>
      <div class="dashboard-container">
        <div class="stats-card">
          <i class="fas fa-chart-line"></i>
          <h3>Ventas Totales</h3>
          <p class="stat-value">$24,560</p>
          <p class="stat-change">+12% este mes</p>
        </div>
        <div class="stats-card">
          <i class="fas fa-hamburger"></i>
          <h3>Productos Vendidos</h3>
          <p class="stat-value">1,245</p>
          <p class="stat-change">+8% este mes</p>
        </div>
        <div class="stats-card">
          <i class="fas fa-users"></i>
          <h3>Clientes</h3>
          <p class="stat-value">856</p>
          <p class="stat-change">+5% este mes</p>
        </div>
      </div>
      <div class="dashboard-grid">
        <div class="chart-container">
          <h3>Ventas Mensuales</h3>
          <canvas id="salesChart"></canvas>
        </div>
        <div class="recent-orders">
          <h3>Pedidos Recientes</h3>
          <ul class="orders-list">
            <li>Orden #1024 - Clásica - $12.99</li>
            <li>Orden #1023 - Bacon XL - $15.99</li>
            <li>Orden #1022 - Vegetariana - $13.99</li>
            <li>Orden #1021 - Bacon XL - $15.99</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.querySelectorAll('.submenu-toggle').forEach(function (toggle) {
      toggle.addEventListener('click', function (e) {
        e.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle('active');
      });
    });

    // Gráfico
    const ctx = document.getElementById("salesChart").getContext("2d");
    const salesChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun"],
        datasets: [{
          label: "Ventas Mensuales",
          data: [12000, 19000, 15000, 20000, 18000, 24000],
          backgroundColor: "rgba(255, 107, 107, 0.7)",
          borderColor: "rgba(255, 107, 107, 1)",
          borderWidth: 1
        }]
      },
      options: {responsive: true,scales: {y: { beginAtZero: true }}}
    });

    // Sidebar
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");

    hamburger.addEventListener("click", () => {
      sidebar.classList.toggle("active");
      document.body.classList.toggle("sidebar-open");
    });

    // Cerrar al hacer clic fuera
    document.body.addEventListener("click", (e) => {
      if (!sidebar.contains(e.target) && !hamburger.contains(e.target) && sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
        document.body.classList.remove("sidebar-open");
      }
    });
  </script>
</body>
</html>
