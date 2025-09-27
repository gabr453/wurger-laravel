<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 400px;">
        <h3 class="text-center">Registrarse</h3>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="Nom_usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="Apellido_usuario" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="Email_usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="Password_usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" name="Password_usuario_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Registrarse</button>
        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>
