<?php
include("Library/header.php");
 if(!isset($_SESSION['donorId'])){
     header('Location:index.php');
 }
include_once('Classes/Donor.php');
$donor = new Donor();

    if(isset($_GET['e_id'])){
        $eid = $_GET['e_id'];     
        $gd  = $donor -> getDonorById($eid);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $enm = $_POST['user_name'];
        $ecnt = $_POST['user_cont'];
        $eml  = $_POST['user_email'];
        $est  = $_POST['st'];
        $uadd = $_POST['user_add'];
        $uid  = $_SESSION['donorId'];
        
//        echo $uid;
        $ud   = $donor -> updateDonor($uid, $enm, $ecnt, $eml, $est, $uadd);
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">     
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Profile</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            if(isset($gd)){
                                while($value = $gd -> fetch_assoc()){
                                    
                        ?>
                        <form action="editprofile.php" method="post">
                            
                            <div class="form-group">
                              <label for="usr">Name</label>
                              <input value="<?php echo $value['donor_name'] ?>" type="text" class="form-control" id="usr" name="user_name" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="usr_cnt">Contact No</label>
                              <input value="<?php echo $value['donor_contNo'] ?>" type="number" class="form-control" id="usr_cnt" name="user_cont" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="emal">Email (will be login ID)</label>
                              <input type="email" value="<?php echo $value['donor_email'] ?>" class="form-control" id="emal" name="user_email" required>
                            </div> 
                            
                            <div class="form-group">
                              <label for="usr_add">Address</label>
                              <input value="<?php echo $value['donor_address'] ?>" type="text" class="form-control" id="usr_add" name="user_add" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="sel1_stats">Status</label>
                                <select class="form-control" id="sel1_stats" name="st">
                                    <option value="1">Ready to donate</option>
                                    <option value="0">Not ready to donate</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                        <?php }}?>
                    </div>       
                </div>
            </div>
        </div>
    </div>

<?php
include("Library/footer.php"); 
?>