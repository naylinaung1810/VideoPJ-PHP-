
<?php
 include('user_auth.php'); 
    include('user_config.php');
    $users=new User();
    $row=$users->getProfile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shopping > Profile</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include("navBar.php") ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header"><h3><span class='glyphicon glyphicon-user'></span> Profile</h3></div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="user.jpg" class="img-rounded img-responsive">
                    </div>
                    <div class="col-md-8">
                        <p>Username : <?php echo $row['name'] ?></p>
                        <p>Email : <?php  echo $row['email'] ?></p>    
                        <p>Join Date : <?php echo date("D(d)-m-Y : h-i A", strtotime($row['created_at'])) ?></p>
                        <hr>
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-danger">Delete Account</button>
                    </div>
                </div>
               
            </div>
        </div>
        </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation.</h4>
      </div>
      <div class="modal-body">
            <div class="text-danger">Are you sure want to delete your account ?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="delete_account.php" class="btn btn-primary">Agree</a>
      </div>
    </div>
  </div>
</div>

    <script src="bst/js/jquery.js"></script>
    <script src="bst/js/bootstrap.js"></script>
</body>
</html>