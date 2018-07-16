<?php
include("Library/header.php");
 if(!isset($_SESSION['donorId'])){
     header('Location:index.php');
 }
include_once('Classes/DonateHistory.php');
$dhist = new DonateHistory();
$gid = $_SESSION['donorId'];


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $dd   = $_POST['d_date'];
        $dad  = $_POST['d_ad'];
        $dst  = $_POST['d_st'];
        
        $ad = $dhist -> insertDhistory($gid, $dd, $dst, $dad);

    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">     
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add donation</h3>
                    </div>
                    <div class="panel-body">

                        <form action="adddonation.php" method="post">
                            
                            <div class="form-group">
                              <label for="usr">Date</label>
                              <input type="date" class="form-control" id="usr" name="d_date" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="usr_cnt">Address</label>
                              <input type="text" class="form-control" id="usr_cnt" name="d_ad" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="sel1_stats">Donate To</label>
                                <select class="form-control" id="sel1_stats" name="d_st">
                                    <option value="1">Direct to Patient</option>
                                    <option value="0">Blood Bank</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>

                    </div>       
                </div>
            </div>
        </div>
    </div>

<?php
include("Library/footer.php"); 
?>