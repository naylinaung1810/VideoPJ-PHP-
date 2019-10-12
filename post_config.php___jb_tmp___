<?php
session_start();

class Post
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=lessonthree", 'root', '');
        } catch (PDOException $e) {
            die("Connection failed to database server.");
        }
    }

    public function addCategory($cat_name)
    {
        $old_sql="select * from category where cat_name='$cat_name'";
        $old_cat=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($old_cat))
        {
            $sql="insert into category (cat_name) values ('$cat_name')";
            $this->db->query($sql);
            $_SESSION['info']="Your category have been success.";

        }else
        {
            $_SESSION['error']="Your category is already exists";
        }
        header("location: category.php");
    }

    public function getCategory()
    {
        $sql="select * from category";
        return $this->db->query($sql);
    }

    public function add_Movie($name,$poster,$video,$cat_id)
    {
        //print_r($video);
        $id=$_SESSION['id'];
        $poster_tmp=$poster['tmp_name'];
        $video_tmp=$video['tmp_name'];
        $video_name=date("y-m-d-h-i-m").".".$video['name'];
        $poster_name=date("y-m-d-h-i-m").".".$poster['name'];

        move_uploaded_file($video_tmp,"video/movie/$video_name");
        move_uploaded_file($poster_tmp,"video/image/$poster_name");
       //echo $name.",".$poster_tmp.",".$video_tmp.",".$cat_id;
       $sql="insert into movies (name,poster,video,cat_id,user_id,created_at) values ('$name','$poster_name','$video_name','$cat_id','$id',now())";
        //$this->db->query($sql);
      $insert_ok=$this->db->query($sql);
       if($insert_ok)
       {
           $_SESSION['info']="Movie uploaded is OK....";
       }else
       {
           $_SESSION['error']="Movie upload is Fail...";
       }
       header("location: dashboard.php");
    }

    public function getMovies()
    {
        if(isset($_SESSION['admin']))
        {
            $sql="select movies.*,cat_name from movies left join category on movies.cat_id=category.id";
        }else
        {
            $id=$_SESSION['id'];
            $sql="select movies.*,cat_name from movies left join category on movies.cat_id=category.id where user_id='$id'";
        }

        return $this->db->query($sql);
    }

    public function delete_movie($id)
    {
        $sql="select * from movies where id='$id'";
        $del_row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $poster_img=$del_row['poster'];
        $video_name=$del_row['video'];
        unlink("video/image/$poster_img");
        unlink("video/movie/$video_name");

        $del_sql="delete from movies where id='$id'";
       $del_check= $this->db->query($del_sql);

       if($del_check)
       {
           $_SESSION['info']="Deletion is completely....";
       }else
       {
           $_SESSION['error']="Deletion is not success..";
       }
        header("location: dashboard.php");

    }

}