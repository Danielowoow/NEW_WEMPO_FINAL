<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $apellidos_nombres = $_POST['apellidos-nombres'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $departamento = $_POST['selectDepartamento'] ?? '';
    $provincia = $_POST['selectProvincia'] ?? '';
    $distrito = $_POST['selectDistrito'] ?? '';
    $doc_identidad = $_POST['doc-identidad'] ?? '';
    $num_doc_identidad = $_POST['num-doc'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $fecha_reclamo = $_POST['fecha-reclamo'] ?? '';
    $reclamo = isset($_POST['reclamo']) ? 1 : 0;
    $queja = isset($_POST['queja']) ? 1 : 0;
    $producto_contratado = $_POST['producto'] ?? '';
    $monto_reclamado = $_POST['monto'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $pedido_consumidor = $_POST['pedido'] ?? '';

    // Query SQL para insertar los datos en la tabla reclamaciones
    $sql = "INSERT INTO reclamaciones (apellidos_nombres, direccion, departamento, provincia, distrito, doc_identidad, num_doc_identidad, correo, telefono, sexo, fecha_reclamo, reclamo, queja, producto_contratado, monto_reclamado, descripcion, detalle, pedido_consumidor) VALUES ('$apellidos_nombres', '$direccion', '$departamento', '$provincia', '$distrito', '$doc_identidad', '$num_doc_identidad', '$correo', '$telefono', '$sexo', '$fecha_reclamo', $reclamo, $queja, '$producto_contratado', '$monto_reclamado', '$descripcion', '$detalle', '$pedido_consumidor')";

    if ($conn->query($sql) === TRUE) {
        // Ahora, crear el PDF con los datos
        // Incluir la biblioteca TCPDF
        require_once('TCPDF-main/tcpdf.php');

        // Crear una instancia de TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Establecer información del documento PDF
        $pdf->SetCreator('Usuario');
        $pdf->SetAuthor('Usuario');
        $pdf->SetTitle('Datos del formulario');
        $pdf->SetSubject('Datos del formulario');
        $pdf->SetKeywords('TCPDF, PDF, formulario, datos');

        // Agregar una página al PDF
        // Agregar una página al PDF
        $pdf->AddPage();						


        $content = '<h1 style="font-size: 18px; font-weight: bold; text-align: center;">ANEXOS</h1>';
        $content .= '<h1 style="font-size: 16px; font-weight: bold;">LIBRO DE RECLAMACIONES PREBIO</h1>';
  
        $content .= '<p style="font-weight:bold; font-size: 14px;">1. Identificación de consumidor reclamante:</p>';
        $content .= '<p><span class="label">Apellidos y Nombres:</span> <span class="value">' . $apellidos_nombres . '</span></p>';
        $content .= '<p><span class="label">Dirección:</span> <span class="value">' . $direccion . '</span></p>';
        $content .= '<p><span class="label">Departamento:</span> <span class="value">' . $departamento . '</span></p>';
        $content .= '<p><span class="label">Provincia:</span> <span class="value">' . $provincia . '</span></p>';
        $content .= '<p><span class="label">Distrito:</span> <span class="value">' . $distrito . '</span></p>';
        
        $content .= '<p><span class="label">Doc. de identidad:</span> <span class="value">' . $doc_identidad . '</span></p>';
        $content .= '<p><span class="label">Nº Doc. de identidad:</span> <span class="value">' . $num_doc_identidad . '</span></p>';
        $content .= '<p><span class="label">Correo electrónico:</span> <span class="value">' . $correo . '</span></p>';
        $content .= '<p><span class="label">Teléfono:</span> <span class="value">' . $telefono . '</span></p>';
        $content .= '<p><span class="label">Sexo:</span> <span class="value">' . $sexo . '</span></p>';
        $content .= '<p><span class="label">Fecha de reclamación:</span> <span class="value">' . $fecha_reclamo . '</span></p>';
        $content .= '<p style="font-weight:bold; font-size: 14px;">Detalle de la reclamación y pedido del consumidor:</p>';
        $content .= '<p><span class="label">Tipo de reclamación:</span> <span class="value">' . ($reclamo ? 'Reclamo' : '') . ($reclamo && $queja ? ' y ' : '') . ($queja ? 'Queja' : '') . '</span></p>';
        $content .= '<p><span class="label">Producto contratado:</span> <span class="value">' . $producto_contratado . '</span></p>';
        $content .= '<p><span class="label">Monto reclamado:</span> <span class="value">' . $monto_reclamado . '</span></p>';
        $content .= '<p><span class="label">Descripción:</span> <span class="value">' . $descripcion . '</span></p>';
        $content .= '<p><span class="label">Detalle:</span> <span class="value">' . $detalle . '</span></p>';
        $content .= '<p><span class="label">Pedido del consumidor:</span> <span class="value">' . $pedido_consumidor . '</span></p>';
        $content .= '<p style="font-weight:bold; font-size: 14px;">No comunicaremos con ustes en un plazo no mayor a 15 dias hábiles. pre>BIO</p>';

        // Estilos CSS para etiquetas
        $css = '
        <style>
            .label {
                font-weight: bold;
            }
        
            .value {
                font-weight: normal;
            }
        </style>';
        
        // Agregar los estilos CSS al contenido del PDF
        $pdf->writeHTML($css . $content, true, false, true, false, '');

        // Descargar el PDF automáticamente
        $pdf->Output('formulario.pdf', 'D');

        // Informar que la reclamación fue enviada y guardada en la base de datos
        echo "Reclamación enviada correctamente y guardada en la base de datos";
    } else {
        echo "Error al enviar la reclamación: " . $conn->error;
    }
} else {
    echo "No se pudo procesar el formulario";
}


// Cerrar la conexión a la base de datos
$conn->close();
?>
