<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
?>

<?php
    class Admin{
        
     public $uhost = DB_HOST;
     public $uuser = DB_USER;
     public $upass = DB_PASS;
     public $udb   = DB_NAME;

        
     private $conn;
     private $sql;
     private $res;
        
        function __construct(){
            $this -> conn = mysqli_connect($this -> uhost, $this -> uuser, $this -> upass, $this -> udb);
        }
        
        public function adminLogin($uname, $upass){
            
            $this -> sql = "SELECT * FROM `admin` WHERE username='$uname' AND pass='$upass';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if( $this -> res -> num_rows > 0){
                $value = $this -> res -> fetch_assoc();
                session_start();
                $_SESSION['adminId']    = $value['admin_id'];
                $_SESSION['adminName']  = $value['name'];
                header('Location:dashboard.php');
            }
            else{
                return "not match";
            }
        }
        
        
        function changePassById($id, $pass){
            $this -> sql = "UPDATE `admin` SET `pass` = '$pass' WHERE `admin`.`admin_id` = '$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);

                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
        }
        

        
    }
?>