<?php 
include("Library/header.php");
include_once('Classes/Donor.php');
include_once('Classes/BloodRequest.php');
include_once('Classes/DonateHistory.php');
$donor = new Donor();
$bloodreq = new BloodRequest();
$dhist = new DonateHistory();

$getreq   = $bloodreq -> currentRequest();
$ap  = $donor -> donorByGroup('A+');
$an  = $donor -> donorByGroup('A-');
$bp  = $donor -> donorByGroup('B+');
$bn  = $donor -> donorByGroup('B-');
$op  = $donor -> donorByGroup('O+');
$on  = $donor -> donorByGroup('O-');
$abp = $donor -> donorByGroup('AB+');
$abn = $donor -> donorByGroup('AB-');

$nu = $donor -> newDonor();
//echo '<pre>';
//print_r($nu);
//echo '</pre>';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ueml = $_POST['uemail'];
    $upss = $_POST['upass'];
    
    $getLog = $donor -> donorLogin($ueml, $upss);
}
?>
      
    <div class="container">
        <div class="row promo">
            <h3>Donate blood,save life !</h3>
            <h2>
              Your Donation Can bring
              <br>
               smile at others face
             </h2>
            </div>
        </div>
      
      
      <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Donor's Area<span style="color:yellow;">
                          <?php
                          if(isset($getLog)){
                              echo $getLog;
                          }
                          ?>
                          </span></h3>
                    </div>
                    
                    <div class="panel-body">
                        <?php
                        if(isset($_SESSION['donorId'])){
                            $id = $_SESSION['donorId'];
//                            echo $id;
                            echo "<a href='donorprofile.php?d_id=$id' class = 'btn btn-primary' >Go to Profile</a>";
                        }else{
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
            
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"> Will Be a Donor?</h3>
            </div>
            <div class="panel-body">
                <div class="row ">
                <div class="col-md-6">

                <img src="img/be-a-blood-donors.jpg" />
                </div>
                <div class="col-md-6">
                <a href="registration.php" class="btn btn-primary">Click Here</a>    
                </div>
                </div>
            </div>  
            </div>  
          </div>      
            
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Need Blood?</h3>
            </div>
            <div class="panel-body">
                <div class="row ">
                <div class="col-md-6">

                <img src="img/looking-for-blood-donors.jpg" />
                </div>
                <div class="col-md-6">
                <a href="bloodrequest.php" class="btn btn-primary">Click Here</a>    
                </div>
                </div>
            </div>  
            </div>  
          </div>
      </div>
      </div>
      
      
            <div class="container">
            <div class="row">
            <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Find Donors by Group</h3>
            </div>
            <div class="panel-body">
                <div class="row ">
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=1">A+<span class="badge"><?php echo $ap; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=2">A-<span class="badge"><?php echo $an; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=4">B+<span class="badge"><?php echo $bp; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=5">B-<span class="badge"><?php echo $bn; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=6">O+<span class="badge"><?php echo $op; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=7">O-<span class="badge"><?php echo $on; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=8">AB+<span class="badge"><?php echo $abp; ?></span></a>
            </div>
            <div class="mgtop col-md-3">
                <a class="nav-pills active thumbnail  btn btn-primary btn-lg" href="alldonor.php?b_id=9">AB-<span class="badge"><?php echo $abn; ?></span></a>
            </div>
                </div>
            </div>  
            </div> 


            </div>
      </div>
      
      
      <div class="container">
        <div class="row">
            <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Our Latest Members</h3>
            </div>
            <div class="panel-body">
                <div class="row ">
                <div class="table-responsive">
                <table class="table table-bordered  table-striped table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Blood Group</th>
                        <th>Department</th>
                        <th>Batch</th>
                        <th>Contact No</th>
                        <th>Donor's Status</th>
                        <th>Email</th>
                        <th>Profile</th>
 
                    </thead>
                    
                    <tbody>
                        <?php
                        if(isset($nu)){
                            while($value = $nu -> fetch_assoc()){
                               $did = $value['donor_id'];
                               $getDatedif = $dhist -> getDateDiff($did);  
                        ?>
                        <tr>
                            <td><?php echo $value['donor_name']; ?></td>
                            <td><?php echo $value['blood_group']; ?></td>
                            <td><?php echo $value['dept_name']; ?></td>
                            <td><?php echo $value['batch_tag']; ?></td>
                            <td>0<?php echo $value['donor_contNo']; ?></td>
                            <td><?php if(isset($getDatedif)){
                                        if($getDatedif>0){
                                            echo '<p style="color:red;"><strong style="color:#4D4D4D;">'.$getDatedif.'</strong> Days left to ready for next donation</p>';
                                        }else{
                                        if($value['donor_status'] == 0) echo "Inactive"; else echo "Active";
                                    }
                                    }else{
                                        if($value['donor_status'] == 0) echo "Inactive"; else echo "Active";
                                    } ?></td>
                            <td><?php echo $value['donor_email']; ?></td>
                            <td><a href="donorprofile.php?d_id=<?php echo $value['donor_id']; ?>" class="btn  btn-info">View Profile</a></td>
                        </tr>
                        <?php }}?>
            
                    </tbody>
                    
                    <tfoot>
                        <tr>
                           <td colspan="8"><a style="float:right;" class="btn">See All</a></td> 
                        </tr>
                    </tfoot>

                </table>
              </div>
                </div>
            </div>  
            </div> 
          </div>
      </div>
        
  
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Current Request for Blood</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if(isset($getreq)){
                        while($value = $getreq -> fetch_assoc()){
                            
                    ?>
                <div class="thumbnail col-md-6  col-sm-12 col-xs-12 ">
                  <h5><strong>Blood Group : </strong><?php echo $value['blood_group']; ?></h5>
                  <h5><strong>Amount : </strong><?php echo $value['req_amount']; ?> Unit(s)/Bag(s) </h5>
                  <h5><strong>Donation Date : </strong><?php echo $value['req_deadline']; ?></h5>
                  <h5><strong>Patient's Location : </strong><?php echo $value['req_location']; ?></h5>
                  <h5><strong>Contact Number: </strong><?php echo $value['req_cnt']; ?></h5>
                  <h5><strong>More Message : </strong><?php echo $value['req_message']; ?></h5>
                </div>
              <?php }}?>
                </div>  
                
            </div>       
      </div>
      </div>
<?php
include("Library/footer.php");      
?>