<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?controller=animal&action=showById">Nuevo</a>
<table>
    <caption>Animales</caption>
    <thead>
    <tr>
        <?php
        require_once 'core/const.php';
        foreach (DATA_ANIMAL as $key => $value):
            ?>
            <th scope="col">
                <?php echo $value; ?>
            </th>
        <?php endforeach; ?>
    <tr>
    <thead>
    <tbody>
    <?php
    foreach ($this->model->getAll() as $animal): ?>
        <tr>
            <td><?php echo $animal->name ?></td>
            <td><?php echo $animal->specie ?></td>
            <td><?php echo $animal->breed ?></td>
            <td><?php echo $animal->gender ?></td>
            <td><?php echo $animal->color ?></td>
            <td><?php echo $animal->age ?></td>
            <td><a href="index.php?controller=animal&action=showById&id=<?php echo $animal->id ?>">Editar</a></td>
            <td><a onclick="return confirm('¿Seguro que desea eliminar este registro?');"
                   href="index.php?controller=animal&action=delete&id=<?php echo $animal->id ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

