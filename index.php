<?php include("db.php")?>
<?php include("includes/header.php")?>


<div class="container p-4">

    <div class="row">

        <div class="col-md4">

        <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control"
                        placeholder="Título de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion"  rows="2" class="form-control"
                        placeholder="Descripción de la tarea"></textarea>
                    </div>
                    <input type="submit" 
                    name="save_task" class="btn btn-success btn-block" value="Guardar tarea">
                </form>
            </div>

        </div>

        <div class="col-md-8">
                <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado en</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                        $query = "SELECT * FROM tarea";
                        $result_tareas = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tareas)) { ?>
                            <tr>
                                 <td><?php echo $row['titulo'] ?></td>
                                 <td><?php echo $row['descripcion'] ?></td>
                                 <td><?php echo $row['creado_en'] ?></td>
                                 <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>">
                                        Editar<br>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>">
                                        Eliminar<br>
                                    </a>


                                 </td>
                            </tr>

                        <?php } ?> 
                    </tbody>
                </table>
        </div>
    </div>

</div>


<?php include("includes/footer.php")?>

    