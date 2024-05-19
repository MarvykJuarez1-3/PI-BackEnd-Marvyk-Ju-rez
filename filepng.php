<?php 

if ($_POST && $_POST['texto']) {
    $TextoImage = $_POST['texto'];

    $imagen = imagecreatetruecolor(400, 300);
    $color_texto = imagecolorallocate($imagen, 143, 224, 60);
    imagestring($imagen, 5, 160, 135, $TextoImage, $color_texto);

    header('Content-Type: image/png');
    imagepng($imagen);
    imagedestroy($imagen);
} else {
    echo "Error al crear la imagen";
}

?>