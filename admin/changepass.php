<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Admin.php');
    $admin = new Admin();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_SESSION['adminId'];
        $pass = $_POST['newpass'];
        
        $cngpass = $admin -> changePassById($id, $pass);
        
    }
?>
<div class="container">
    <div class="row">
        <?php 
            if(isset($cngpass)){
                
       
        ?>
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong><?php echo $cngpass; ?>!</strong>
        </div>
        <?php }?>
        <div class="col-md-offset-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form action="changepass.php" method="post">
                       <div class="form-group">
                            <label>New Password</label>
                            <input class="form-control" type="password" name="newpass" /><br/>
                            <button class="btn btn-default"><span class="glyphicon glyphicon-save">Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>