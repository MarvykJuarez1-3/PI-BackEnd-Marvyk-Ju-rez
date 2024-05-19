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
        <h3>
        <?php
        $nombre = $_FILES['archivo']['name'];
        $guardado = $_FILES['archivo']['tmp_name'];
        
        if(!file_exists('uploads')){
           mkdir('uploads',0777,true);
           if(file_exists('archivos')){
              if(move_uploaded_file($guardado, 'uploads/' . $nombre)){
                echo "Guardado";
             }else{
                echo "Ha ocurrido un error.";
             }
           }
        }else{
           if(move_uploaded_file($guardado, 'uploads/' . $nombre)){
                echo "Guardado";
           }else{
                echo "Ha ocurrido un error.";
             }
           }
        ?></h3>
   
    </DIV>
    
    <p><b>Compartamos </b>viajar para vivir<br/>


 </DIV>


</DIV>



</BODY>
</HTML>