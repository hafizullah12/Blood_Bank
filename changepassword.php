<?php
include("Library/header.php");
if(!isset($_SESSION['donorId'])){
     header('Location:index.php');
 }
include_once('Classes/Donor.php');
$donor = new Donor();
$gid;
if(isset($_GET['c_id'])){
    $gid = $_GET['c_id'];
    
//    echo $gid;
    
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $uid = $_SESSION['donorId'];
    $upass = $_POST['udpass'];
    $up = $donor -> updatePassword($uid, $upass);
    
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Password</h3>
                </div> 
                <div class="panel-body">
                    <form action="changepassword.php" method="post">
                        <input type="password" placeholder="Enter new password" class="form-control " name="udpass" / required><br/>
                        <button class="btn btn-primary btn-sm" >Update</button>
                    </form>
                </div>  
            </div>
        </div>
        </div>
    </div>
<?php
include("Library/footer.php");
?>