<?php
include("Library/header.php");
$filepath=realpath(dirname(__FILE__));
include_once('Classes/Department.php');
include_once('Classes/Batch.php');
include_once('Classes/Blood.php');
include_once('Classes/Donor.php');
    $dept  = new Department();
    $btch  = new Batch();
    $blood = new Blood();
    $donor = new Donor();

    $getDept  = $dept -> getAllDept();
    $getBatch = $btch -> getAllBatch();
    $getBldGp = $blood -> getAllBloodGroup(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $d_name = $_POST['user_name'];
        $d_cont = $_POST['user_cont'];
        $d_email = $_POST['user_email'];
        $d_pass  = $_POST['user_pass'];
        $d_dept  = $_POST['user_dept'];
        $d_batch = $_POST['user_batch'];
        $b_bldgp = $_POST['user_bgp'];
        $d_add   = $_POST['user_add'];
        
        $insertDonor = $donor -> createDonor($b_bldgp, $d_dept, $d_batch, $d_name, $d_cont, $d_email, $d_pass, $d_add);
    }

   
    
    
?> 
    
    <div class="container">
        <div class="row mgUpper ">
            <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title">Member Registration<span style="color:green;">
                        <?php
                        if(isset($insertDonor)){
                            echo $insertDonor;
                        }
                        ?>
                        </span><span style="float:right;"><a class="panel-title" href="index.php">Back </a></span> </h3>
                </div>
                <div class="panel-body">
                    <form action="registration.php" method="post">
                    <div class="form-group">
                      <label for="usr">Name</label>
                      <input type="text" class="form-control" id="usr" name="user_name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="usr_cnt">Contact No</label>
                      <input type="number" class="form-control" id="usr_cnt" name="user_cont" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="emal">Email (will be login ID)</label>
                      <input type="email" class="form-control" id="emal" name="user_email" required>
                    </div> 
                    
                    <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" id="pwd" name="user_pass" required>
                    </div> 
                    
                    <div class="form-group">
                        <label for="sel_dept">Department</label>
                        <select class="form-control" id="sel_dept" name="user_dept" required >
                            <option>Select Department</option>
                            <?php
                            if(isset($getDept)){
                                while($value = $getDept -> fetch_assoc()){
                                    
     
                            ?>
                            <option value="<?php echo $value['dept_id']; ?>"><?php echo $value['dept_name']; ?></option>
                            <?php
                            }}
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="sel_batch">Batch</label>
                        <select class="form-control" id="sel_batch" name="user_batch" required>
                            <option>Select Batch</option>
                            <?php
                            if(isset($getBatch)){
                                while($value = $getBatch -> fetch_assoc()){
                                    
                            ?>
                            <option value="<?php echo $value['batch_id']; ?>"><?php echo $value['batch_tag']; ?></option>
                            <?php }}?>
                        </select>
                    </div>
                        
                    <div class="form-group">
                      <label for="usr">Address</label>
                      <input type="text" class="form-control" id="usr" name="user_add" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="sel1_bgroup">Blood group</label>
                        <select class="form-control" id="sel1_bgroup" name="user_bgp" required>
                            <option>Select Blood Group</option>
                            <?php
                            if(isset($getBldGp)){
                                while($value = $getBldGp -> fetch_assoc()){
                                    
                            ?>
                            <option value="<?php echo $value['blood_id']; ?>"><?php echo $value['blood_group']; ?></option>
                            <?php }}?>
                        </select>
                    </div> 
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>  
                
            </div>
            </div>
        
        </div>  
    </div>
          
<?php
include("Library/footer.php");
?>