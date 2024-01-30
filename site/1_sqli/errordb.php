<?php

  $host = 'data_base'; // es el nombre del contenedor descrito en el archivo docker compose
  $username = 'sql';
  $password = 'password123';
  $database = 'puma';

  $conn = new mysqli($host, $username, $password, $database);

  // Parametro que vamos a obtener por GET
  $id = $_GET["id"];

  // Resultado de la consulta sql 
  $data = mysqli_query($conn, "select username from users where id='$id'");
  echo "[!] el valor introducido es: " . $id . "<br> -------------------------------------------------------------------- <br>";

  $response = mysqli_fetch_array($data);

  echo $response['username'];
?>
