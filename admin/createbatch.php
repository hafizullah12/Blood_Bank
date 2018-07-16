<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Batch.php');
    $batch = new Batch();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $unm = $_POST['deptnm'];
        $des = $_POST['deptdes'];
        
        $bin = $batch -> insertBatch($unm, $des);
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Batch <span style="color:red;">
                        <?php 
                            if(isset($bin)){
                                echo $bin;
                            }
                        ?>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="createbatch.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="enter name" name="deptnm" required />
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" placeholder="enter name" name="deptdes" required />
                        </div>
                        <button class="btn btn-default"><span  class="glyphicon glyphicon-save"></span>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>