<?php 

if ($_GET)  {
    If (unlink(''.$_GET['file'])) {
        Header('Location:gallery.php');
    } else {
        echo "Hubo un problema al eliminar la imagen.";
    }
}
?>
<a href="gallery.php">Listar imagenes</a> 
