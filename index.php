<?php                                               //Ismel Amaury AM, Matricula 20231886
$archivo = 'visitas.json';
$visitas = [];

if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $visitas = json_decode($contenido, true) ?? [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultorio Dental - Visitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-4">Registro de Visitas</h1>

    <div class="text-end mb-3">
        <a href="registrar.php" class="btn btn-success">Registrar Nueva Visita</a>
    </div>

    <?php if (count($visitas) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Edad</th>
                    <th>Motivo</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitas as $i => $visita): ?>
                    <tr>
                        <td><?= htmlspecialchars($visita['nombre']) ?></td>
                        <td><?= htmlspecialchars($visita['apellido']) ?></td>
                        <td><?= htmlspecialchars($visita['cedula']) ?></td>
                        <td><?= htmlspecialchars($visita['edad']) ?></td>
                        <td><?= htmlspecialchars($visita['motivo']) ?></td>
                        <td><?= htmlspecialchars($visita['fecha_hora']) ?></td>
                        <td>
                            <a href="editar.php?i=<?= $i ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="eliminar.php?i=<?= $i ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta visita?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">No hay visitas registradas.</div>
    <?php endif; ?>
</div>
</body>
</html>
