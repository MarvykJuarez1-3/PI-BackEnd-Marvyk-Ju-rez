<?php
require "vendor/autoload.php";
$phpWord = new \PhpOffice\PhpWord\PhpWord();

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment;filename="usuarios.docx"');

$section = $phpWord->addSection();
$htmlString = "<h1>Usuarios</h1>
                <table>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Día de la semana</th>
                </tr>";

$archivo = 'registro.js';
$json = file_get_contents($archivo);
$usuarios = json_decode($json, true);

if (isset($usuarios) && !empty($usuarios)) {
    foreach($usuarios as $Usuario) {
        $htmlString .= "<tr>
            <td>" . $Usuario['Nombre'] . "</td>
            <td>" . $Usuario['Mail'] . "</td>
            <td>" . $Usuario['Fecha'] . "</td>
            <td>" . $Usuario['Semana'] . "</td>
        </tr>";
    }
}

$htmlString .= "</table>";

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlString);
$objWriter = \PhpOffice\PhpWord\IOfactory::createWriter($phpWord,'Word2007');
$objWriter->save('php://output');
die;

?>