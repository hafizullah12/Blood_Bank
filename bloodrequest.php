<?php
include("Library/header.php");
include_once('Classes/BloodRequest.php');
include_once('Classes/Blood.php');

    $breq = new BloodRequest();
    $blood = new Blood();
    $getBldGp = $blood -> getAllBloodGroup();

    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $rname = $_POST['req_name'];
        $rcnt  = $_POST['req_cont'];
        $rbgp  = $_POST['req_bg'];
        $ram   = $_POST['req_qt'];
        $rad   = $_POST['req_loc'];
        $rdd   = $_POST['req_date'];
        $rmsg  = $_POST['req_msg'];
        
        $br    = $breq ->  insertBloodReq($rbgp, $rname, $rcnt, $ram, $rad, $rdd, $rmsg);
        
        
    }
?>
      
    <div class="container">
        <div class="row mgUpper ">
            
                <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title">Make a Request for Blood  <span style="color:yellow;">
                        <?php
                            if(isset($br)){
                                echo $br;
                            }
                        ?>
                        </span></h3>
                </div>
                    
                <div class="panel-body">
                <form action="bloodrequest.php" method="post">
                    <div class="form-group">
                      <label for="usr_name">Your Name</label>
                      <input type="text" class="form-control" id="usr_name" name="req_name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="usr_cont">Your Contact No</label>
                      <input type="number" class="form-control" id="usr_cont" name="req_cont" required>
                    </div> 
                                   
                     <div class="form-group">
                        <label for="sel1_bgroup">Required Blood Group</label>
                        <select class="form-control" id="sel1_bgroup" name="req_bg" required>
                            <option>Select Blood Group</option>
                            <?php
                            if(isset($getBldGp)){
                                while($value = $getBldGp -> fetch_assoc()){
                                    
                            ?>
                            <option value="<?php echo $value['blood_id']; ?>"><?php echo $value['blood_group']; ?></option>
                            <?php }}?>
                        </select>
                    </div> 
                    
                    <div class="form-group">
                      <label for="bld_amt">Amount(Unit/Bag)</label>
                      <input type="number" class="form-control" id="bld_amt" name="req_qt" required>
                    </div> 
                    
                    <div class="form-group">
                      <label for="usr_loc">Patient's Location</label>
                      <input type="text" class="form-control" id="usr_loc" name="req_loc" required>
                    </div>
                    
                   <div class="form-group">
                      <label for="dnt_date">Date of Donation</label>
                      <input type="date" class="form-control" id="dnt_date" name="req_date" required>
                    </div> 
                    
                    <div class="form-group">
                      <label for="usr_msg">More Message</label>
                      <textarea class="form-control" rows="5" name="req_msg" id="usr_msg"></textarea>
                    </div> 
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                
                </form>
                
                </div>  
                
            </div> 
        
        </div>  
    </div>
    
          
<?php
include("Library/footer.php");
?>