 
<?php
include("Library/header.php");
include_once('Classes/Donor.php');
include_once('Classes/DonateHistory.php');

$dhist = new DonateHistory();
$donor = new Donor();

if(isset($_SESSION['donorId']))
 $gid = $_SESSION['donorId'];

    if(isset($_GET['d_id'])){
        $did = $_GET['d_id'];
//        echo $did;
        $getD       = $donor -> getDonorById($did);
        $gethist    = $dhist -> getHistoryById($did);
        $getDatedif = $dhist -> getDateDiff($did);
    }
?> 
    
    <div class="container  mgUpper ">
        <div class="row">
            
            <div class="col-md-4 col-sm-12 col-xs-12">
                
               <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php
                                    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                    session_destroy();
                                    header('Location:index.php');
                                        }  
                                ?>
                                
                            <?php
                                        if(isset($_SESSION['donorId'])){
                            ?>
                                            <table class="table table-bordered table-condensed">
                                
                                <thead>
                                    <th><a href="? action=logout" class="btn btn-success">Logout</a></th>
                                </thead>
                                
                                <tbody>
                                    
                                    
                                    <tr>
                                        <td><a href="donorprofile.php?d_id=<?php echo $gid;?>" class="text-info">View Profile</a></td>
                                    </tr>
                                    
                                     <tr>
                                        <td><a href="editprofile.php?e_id=<?php echo $gid; ?>" class="text-info">Edit Profile</a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><a href="changepassword.php?c_id=<?php echo $gid; ?>" class="text-info">Change Password</a></td>
                                    </tr>
                                     
                                    <tr>
                                        <td><a href="#" class="text-info">Change Profile Photo</a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><a href="adddonation.php?a_id=<?php echo $gid; ?>" class="text-info">Add a Donation</a></td>
                                    </tr>
                                </tbody>
    
                            </table>
                                 <?php }
                            else{
                            ?>
                            <form action="index.php" method="post">
                            <input type="email" placeholder="Email" class="form-control " name="uemail" /><br/>
                            <input type="password" placeholder="Password" class="form-control " name="upass" /><br/>
                            <button class="btn btn-primary btn-sm" >Login</button>
                            </form>
                            <?php }?>
                        </div>
                    </div>       
                </div>
                
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profile<span style="float:right;"><a class="btn-link" style="color:white;" href="index.php">back</a></span></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <?php
                                    if(isset($getD)){
                                        while($value = $getD -> fetch_assoc()){
                                            

                                    ?>
                                    <tr>
                                        <td>Photo</td>
                                        <td><img class="img-responsive" style="width: 100px; height: 100px;" src="img/image-default.jpg" alt="profile" /></td>
                                    </tr>
                                    
                                     <tr>
                                        <td>Name</td>
                                        <td><?php echo $value['donor_name']; ?></td>
                                    </tr>
                                    
                                     <tr>
                                        <td>Blood Group</td>
                                        <td><?php echo $value['blood_group']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Member Status</td>
                                        <td><?php if(isset($getDatedif)){
                                        if($getDatedif>0){
                                            echo '<p style="color:red;"><strong style="color:#4D4D4D;">'.$getDatedif.'</strong> Days left to ready for next donation</p>';
                                        }else{
                                        if($value['donor_status'] == 0) echo "Inactive"; else echo "Active";
                                    }
                                    }else{
                                        if($value['donor_status'] == 0) echo "Inactive"; else echo "Active";
                                    } ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Contact No</td>
                                        <td>0<?php echo $value['donor_contNo']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Department</td>
                                        <td><?php echo $value['dept_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Batch</td>
                                        <td><?php echo $value['batch_tag']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $value['donor_address']; ?></td>
                                    </tr>
                                    <?php }}?>
                                </tbody>
                                
                            </table>
                            
                            <div class="table-responsive">
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Donation Date </th>
                                        <th>Donated To</th>
                                        <th>Address </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if($gethist -> num_rows>0){
                                        while($value = $gethist -> fetch_assoc()){

                                    ?>
                                    <tr>
                                        <td><?php echo $value['d_date'];?></td>
                                        <td><?php if($value['d_to'] == 0) echo "Blood Bank"; else echo "Direct To Patient";  ?></td>
                                        <td><?php echo $value['d_address']; ?></td>
                                    </tr>
                                    <?php }}
                                    else{
//                                    echo "<tr colspan='3'><h4 style='color:red;'>SORRY! No Donation History Found.</h4></tr>";
             
                                    ?>
                                    <tr>
                                    <td colspan="3"><h4 style='color:red;'>SORRY! No Donation History Found.</h4></td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>       
                </div>
            </div>
 
        
        </div> 
            
            
    </div>
      
      
<?php
include("Library/footer.php");
?>