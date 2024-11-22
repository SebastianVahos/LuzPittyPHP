<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Road+Rage&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Luz Pitty</title>
    <link rel="icon" href="../Images/marcador.ico">
</head>
<body id="Login">
    <form action="../Controller/controllerRegistro.php" class="FormInicio" method="post">
        <h2>Registro</h2>
        <label for="NomUsuario">Nombre de usuario</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="Correo">Correo</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="contrasena" required>

        <input type="submit" class="enviar" value="Registrarse">
    </form>
</body>
</html>