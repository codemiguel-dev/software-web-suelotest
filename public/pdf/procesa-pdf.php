<?php
// Vamos a mostrar un PDF
header('Content-Type: application/pdf');

// Se llamará downloaded.pdf
header('Content-Disposition: attachment; filename="Reportes.pdf"');

// La fuente de PDF se encuentra en original.pdf
readfile('reporte.pdf');
?>