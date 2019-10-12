<?php
session_start();

class PostAll
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

    public function getAllPost()
    {
        $sql="select movies.*,users.email from movies left join users on movies.user_id=users.id";
        return $this->db->query($sql);
    }
}