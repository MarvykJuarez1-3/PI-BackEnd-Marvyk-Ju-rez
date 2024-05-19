<?php
    session_start();
 ?>
 
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

        <h3>Subir archivo</h3>
		
        <form method="POST" action="estatus.php" enctype="multipart/form-data">
        <input type="file" name="archivo" class="form">

        <button type="submit" name="upload" class="button">Subir</button>
        </form>

		<h3>Galería Rosemary</h3>
         <div class="gallery">
         <?php
         foreach (glob("uploads/*.*") as $filename) {
          echo "<div class='uno'><img src='$filename'><br><a href='delete.php?file=$filename'>Eliminar</a></div>";
         }
         ?>
         </div>

 </DIV>
 <p><b>Compartamos</b>viajar para vivir<br/>


 </DIV>

</DIV>

</BODY>
</HTML>