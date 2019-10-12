<?php
session_start();

class User{
    public $db;
    public function __construct(){
        try{
            $this->db=new PDO("mysql:host=localhost;dbname=lessonthree", 'root', '');
        }catch(PDOException $e){
            die("Connection failed to database server.");
        }
    }
    public function deleteAccount(){
        $id=$_SESSION['id'];
        $sql="delete from users where id='$id'";
        $this->db->query($sql);
        header("location: logout.php");
    }
    public function getProfile(){
        $id=$_SESSION['id'];
        $sql="select * from users where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function login($email, $password){
        $old_sql="select * from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(!empty($old_row['email'])){
            $db_password=$old_row['password'];
            $enc_password=sha1($password);
            if($db_password==$enc_password){
                $_SESSION['my_login']=$old_row['name'];
                $_SESSION['id']=$old_row['id'];
                if($old_row['role']=="admin"){
                    $_SESSION['admin']=true;
                }
                header("location: dashboard.php");

            }else{
                $_SESSION['err']="The selected password is invalid.";
                header("location: login.php");    
            }
        }else{
            $_SESSION['err']="The email was not found.";
            header("location: login.php");
        }
    }
    public function register($name, $email, $password, $confirm_password){
        $old_sql="select email from users where email='$email'";
        $row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($row['email'])){
            
            if($password==$confirm_password){
                    $enc_password=sha1($password);

                    $my_sql="insert into users (name, email, password, created_at)
                     values ('$name', '$email', '$enc_password', now())";
                     $result=$this->db->query($my_sql);
                     if($result){
                        $_SESSION['info']="The user account have been created.";
                     }else{
                        $_SESSION['err']="The user account created failed.";
                     }
                     header("location: register.php");

            }else{
                $_SESSION['err']="The password and confirm password must match.";
                header("location: register.php");
            }

        }else{
            $_SESSION['err']="The email address is aleready exists.";
            header("location: register.php");
        }
    }
}