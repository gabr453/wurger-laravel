<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WURGER - Promociones</title>
<link rel="stylesheet" href="{{ asset('css/style_cliente.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Righteous&display=swap" rel="stylesheet">

  
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
      <li><a href="{{ url('promociones') }}"><i class="fas fa-gift"></i> Promociones</a></li>
      <li><a href="{{ url('productos') }}"><i class="fas fa-hamburger"></i> Productos</a></li>
      <li><a href="perfil.html"><i class="fas fa-user"></i> Mi Perfil</a></li>
    </ul>
  </div>

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

  <!-- Contenido -->
  <div class="content-wrapper">
    <section id="promociones" class="animate-fade">
      <h2 class="section-title">Promociones Exclusivas</h2>
      <div class="menu-container">

        <div class="menu-item">
          <img src="img/promo.png" alt="Promo 2x1">
          <h3>2x1 en Clásicas</h3>
          <p>Todos los martes disfruta 2 hamburguesas al precio de 1.</p>
          <span class="price">Solo por hoy</span>
          <button class="btn-aplicar">Aplicar</button>
        </div>

        <div class="menu-item">
          <img src="img/desc.png" alt="Descuento Online">
          <h3>10% Online</h3>
          <p>Ordena en línea y recibe un 10% de descuento.</p>
          <span class="price">Exclusivo Web</span>
          <button class="btn-aplicar">Aplicar</button>
        </div>

        <div class="menu-item">
          <img src="img/ham-4.jpg" alt="Combo Familiar">
          <h3>Combo Familiar</h3>
          <p>4 Hamburguesas + Papas + 4 Bebidas a precio especial.</p>
          <span class="price">$39.99</span>
          <button class="btn-aplicar">Ver más</button>
        </div>

      </div>
    </section>
  </div>

  <!-- Script -->
  <script>
    // Toggle sidebar
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");

    hamburger.addEventListener("click", () => {
      sidebar.classList.toggle("active");
    });
  </script>
</body>
</html>
