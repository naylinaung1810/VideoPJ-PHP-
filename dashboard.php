
<?php include('user_auth.php') ;
include 'post_config.php';
$pts=new Post();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shopping > Dashboard</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include("navBar.php") ?>

<div class="container-fluid">
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
        <div class="col-md-8">
           <div class="page-header">
               <h3><span class="glyphicon glyphicon-hd-video"></span> Movies List</h3>
           </div>
            <div class="table-responsive">
                <table class="table table-hover" style="border:1px #3c3c3c solid" id="dataTable">
                    <thead style="background-color: #3c3c3c;color: white">
                    <tr>
                        <td>Poster</td>
                        <td>Video Files</td>
                        <td>Title</td>
                        <td>Category</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <?php
                    $rows=$pts->getMovies();
                    foreach ($rows as $row)
                    {
                        ?>
                        <tr>
                            <td><img src="video/image/<?php echo $row['poster']?>" class="img-thumbnail" style="height: 100px;width: 100px;"></td>
                            <td><a href="video/movie/<?php echo $row['video'] ?>" class="btn btn-sm btn-success">Download</a> </td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['cat_name']?></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit text-primary" ></span> </a>
                                <a href="delete_movie.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash text-danger"></span> </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="page-header">
                <h3><span class="glyphicon glyphicon-plus-sign"></span> Add Movies</h3>
            </div>
            <form enctype="multipart/form-data" action="post_movie.php" method="post">
                <div class="form-group">
                    <label class="control-label" for="p_name">Movies Name</label>
                    <input type="text" class="form-control" name="name" id="p_name" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="m_poster">Poster</label>
                    <input type="file" class="form-control" id="m_poster" name="poster" required style="height: auto">
                </div>
                <div class="form-group">
                    <label class="control-label" for="m_video">Video</label>
                    <input type="file" class="form-control" id="m_video" name="video" required style="height: auto">
                </div>
                <div class="form-group">
                    <label class="control-label" for="cat_id">Category Name</label>
                    <select class="form-control" name="cat_id" id="cat_id" required>
                        <option value="">Select category</option>
                        <?php
                        $cat_name=$pts->getCategory();
                        foreach ($cat_name as $cat):
                            ?>
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['cat_name']?></option>

                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    

    <script src="bst/js/jquery.js"></script>
    <script src="bst/js/bootstrap.js"></script>
<script src="bst/js/jqueryDataTable.js"></script><!-- for data table... -->
<script src="bst/js/bootstratDataTable.js"></script><!-- for data table... -->
<script>
    $(function () {
        $("#dataTable").dataTable();

        setTimeout(function () {
            $('.alert').fadeOut();
        },2000);
    })

</script>
</body>
</html>