<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superheroes</title>
</head>
<body>
    <?php
    ?>
    <h1>Bienvenido a Superheroes</h1>
    <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
        <label for="">Peticion</label>
        <input type="text" name="titulo" value="" placeholder="titulo">
        <input type="text" name="descripcion" value="" placeholder="descripcion">
        <input type="submit" value="añadir petición">
    </form>
    <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get">
        <label for="">Buscar Superheroe</label>
        <input type="text" name="nombre" value="" placeholder="nombre">
        <input type="submit" value="buscar">
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>evolucion</th>
            <th>imagen</th>
            <th>habilidades</th>
        </tr>
        <?php
            foreach ($data["superheroes"] as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value["nombre"] . '</td>';
                echo '<td>' . $value['evolucion'] . '</td>';
                echo '<td>' . $value['imagen'] . '</td>';
                foreach ($data["habilidades"] as $clave => $valor) {
                    echo '<td>' . $valor["nombre"] . '</td>';
                }
                
                echo '<td>';
                //echo '<a href="' . DIRPUBLIC . '/index.php/superheroes/edit/' . $value['id'] . '"> Edit</a>';
                //echo '<a href="' . DIRPUBLIC . '/index.php/superheroes/del/' . $value['id'] . '"> Del</a>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>