<?php
require "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="usuarios.xlsx"');

$spreadsheet = new Spreadsheet();
$htmlString = "<table>
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

$reader = new Html();
$spreadsheet =$reader->loadFromString($htmlString);
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
die;

?>