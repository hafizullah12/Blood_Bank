<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Department.php');
include_once($filepath.'/../Classes/Batch.php');
include_once($filepath.'/../Classes/Blood.php');
include_once($filepath.'/../Classes/Donor.php');
include_once($filepath.'/../Classes/BloodRequest.php');
    
    $donor    = new Donor();
    $dept     = new Department();
    $blood    = new Blood();
    $batch    = new Batch();
    $bloodReq = new BloodRequest();

    $cntDonor = $donor -> countDonor();
    $cntDept  = $dept -> countDepartment();
    $cntBtch  = $batch ->  countBatch(); 
    $cntReq   = $bloodReq -> countRequest();

   
?>
<div class="container">
    <div class="heading">
        <h1>Dash Board</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body bk-primary text-white">
                    <h1><?php 
                        if(isset($cntDonor)){
                            echo $cntDonor;
                        }
                        ?></h1>
                    <p>Registered Doners</p>
                </div>
                <div class="panel-footer"><a href="donerlist.php">FULL DETAILS <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
            </div>
             
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body bk-primary text-white">
                    <h1><?php 
                        if(isset($cntDept)){
                            echo $cntDept;
                        }
                        ?></h1>
                    <p>Registered Departments</p>
                </div>
                <div class="panel-footer"><a href="deptlist.php">FULL DETAILS <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body bk-primary text-white">
                    <h1><?php 
                        if(isset($cntBtch)){
                            echo $cntBtch;
                        }
                        ?></h1>
                    <p>Registered Batch</p>
                </div>
                <div class="panel-footer"><a href="batchlist.php">FULL DETAILS <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body bk-primary text-white">
                    <h1><?php 
                        if(isset($cntReq)){
                            echo $cntReq;
                        }
                        ?></h1>
                    <p>Blood request</p>
                </div>
                <div class="panel-footer"><a href="allbloodrequest.php">FULL DETAILS <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>