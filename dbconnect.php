<?php
session_start();
class dbconnection
{
    protected $db_name = 'manish';
    protected $db_user = 'tse';
    protected $db_pass = 'bPmtHasjyTJ2SgZJ';
    protected $db_host = 'localhost';
    public $connect_db;
    public function __construct()
    {
        $this->connect_db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if (!$this->connect_db) {
            echo "connected";
        } else {
            // echo " not connected";
        }
    }

    public function login($email, $pass)
    {
        $sql = "SELECT * FROM project WHERE email='$email' AND `password`='$pass'";
        $data = $this->connect_db->query($sql);
        if (mysqli_num_rows($data) == 1) {
            session_start();
            $_SESSION['email'] = $email;
            header("location:dashboard.php");
        } else {
            $_SESSION['alert'] = "Please Enter Correct Email and Password";
            header("location:adminpanel.php");
        }
    }

    public function insert($content, $date)
    {
        $query = "SELECT * FROM editor";
        $query_select = $this->connect_db->query($query);
        $content = addslashes($content);
        if (mysqli_num_rows($query_select) == 0) {
            $sql_query = "INSERT INTO editor(content,dateandtime)Values('$content','$date')";
            $query_insert = $this->connect_db->query($sql_query);
            if ($query_insert)
            {
                $_SESSION['insert'] = "Inserted Successfully";
            } else 
            {
                echo "not updated";
            }
        } else {

            if (mysqli_num_rows($query_select) > 0);
            $sql = "UPDATE editor SET content = '$content',dateandtime='$date'";
            $data = $this->connect_db->query($sql);
            if ($data) 
            {
                $_SESSION['update'] = "Updated Successfully";
            } else 
            {
                echo "not updated";
            }
        }
    }

    public function append()
    {
        $sql = "SELECT content  FROM  editor";
        $result = $this->connect_db->query($sql);
    
        if (mysqli_num_rows($result) > 0) 
        {
            $data = $result->fetch_assoc();
        } else {
            echo "not data";
        }
        echo json_encode($data);
    }


    public function editorappend()
    {
        $query = "SELECT content  FROM  editor";
        $dashboard = $this->connect_db->query($query);
        if (mysqli_num_rows($dashboard) > 0)
        {
            $data = $dashboard->fetch_assoc();
        } else 
        {
            echo "not data";
        }
        echo json_encode($data);

    }
}

$obj = new dbconnection;

if (isset($_POST['check_detail_content']))
{
    $result = $obj->append();
}

if (isset($_POST['check_detail_editor'])) 
{
    $result = $obj->editorappend();
}




