<form id="usuarioForm" action="" method="POST" novalidate>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nom_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Cédula</label>
        <input type="text" name="Cedula_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="Email_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="Tel_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Salario</label>
        <input type="number" step="0.01" name="Salario_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Fecha de ingreso</label>
        <input type="date" name="Fecha_ingreso_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input type="date" name="Fecha_nac_usuario">
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo_usuario">
            <option value="">Seleccione</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="Otro">Otro</option>
        </select>
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="Estado_usuario">
            <option value="">Seleccione</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Rol</label>
        <select name="rol">
            <option value="">Seleccione</option>
            <option value="Usuario">Usuario</option>
            <option value="Administrador">Administrador</option>
        </select>
        <span class="error-message"></span>
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="Password_usuario">
        <span class="error-message"></span>
    </div>

    <button type="submit">Guardar</button>
</form>

<style>
    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 4px;
        display: none;
    }
    .form-group input.invalid,
    .form-group select.invalid {
        border: 1px solid red;
    }
</style>

<script>
document.getElementById("usuarioForm").addEventListener("submit", function (e) {
    e.preventDefault();
    let isValid = true;

    // limpiar mensajes
    document.querySelectorAll(".error-message").forEach(el => {
        el.textContent = "";
        el.style.display = "none";
    });
    document.querySelectorAll("input, select").forEach(el => {
        el.classList.remove("invalid");
    });

    function setError(input, message) {
        const errorSpan = input.parentElement.querySelector(".error-message");
        errorSpan.textContent = message;
        errorSpan.style.display = "block";
        input.classList.add("invalid");
    }

    const nombre = document.querySelector("[name='Nom_usuario']");
    if (nombre.value.trim() === "") {
        setError(nombre, "El nombre es obligatorio");
        isValid = false;
    }

    const apellido = document.querySelector("[name='Apellido_usuario']");
    if (apellido.value.trim() === "") {
        setError(apellido, "El apellido es obligatorio");
        isValid = false;
    }

    const cedula = document.querySelector("[name='Cedula_usuario']");
    if (cedula.value.trim() === "" || isNaN(cedula.value)) {
        setError(cedula, "La cédula debe ser numérica");
        isValid = false;
    }

    const email = document.querySelector("[name='Email_usuario']");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        setError(email, "Ingrese un email válido");
        isValid = false;
    }

    const telefono = document.querySelector("[name='Tel_usuario']");
    if (telefono.value.trim() === "" || isNaN(telefono.value)) {
        setError(telefono, "El teléfono debe ser numérico");
        isValid = false;
    }

    const salario = document.querySelector("[name='Salario_usuario']");
    if (salario.value.trim() === "" || salario.value <= 0) {
        setError(salario, "Ingrese un salario válido");
        isValid = false;
    }

    const ingreso = document.querySelector("[name='Fecha_ingreso_usuario']");
    if (ingreso.value === "") {
        setError(ingreso, "La fecha de ingreso es obligatoria");
        isValid = false;
    }

    const nacimiento = document.querySelector("[name='Fecha_nac_usuario']");
    if (nacimiento.value === "") {
        setError(nacimiento, "La fecha de nacimiento es obligatoria");
        isValid = false;
    }

    const sexo = document.querySelector("[name='Sexo_usuario']");
    if (sexo.value === "") {
        setError(sexo, "Seleccione un sexo");
        isValid = false;
    }

    const estado = document.querySelector("[name='Estado_usuario']");
    if (estado.value === "") {
        setError(estado, "Seleccione un estado");
        isValid = false;
    }

    const rol = document.querySelector("[name='rol']");
    if (rol.value === "") {
        setError(rol, "Seleccione un rol");
        isValid = false;
    }

    const pass = document.querySelector("[name='Password_usuario']");
    if (pass.value.trim().length < 6) {
        setError(pass, "La contraseña debe tener al menos 6 caracteres");
        isValid = false;
    }

    if (isValid) {
        this.submit();
    }
});
</script>
