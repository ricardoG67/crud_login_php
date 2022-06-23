<?php include("db.php") ?>

<?php include("includes/header.php") ?>
    
<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"> 
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            <?php } ?>

            Correo actual: <?php echo $_SESSION['email'];?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Task title" autofocus required>
                    </div>
                    <div class="form-group">
                        <textarea id="description" name="description" rows="2" class="form-control" placeholder="Task description" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_task)){ ?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_at']?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>

                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                            </td>

                        </tr>
                    <?php $item[] = [
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'created_at' => $row['created_at']
                    ];
                    
                }?>
                </tbody>
            </table>
        </div>

    </div>
                    
</div>
<?php 
/*
VERIFICACIÓN POSTMAN

YA NO ES NECESARIO LA VALIDACIÓN DEBIDO A QUE EXISTE EL PROTOTIPO FUNCIONAL
Sin embargo, visualizando más codigos, se parcata de que se encuentra con 
malas practicas debido a que se junto tanto el php con el html

switch (($_SERVER)['REQUEST_METHOD']){
    case 'GET':
        json_encode($item);
        break;
    case 'POST':
        //echo json_encode($item);
        break;
    default:
        echo "null";
        break;
}*/
?>
<?php include("includes/footer.php") ?>
