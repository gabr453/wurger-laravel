<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS personalizado */
        .register-link {
            margin-top: 15px;
            text-align: center;
        }

        .register-link a {
            display: inline-block;
            padding: 8px 47px;
            background-color: #28a745; /* Verde */
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .register-link a:hover {
            background-color: #218838; /* Verde más oscuro */
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 350px;">
        <h3 class="text-center">Iniciar Sesión</h3>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label for="Email_usuario" class="form-label">Correo</label>
                <input type="email" class="form-control" name="Email_usuario" required>
            </div>
            <div class="mb-3">
                <label for="Password_usuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="Password_usuario" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Botón de registro -->
        <div class="register-link">
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</body>
</html>
