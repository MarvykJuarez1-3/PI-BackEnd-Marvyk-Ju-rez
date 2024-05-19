<?php
require "vendor/autoload.php";
$pdf = new TCPDF();
$pdf ->AddPage();
$pdf ->Write(1,'Listado de Usuarios','', false, 'C');

$pdf ->Ln();
$pdf ->Ln();
$html = "<table>
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
                $html .= "<tr>
                    <td>" . $Usuario['Nombre'] . "</td>
                    <td>" . $Usuario['Mail'] . "</td>
                    <td>" . $Usuario['Fecha'] . "</td>
                    <td>" . $Usuario['Semana'] . "</td>
                </tr>";
            }
        }

$html .= "</table>";

$pdf ->WriteHTML($html);
$pdf ->Output ('documento.pdf');
?>