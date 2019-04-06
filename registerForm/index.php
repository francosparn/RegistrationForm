<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Registro</title>

    <!-- Favicon -->
    <link href="img/register.png" rel="icon">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <div id="register" class="block">
        <div class="logo">
            <img src="img/register.png" alt="">
        </div>
        <h3>Registrarse</h3>
        <hr>

        <!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-ok">
                    <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

        <div class="line">
            <form action="register.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <input type="text" name="apellido" placeholder="Apellido" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

                <input type="email" name="email" placeholder="Correo electrónico" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <input type="password" name="password" placeholder="Contraseña" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" value="Registrar" class="button" />
        </div>
        <div class="back">
            ¿Ya estas registrado? <a href="#">Ingrese aquí</a>
        </div>
        <hr>
        <p class="credit">Designed and developed by <span class="credits">Franco Sparn</span> &copy 2019.</p>
        </form>

        <!-- Ejecuta la función borrarErrores para que desaparezcan luego de refrescar la página -->
        <?php borrarErrores(); ?>
</body>

</html>