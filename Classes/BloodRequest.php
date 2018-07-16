<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
?>
<?php
class BloodRequest{
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
    function insertBloodReq($bid, $rname, $rcnt, $ram, $rloc, $rdl, $rms){
        
        $rloc = mysqli_real_escape_string($this -> conn, $rloc) ;
        $rms  = mysqli_real_escape_string($this -> conn, $rms) ;
        
        $this -> sql = "INSERT INTO `blood_req` (`req_id`, `blood_id`, `req_name`, `req_cnt`, `req_amount`, `req_location`, `req_deadline`, `req_message`, `cur_date`) VALUES (NULL, '$bid', '$rname', '$rcnt', '$ram', '$rloc', '$rdl', '$rms', CURRENT_DATE());";
        
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
    }
    
    function currentRequest(){
        $this -> sql ="SELECT req_id, blood.blood_group, req_amount, req_deadline, req_name, req_location, req_cnt, req_message FROM blood_req, blood WHERE blood_req.blood_id = blood.blood_id AND blood_req.req_deadline >= CURRENT_DATE ;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        return $this -> res;
    }
    
    function allRequest(){
        $this -> sql = "SELECT req_id, blood.blood_group, req_amount, req_deadline, req_name, req_location, req_cnt, req_message FROM blood_req, blood WHERE blood_req.blood_id = blood.blood_id ;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        return $this -> res;
    }
    
    function outOfDateRequest(){
       $this -> sql = "SELECT req_id, blood.blood_group, req_amount, req_deadline, req_name, req_location, req_cnt, req_message FROM blood_req, blood WHERE blood_req.blood_id = blood.blood_id AND blood_req.req_deadline < CURRENT_DATE";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        return $this -> res; 
    }
    
    function countRequest(){
        $this -> sql = "SELECT COUNT(req_id) AS totalReq FROM `blood_req`;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        $value = $this -> res -> fetch_assoc();
        return $value['totalReq'];
        }
    
    function deletRequestById($id){
        $this -> sql ="DELETE FROM `blood_bank`.`blood_req` WHERE `blood_req`.`req_id` = '$id';";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
    }
}
?>