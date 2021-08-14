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
<form action="index.php?controller=animal&action=save" method="post">

    <ul>
        <li hidden>
            <label for="id" >Id:</label>
            <input type="text" id="id" name="id" value="<?php echo $animal->id; ?>"/>
        </li>
        <li>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo $animal->name; ?>"/>
        </li>
        <li>
            <label for="specie">Especie:</label>
            <input type="text" id="specie" name="specie" value="<?php echo $animal->specie; ?>"/>
        </li>
        <li>
            <label for="breed">Raza:</label>
            <input type="text" id="breed" name="breed" value="<?php echo $animal->breed; ?>"/>
        </li>
        <li>
            <label for="gender">Genero:</label>
            <select name="gender" id="gender">
                <option <?php echo $animal->gender === "Macho" ? "Selected" : ""; ?> value="Macho">Macho</option>
                <option <?php echo $animal->gender === "Hembra" ? "Selected" : ""; ?> value="Hembra">Hembra</option>
            </select>
        </li>
        <li>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="<?php echo $animal->color; ?>"/>
        </li>
        <li>
            <label for="age">Edad:</label>
            <input type="text" id="age" name="age" value="<?php echo $animal->age; ?>"/>
        </li>
        <li>
            <input type="submit" name="send" value="Guardar"/>
        </li>
    </ul>
</form>
</body>
</html>