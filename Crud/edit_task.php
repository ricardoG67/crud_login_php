<?php
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id=$id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result); //retorna toda la row con ese id
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title= $_POST['title'];
        $description = $_POST['description'];
      
        $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
    }

?>
<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Update title" autofocus required
                        value="<?php echo $title;?>">
                    </div>
                    <div class="form-group">
                        <textarea id="description" name="description" rows="2" class="form-control" placeholder="Task description" required><?php echo $description;?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="update" value="Update Task">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
