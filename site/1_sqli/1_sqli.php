<?php
$host = 'data_base'; // es el nombre del contenedor descrito en el archivo docker compose
$username = 'pajaro';
$password = 'pajaro';
$database = 'phct';

$conn = new mysqli($host, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Lab01</title>
</head>
<body>
    <header>
        <img src="images1/logo.png" alt="Pumahat Cybersecurity Team">
        <h1 id="titulo">Pumahat Cybersecurity Team</h1>
    </header>
    <h1>Lab01</h1>
    <div id="formulario">
        <h2>Consulta de asistencia</h2>
        <form method="post" action="1_sqli.php">
            <input type="text" name="id" placeholder="ID">
            <input type="submit" id="submit">
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Asistencias</th>
                <th>Faltas</th>
            </tr>
            <tr>

            <?php
              // Parametro que vamos a obtener por GET
              $id = $_GET["id"];

              // Resultado de la consulta sql 
              $data = mysqli_query($conn, "select nombre, asis, faltas from alumnos where id='$id'");
              $response = mysqli_fetch_array($data);
              echo '<tr><td>'.$id.'</td><td>'.$response['nombre'].'</td><td>'.$response['asis'].'</td><td>'.$response['faltas'].'</td>';
            ?>

            </tr>
        </table>
    </div>
</body>
</html>
