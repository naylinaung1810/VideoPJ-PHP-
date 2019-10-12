<?php
include 'global_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shopping > Welcome</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include("navBar.php");


?>

<div class="container-fluid">
    <div class="row">
        <?php
        $posts=new PostAll();
        $allPost=$posts->getAllPost();
        foreach ($allPost as $post)
        {
            ?>
            <div class="col-sm-3 col-md-3" style="">
                <div class="thumbnail">
                    <img src="video/image/<?php echo $post['poster'] ?>" class="img-thumbnail img-responsive" style="width: auto;height: 300px">
                <h3 class="text-center"><?php echo $post['name'] ?></h3>
                <p class="text-center">Upload By:<?php echo $post['email'] ?></p>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a class="btn btn-primary btn-block" href="video/movie/<?php echo $post['video']?>">Download</a>
                    </div>
                    <div class="col-sm-6 col-xs-6 col-md-6">
                        <a class="btn btn-success btn-block" href="#" data-toggle="modal" data-target="#<?php echo $post['id'] ?>">Play</a>
                        <div data-keyboard="false" data-backdrop="static" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="<?php echo $post['id'] ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <?php echo $post['name'] ?><a href="index.php" class="btn btn-danger btn-sm pull-right">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item" src="video/movie/<?php echo $post['video']?>" controls poster="video/image/<?php echo $post['poster']?>"></video>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>
    

    <script src="bst/js/jquery.js"></script>
    <script src="bst/js/bootstrap.js"></script>
</body>
</html>