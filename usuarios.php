<!DOCTYPE html>
<HTML>
<HEAD>
    <meta charset="utf-8">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>Producto Integrador (Marvyk Mayoral Juárez)</title>
</HEAD>
<BODY>
<DIV class="cont">
 <DIV class="APP">
    <h1>Comparte tu viaje a Londres</h1>

  
   <DIV class="menu">
    <ul>
	  <li><a href="index.php">Inicio</a></li>
	  <li><a href="gallery.php">Galería</a></li>
	  <li><a href="usuarios.php">Usuarios</a></li>
	  <li><a href="logout.php">Salir</a></li>
    </ul>
  </DIV>


    <DIV class="actividad">
      <h3>Listado de usuarios</h3>
      
      <?php
	  $archivo = 'registro.js';
	  $json = file_get_contents($archivo);
	  $usuarios = json_decode($json, true);
	  
	  if (isset($usuarios) && !empty($usuarios)) {

		echo "<a href='file-word.php'>Exportar a Word</a>   ";
		echo "<a href='file-excel.php'>Exportar a Excel</a>  ";
		echo "<a href='file-pdf.php'>Exportar a PDF</a>  ";
		echo "<br /> <br />";

		foreach($usuarios as $Usuario) {
			echo "Nombre: " . $Usuario['Nombre'] . "<br />";
			echo "Correo: " .$Usuario['Mail'] . "<br />";
			echo "Fecha de nacimiento: " .$Usuario['Fecha'] . "<br />";
			echo "Día favorito de la semana: " .$Usuario['Semana'] . "<br /><br />";
		}
    
		} else {
		echo "No hay datos.";
		}

		?>

      <br>
 
 </DIV>
 <p><b>Compartamos</b>viajar para vivir<br/>

 </DIV>

</DIV>

</BODY>
</HTML>