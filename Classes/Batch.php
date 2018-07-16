<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
include_once($filepath.'/../Classes/Donor.php');
?>
<?php
class Batch{
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
    
    
        function insertBatch($nm, $des)
        {
            $this -> sql = "INSERT INTO `batch` (`batch_id`, `batch_tag`, `batch_session`) VALUES (NULL, '$nm', '$des')";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
        }
    
        function getAllBatch(){
            $this -> sql = "SELECT * FROM `batch` ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
    
        function getBatchById($bid){
            $this -> sql = "SELECT * FROM `batch` WHERE batch_id = '$bid';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
    
        function updateBatch($id, $name, $des){
            $this -> sql = "UPDATE `batch` SET `batch_tag` = '$name', `batch_session` = '$des' WHERE `batch`.`batch_id` = '$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            
            if($this -> res){
                header('Location:batchlist.php');
            }else{
                return "Failed!!";
            }
        }
    
        function deleteById($id)
        {
            $donor = new Donor();
            $dd    = $donor -> getDonorByBatchID($id);
            if($dd -> num_rows > 0){
                return "Failed! this batch has donor";
            }else{
                $this -> sql ="DELETE FROM `batch` WHERE `batch`.`batch_id` = '$id'";
                $this -> res = mysqli_query($this -> conn, $this -> sql);

                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
            }
           
        }
    
        function countBatch(){
        $this -> sql = "SELECT COUNT(batch_id) AS totalBatch FROM `batch`;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        $value = $this -> res -> fetch_assoc();
        return $value['totalBatch'];
        }
}
?>