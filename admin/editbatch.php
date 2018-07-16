<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Batch.php');
    $batch = new Batch();

    if($_SERVER['REQUEST_METHOD']=='GET'){
        $bid = $_GET['btc_id'];
        $ub  = $batch -> getBatchById($bid);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $deptid = $_POST['deptid'];
        $unm    = $_POST['deptnm'];
        $des    = $_POST['deptdes'];
        
        $din    = $batch -> updateBatch($deptid, $unm, $des);
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Batch <span style="color:red;">
                        <?php 
                            if(isset($din)){
                                echo $din;
                            }
                        ?>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    if(isset($ub)){
                       while( $value = $ub -> fetch_assoc()){
                    ?>
                    <form action="editbatch.php" method="post">
                        <input value="<?php echo $value['batch_id']; ?>" name="deptid" hidden="hidden" readonly/>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" value="<?php echo $value['batch_tag']; ?>" placeholder="enter name" name="deptnm" required />
                        </div>
                        <div class="form-group">
                            <label>Session</label>
                            <input class="form-control" value="<?php echo $value['batch_session']; ?>" placeholder="enter name" name="deptdes" required />
                        </div>
                        <button class="btn btn-default"><span  class="glyphicon glyphicon-save"></span>Submit</button>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>