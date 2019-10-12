
<?php
include('user_auth.php');
include 'post_config.php';
if($_SESSION['admin']!=true)
{
    header("location: index.php");
}
$post=new Post();
$rows=$post->getCategory();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shopping > Categories</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include("navBar.php") ?>

    <div class="container">
        <?php
        if(isset($_SESSION['error']))
        {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['error']?>
            </div>
            <?php
        }
        unset($_SESSION['error']);
        ?>
        <?php
        if(isset($_SESSION['info']))
        {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['info']?>
            </div>
            <?php
        }
        unset($_SESSION['info']);
        ?>
        <div class="row">
            <div class="page-header"><h3><span class="glyphicon glyphicon-cloud"></span> Categories</h3></div>
            <div class="col-md-8">
                <div class="page-header">
                    Category List
                </div>
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>Cat_Name</td>
                        <td>Action</td>
                    </tr>
                <?php
                foreach ($rows as $row)
                {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['cat_name']?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span> </a>
                            <a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </table>
            </div>
            <div class="col-md-4">
                <div class="page-header"><h4><span class="glyphicon glyphicon-plus-sign"></span> New Category</h4></div>
                <form action="add_category.php" method="post">
                    <div class="form-group">
                        <lable class="control-label" for="cat_name">Category Name</lable>
                        <input required type="text" name="cat_name" id="cat_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="bst/js/jquery.js"></script>
    <script src="bst/js/bootstrap.js"></script>
</body>
</html>