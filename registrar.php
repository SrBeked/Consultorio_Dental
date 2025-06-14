<?php                                         //Ismel Amaury AM, Matricula 20231886
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $visita = [
        'nombre' => trim($_POST['nombre']),
        'apellido' => trim($_POST['apellido']),
        'cedula' => trim($_POST['cedula']),
        'edad' => (int)$_POST['edad'],
        'motivo' => trim($_POST['motivo']),
        'fecha_hora' => date('Y-m-d H:i:s')
    ];

    $archivo = 'visitas.json';
    $visitas = [];

    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        $visitas = json_decode($contenido, true) ?? [];
    }

    $visitas[] = $visita;
    file_put_contents($archivo, json_encode($visitas, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Visita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4 text-center">Nueva Visita</h1>
    <form method="post" class="mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cédula</label>
            <input type="text" name="cedula" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control" min="0" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Motivo</label>
            <input type="text" name="motivo" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="index.php" class="btn btn-secondary">← Volver</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>
</body>
</html>
