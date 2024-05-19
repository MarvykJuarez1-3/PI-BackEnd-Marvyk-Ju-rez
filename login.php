<?php
session_start();

$Mensaje = "";
$Redirect = false;

if ($_POST) {
    $archivo = 'registro.js';
    $json = file_get_contents($archivo);
    $usuarios = json_decode($json, true);

    if (isset($usuarios) && !empty($usuarios)) {
    foreach($usuarios as $Usuario) {
        if ($Usuario['Mail'] == $_POST['Username'] && $Usuario['Pass'] == $_POST['Password']) {
            $Redirect = true;
            break;
        }
    }}

    if ($Redirect) {
 		header("Location: index.php".$_POST['Mail']);
    } else {
        $Mensaje = "Usuario o contraseña incorrecto.<br />";
    }
}

?>

<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>Producto Integrador (Marvyk Mayoral Juárez)</title>
</HEAD>
<BODY>
<DIV class="cont">

    <DIV class="APP">
    <h1>Visita Londres</h1>
    <p>Comparte tu viaje a Londres</p>

    <DIV class="actividad">
		<h4>Ingresa tus datos para iniciar sesión</h4>
		<form method="post" name="Login_Form">
			<label for="">Usuario</label><br>
			<input name="Username" type="email" placeholder="Ingresa tu correo electrónico" class="form"><br>
			<label for="">Contraseña</label><br>
			<input name="Password" type="password" class="form" placeholder="Ingresa tu contraseña"><br>
			<br>
			<input type="submit" value="Login" class="button">
			<p class="error"><?php echo $Mensaje; ?></p>
		</form>
		
		<p>¿Aún no tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
 
 </DIV>

 <p><b>Compartamos</b>viajar para vivir<br/>

 </DIV>

</DIV>

</BODY>
</HTML>