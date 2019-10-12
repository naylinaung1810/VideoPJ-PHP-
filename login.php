<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shopping... > Login</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include("navBar.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_SESSION['err'])){
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'] ?></div>
                <?php
            }
            unset($_SESSION['err']);
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
                <?php
            }
            unset($_SESSION['info']);
            
            ?>
                <h3 class="text-center">Login User Account</h3>
                <hr>
                <form action="post_login.php" method="post">
                   
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" id="email" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" id="password" required class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Signin</button>
                    </div>
                </form>
                Don't have an account ? <a href="register.php">Register</a>
            </div>
        </div>
    </div>
    

    <script src="bst/js/jquery.js"></script>
    <script src="bst/js/bootstrap.js"></script>
</body>
</html>