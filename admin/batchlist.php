<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Batch.php');
    $batch = new  Batch();


    if(isset($_GET['dbtc_id'])){
        $did = $_GET['dbtc_id'];
//        echo $did;
        $dd = $batch -> deleteById($did);
    }

    $gb    = $batch -> getAllBatch();
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead >
                    <tr>
                        <th colspan="4">ALL BATCH  <span style="color:red;">
                            <?php
                                if(isset($dd)){
                                    echo $dd;
                                }
                            ?>
                            </span></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Session</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($gb)){
                            while($value = $gb -> fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $value['batch_tag']; ?></td>
                        <td><?php echo $value['batch_session']; ?></td>
                        <td><a href="editbatch.php?btc_id=<?php echo $value['batch_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="?dbtc_id=<?php echo $value['batch_id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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