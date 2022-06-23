<?php require('../Crud/db.php');

$errores = array();
$message = '';
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])){

    if(!empty($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    if(!empty($_POST['password']) && !empty($_POST['password2'] && $_POST['password'] == $_POST['password2']) ){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña no es valida";
    }


    if (count($errores)==0){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);

        //var_dump(password_verify($password, $password_segura)); <- VERIFICA 

        $sql = "INSERT INTO `users`(email, password) VALUES('$email', '$password_segura')";
        $result = mysqli_query($conn, $sql);
        $message = "Succesfully created a new user";
        
        
        /*
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password_segura);

        if($stmt->execute()){
            $message = "Succesfully created a new user";
        }*/

    }else{
        $_SESSION['errores'] = $errores;
        header('signup.php');
    }
}


?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Signup</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="signup.php" method="POST">
                            <h3 class="text-center text-info">Sign up</h3>

                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="text-info">Confirm password:</label><br>
                                <input type="password" name="password2" id="password2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
                            </div>
                            <?php if(isset($_SESSION['errores'])):?>
                                <?php echo "The email or the password is not valid";?>
                            <?php endif; session_unset();?>

                            <?php if(!empty($message)):?>
                                <?php echo $message;?>
                            <?php endif;?>
                        </form>

                        <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Log in here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
