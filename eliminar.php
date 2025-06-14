<?php
$archivo = 'visitas.json';
$visitas = [];

if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $visitas = json_decode($contenido, true) ?? [];
}

$index = $_GET['i'] ?? null;

if (!is_numeric($index) || !isset($visitas[$index])) {
    die("Visita no encontrada.");
}

array_splice($visitas, $index, 1);

file_put_contents($archivo, json_encode($visitas, JSON_PRETTY_PRINT));

header('Location: index.php');
exit;
?>
