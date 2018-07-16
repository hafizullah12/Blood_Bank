<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
include_once($filepath.'/../Classes/Donor.php');
?>
<?php
class Blood{
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

        function insertBlood($name)
        {
            $this -> sql = "INSERT INTO `blood` (`blood_id`,`blood_group`) VALUES (NULL, '$name')";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
        }
    
    
        function getAllBloodGroup()
        {
            $this -> sql = "SELECT * FROM `blood` ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }

        function deleteById($id)
        {
            $donor = new Donor();
            $dd    = $donor -> getDonorByBatchID($id);

            if($dd -> num_rows > 0){
                return "Failed! this batch has donor";
            }
            else{
                $this -> sql ="DELETE FROM `blood` WHERE `blood`.`blood_id` = '$id'";
                $this -> res = mysqli_query($this -> conn, $this -> sql);

                if($this -> res)
                {
                    return "Success!!";
                }
                else
                {
                    return "Failed!!";
                }

            }
           
        }
}
?>