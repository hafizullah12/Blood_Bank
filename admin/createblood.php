<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Blood.php');
    $blood = new Blood();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['blood_group'];
       
        
        $bin = $blood -> insertBlood($name);
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Blood Group <span style="color:green;">
                        <?php 
                            if(isset($bin)){
                                echo $bin;
                            }
                        ?>
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="createblood.php" method="post">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <input class="form-control" placeholder="enter name" name="blood_group" required />
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