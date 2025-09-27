<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WURGER - Productos</title>
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
     <li><a href="index.html">Inicio</a></li>
        <li><a href="logout.html"><button class="btn-login">Cerrar Sesión</button></a></li>
</ul>
    <div class="hamburger" id="hamburger">
      <i class="fas fa-bars"></i>
    </div>
  </nav>

 <!-- Contenido -->
  <div class="content-wrapper">
    <section id="promociones" class="animate-fade">
      <h2 class="section-title">Nuestros productos</h2>
      <div class="menu-container">

        <div class="menu-item">
      <img src="./img/ham-1.jpg" alt="Hamburguesa Clásica con queso y vegetales frescos">
      <h3>Clásica</h3>
      <p>Carne 200g, queso cheddar, lechuga, tomate y salsa especial</p>
      <span class="price">$12.99</span>
    </div>
    <div class="menu-item">
      <img src="img/ham-2.jpg" alt="Hamburguesa con bacon crujiente">
      <h3>Bacon XL</h3>
      <p>Doble carne, bacon crocante, cebolla caramelizada y salsa BBQ</p>
      <span class="price">$15.99</span>
    </div>
    <div class="menu-item">
      <img src="img/ham-3.jpg" alt="Hamburguesa vegetariana saludable">
      <h3>Vegetariana</h3>
      <p>NotBurger de garbanzos, aguacate, rúcula y tomate seco</p>
      <span class="price">$13.99</span>
    </div>
    <div class="menu-item">
      <img src="img/ham-4.jpg" alt="Hamburguesa picante con jalapeños">
      <h3>Spicy Jalapeño</h3>
      <p>Carne Angus, jalapeños, queso pepper jack y salsa chipotle</p>
      <span class="price">$14.99</span>
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
