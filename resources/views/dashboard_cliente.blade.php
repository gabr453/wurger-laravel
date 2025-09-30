<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WURGER - Dashboard </title>
<link rel="stylesheet" href="{{ asset('css/style_cliente.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Righteous&display=swap" rel="stylesheet"/>


     <style>
    /* Navbar */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  z-index: 1100;}
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f5f6fa;}
        /* Sidebar base */
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      background: #2f3542;
      color: #f1f1f1;
      padding-top: 30px;
      transition: left 0.3s ease;
      z-index: 1000;
      font-family: 'Righteous', sans-serif;
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar-header {
      padding: 1rem;
      text-align: left;
      font-size: 1.8rem;
      color: #dcdcdc;
    }

    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin-top: 30px;
    }

    .sidebar-menu li a {
      color: #2196f3;
      text-decoration: none;
      display: block;
      padding: 15px 20px;
      font-size: 1rem;
      transition: background 0.3s ease, color 0.3s ease;
    }

    .sidebar-menu li a:hover {
      background: rgba(255, 255, 255, 0.05);
      color: #64b5f6;
    }

    /* Submenu */
    .submenu {
      list-style: none;
      padding: 0;
      margin: 0;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }

    .has-submenu.active .submenu {
      max-height: 500px;
    }

    .submenu li a {
      color: #ddd;
      text-decoration: none;
      display: block;
      padding: 10px 40px;
      font-size: 0.95rem;
      transition: background 0.3s ease, color 0.3s ease;
    }

    .submenu li a:hover {
      background: rgba(255, 255, 255, 0.05);
      color: #64b5f6;
    }

    .has-submenu .chevron-icon {
      float: right;
      transition: transform 0.3s ease;
    }

    .has-submenu.active .chevron-icon {
      transform: rotate(180deg);
    }

    @media (min-width: 768px) {
      .sidebar {
        left: 0;
      }

      .sidebar.active {
        left: 0;
      }

      .content-wrapper {
        margin-left: 250px;
      }
    }

    .hamburger {
      display: block;
      cursor: pointer;
      font-size: 1.4rem;
    }

    @media (min-width: 768px) {
      .hamburger {
        display: none;
      }
    }

    body.sidebar-open::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: 900;
    }

    /* Botón hamburguesa visible en móviles */
    .hamburger {
      display: block;
      cursor: pointer;
      font-size: 1.4rem;
    }

    /* Ocultar hamburguesa en escritorio */
    @media (min-width: 768px) {
      .hamburger {
        display: none;
      }
    }

    /* Fondo oscuro al abrir sidebar en móvil */
    body.sidebar-open::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
      z-index: 900;
    }

    /* Contenido principal */
    .main-content {
      padding: 2rem;
    }

    /* Dashboard */
    .dashboard-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .stats-card {
      background: white;
      border-radius: 10px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .stats-card i {
      font-size: 2.5rem;
      color: #ff6b6b;
      margin-bottom: 1rem;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: bold;
      color: #2f3542;
      margin: 0.5rem 0;
    }

    .stat-change {
      color: #4caf50;
      font-weight: 500;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
    }

    .chart-container,
    .recent-orders {
      background: white;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .orders-list {
      list-style: none;
      margin: 1rem 0 0;
      padding: 0;
    }

    .orders-list li {
      padding: 0.8rem 0;
      border-bottom: 1px solid #eee;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h3>Menú Principal</h3>
    </div>
    <ul class="sidebar-menu">
      <li><a href="{{ url('dashboard_cliente') }}"><i class="fas fa-home"></i> Dashboard</a></li>
      <li><a href="{{ url('pedido') }}"><i class="fas fa-receipt"></i> Mis Pedidos</a></li>
      <li><a href="{{ url('forma_pago') }}"><i class="fas fa-credit-card"></i> Forma de Pago</a></li>
      <li><a href="{{ url('promociones') }}"><i class="fas fa-gift"></i> Promociones</a></li>
      <li><a href="{{ url('productos') }}"><i class="fas fa-hamburger"></i> Productos</a></li>
    </ul>
  </div>

  
  <!-- Contenedor principal -->
  <div class="content-wrapper">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <i class="fas fa-hamburger"></i>
        <span>WURGER</span>
      </div>
      <ul class="nav-links">
       
        <li><a href="{{ url('inicio') }}">Inicio</a></li>
        <li><a href="{{ url('login') }}"><button class="btn-login">Cerrar Sesión</button></a></li>
      </ul>
      <div class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
      </div>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
      <h2 class="section-title">Dashboard de Usuario</h2>

      <!-- Tarjetas -->
      <div class="dashboard-container">
        <div class="stats-card">  
          <i class="fas fa-receipt"></i>
          <h3>Pedidos Realizados</h3>
          <p class="stat-value">12</p>
        </div>
        <div class="stats-card">
          <i class="fas fa-gift"></i>
          <h3>Promociones Activas</h3>
          <p class="stat-value">2</p>
        </div>
        <div class="stats-card">
          <i class="fas fa-percentage"></i>
          <h3>Puntos Acumulados</h3>
          <p class="stat-value">350</p>
        </div>
      </div>

      <!-- Gráfico y pedidos -->
      <div class="dashboard-grid">
        <div class="chart-container">
          <h3>Mis Pedidos por Mes</h3>
          <canvas id="ordersChart"></canvas>
        </div>
        <div class="recent-orders">
          <h3>Pedidos Recientes</h3>
          <ul class="orders-list">
            <li>Pedido #201 - Clásica - <strong>Entregado</strong></li>
            <li>Pedido #202 - Bacon XL - <strong>En preparación</strong></li>
            <li>Pedido #203 - Vegetariana - <strong>Cancelado</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Gráfico de pedidos por mes
    const ctx = document.getElementById("ordersChart").getContext("2d");
    const ordersChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun"],
        datasets: [{
          label: "Pedidos",
          data: [2, 5, 3, 6, 4, 7],
          backgroundColor: "rgba(33, 150, 243, 0.7)",
          borderColor: "rgba(33, 150, 243, 1)",
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // Toggle Sidebar
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");

    hamburger.addEventListener("click", () => {
      sidebar.classList.toggle("active");
      document.body.classList.toggle("sidebar-open");
    });
  </script>
</body>
</html>
