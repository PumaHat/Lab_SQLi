<?php

  $host = 'data_base'; // es el nombre del contenedor descrito en el archivo docker compose
  $username = 'sql';
  $password = 'password123';
  $database = 'puma';

  $conn = new mysqli($host, $username, $password, $database);

  // Parametro que vamos a obtener por GET
  // Pequeña sanitización
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  //echo "[!] el valor introducido es: " . $id . "<br> -------------------------------------------------------------------- <br>";

  // Resultado de la consulta sql 
  $data = mysqli_query($conn, "select username from users where id=$id");

  $response = mysqli_fetch_array($data);

  // No se muestra nada en la salida de la web por lo que estamos a ciegas
  //echo $response['username'];
  if (! isset($response['username'])) {
    http_response_code(404);
  }
?>
