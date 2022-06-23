<?php require('../Crud/db.php');
session_unset();

if(isset($_POST['email']) && isset($_POST['password'])){

    if(!isset($_SESSION)){
        session_start();
    }

    if(!empty($_POST['email'] && !empty($_POST['password']))){

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $query = "SELECT * FROM users WHERE email='$email'";

        $login = mysqli_query($conn, $query);

        $message = '';

        if($login && mysqli_num_rows($login)==1){
            $user = mysqli_fetch_array($login); //retorna toda los user con ese email
            $password_segura = $user[2];//[2] es la password, [0] id y [1] email.
            if(password_verify($password,$password_segura)){
                $_SESSION['usuario'] = $user;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password_segura;
                header('Location: ../Crud/index.php');
            }else{
                session_unset();
                $message = 'Sorry, those credentials do not match';
            }
        }
    }

}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="login.php" method="POST">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Log In">
                            </div>
                        </form>
                        <?php if(!empty($message)): ?>
                            <p> <?= $message ?></p>
                        <?php endif; ?>
                        <div id="register-link" class="text-right">
                                <a href="signup.php" class="text-info">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
