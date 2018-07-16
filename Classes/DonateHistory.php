<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
?>
<?php
class DonateHistory{
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
    
    
        function insertDhistory($did, $d_date, $d_to, $d_add){
            
            $this -> sql = "INSERT INTO `d_hist` (`d_id`, `donor_id`, `d_date`, `d_to`, `d_address`) VALUES (NULL, '$did', '$d_date', '$d_to', '$d_add');";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
//            return $this -> res;
            if($this -> res){
                header('Location:donorprofile.php?d_id='.$did.'');
            }else{
                return "Failed!!";
            }
            
        }
    
        function getHistoryById($id){
            $this -> sql ="SELECT * FROM `d_hist` WHERE donor_id='$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
    
        function getDateDiff($id){
            $this -> sql ="SELECT 120-DATEDIFF(CURDATE(), d_date) AS 'datedif' FROM d_hist WHERE donor_id = '$id' ORDER BY d_date DESC LIMIT 1 ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            $tmp = $this -> res -> fetch_assoc();
            return $tmp['datedif'];
        }
}
?>