<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta Fallida");
  }

  $_SESSION['message'] = 'Tarea guardada con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>