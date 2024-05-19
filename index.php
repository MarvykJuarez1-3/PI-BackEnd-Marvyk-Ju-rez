<?php session_start(); /* Inicia sesión */
 ?>

<!DOCTYPE html>
<HTML>
<HEAD>
    <meta charset="utf-8">
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
   <h1>Comparte tu viaje a Londres</h1>

   
   <!-- MENÚ DE NAVEGACIÓN -->
   <DIV class="menu">
    <ul>
	  <li><a href="index.php">Inicio</a></li>
	  <li><a href="gallery.php">Galería</a></li>
	  <li><a href="usuarios.php">Usuarios</a></li>
	  <li><a href="logout.php">Salir</a></li>
    </ul>
  </DIV>

 <DIV class="actividad">
   
  <h4>Documentos creados en PHP</h4>
  
  <p>Ingresa un texto para convertir en imagen.
  <form action="filepng.php" method="POST">
	<input type="text" name="texto" class="form"><br>
	<input type="submit" value="Crear imagen" class="button">
  </form>
  </p>

  <br>
  <?php 

if (isset($_COOKIE['time'])) {
    $Fecha_Inicio = $_COOKIE['time'];
    $Diferencia = abs(time() - $Fecha_Inicio);
    $Dias   = floor(($Diferencia / (60 * 60 * 24)));
    $Horas   = floor(($Diferencia / (60 * 60)));
    $Minutos   = floor(($Diferencia / (60)));

    echo "Han pasado: " . $Dias." días ";
    echo $Horas." horas y ";
    echo $Minutos." minutos, desde el último inicio de sesión.<br /><br />";
}

$archivo = 'registro.js';
$json = file_get_contents($archivo);
$usuario = json_decode($json, true);

if (isset($usuario) && isset($_GET['Mail']) && !empty($usuario) && ($_GET['Mail'] != '')) {
    $key = array_search($_GET['Mail'], array_column($usuario, 'Mail'));
    echo "Nombre: " . $usuario[$key]['Nombre'] . "<br />";
    echo "Correo: " .$usuario[$key]['Mail'] . "<br />";
    echo "Fecha de nacimiento: " .$usuario[$key]['Fecha'] . "<br />";
    echo "Día de la semana favorito: " .$usuario[$key]['Semana'] . "<br />";
} else {
    echo "No tenemos datos del usuario.";
}
?>
  
  <br>
 
 </DIV>

 <p><b>Compartamos</b>viajar para vivir<br/>

 
 </DIV>

</DIV>

</BODY>
</HTML>