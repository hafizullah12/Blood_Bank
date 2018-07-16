<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Blood.php');
    $blood = new  Blood();


    if(isset($_GET['blood_id'])){
        $did = $_GET['blood_id'];
//        echo $did;
        $dd = $blood ->deleteById($did);
    }

    $gb    = $blood ->getAllBloodGroup();
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead >
                    <tr>
                        <th colspan="4">ALL Blood Group  <span style="color:red;">
                            <?php
                                if(isset($dd)){
                                    echo $dd;
                                }
                            ?>
                            </span></th>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                       
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($gb)){
                            while($value = $gb -> fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $value['blood_group']; ?></td>
                       
                        <td><a href="?blood_id=<?php echo $value['blood_id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <?php }}?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>