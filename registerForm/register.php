<?php
if(isset($_POST)){

    // Conexión a la DB
    require_once 'includes/conexion.php';
 
    // Inicio de sesión
    if (!isset($_SESSION)) {
        session_start(); 
    }
 
    // Colección de valores del formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
 
    // Array errores
    $errores = array();
 
    // Validación del campo NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre ingresado no es válido.";
    }

    // Validación del campo APELLIDO
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validado = true;
    }else{
        $apellido_validado = false;
        $errores['apellido'] = "El apellido ingresado no es válido.";
    }

    // Validación del campo EMAIL
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El correo electrónico ingresado es inválido.";
    }

    // Validación del campo CONTRASEÑA
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía.";
    }

    // Guardar usuario en la DB
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;

        // Cifrado de contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        // Insertar usuario en la tabla de usuarios de la DB
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_segura');";
        $guardar = mysqli_query($db, $sql);
 
        if($guardar){
            $_SESSION['completado'] = "¡El registro se ha completado correctamente!";
        }else{
            $_SESSION['errores']['general'] = "Hubo un error al guardar el usuario. Inténtelo nuevamente.";
        }
    }
    else{
        $_SESSION['errores'] = $errores;
    }
}
// Redirección 
header('Location: index.php');
?>