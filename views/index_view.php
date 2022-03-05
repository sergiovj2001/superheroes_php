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
    <form action="register.php" method="POST">
        <label for="">Registro</label>
        <input type="text" name="usuario" value="" placeholder="Usuario">
        <input type="password" name="password" value=""placeholder="Contraseña">
        <select name="rol">
            <option value="superheroe">Superheroe</option>
            <option value="ciudadano">Ciudadano</option>
        </select>
        <input type="submit" value="Registro">
    </form>
    <form action="login.php" method="POST">
        <label for="">Login</label>
        <input type="text" name="usuario" value="" placeholder="usuario">
        <input type="password" name="password" value="" placeholder="contraseña">
        <input type="submit" value="Login">
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
         echo "<table>";
                
         echo "<tr>";
             echo"<th>Nombre</th>";
             echo "<th>evolucion</th>";
             echo "<th>imagen</th>";
             echo "<th>habilidades</th>";
         echo "</tr>";        
        if (isset($data["superheroes"])) {
            foreach ($data["superheroes"] as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value["nombre"] . '</td>';
                echo '<td>' . $value['evolucion'] . '</td>';
                echo '<td>' . $value['imagen'] . '</td>';
                foreach ($data["habilidades"][0] as $clave => $valor) {
                    if ($value["id"] == $valor["id_superheroe"]) {
                        echo '<td>' . $valor["nombre"] . '</td>';
                    }
                }
                echo '<td>';
                echo '</td>';
                echo '</tr>';
            }
        }else {
                echo '<tr>';
                echo '<td>' . $data[0]["nombre"] . '</td>';
                echo '<td>' . $data[0]['evolucion'] . '</td>';
                echo '<td>' . $data[0]['imagen'] . '</td>';
                var_dump($data);
                 echo '<td>' . $data[0]["habilidades"]["nombre"] . '</td>';
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