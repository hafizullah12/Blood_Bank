<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/BloodRequest.php');
    
    $bloodreq = new BloodRequest();
    if(isset($_GET['req_id'])){
        $did = $_GET['req_id'];
        $reqDelete = $bloodreq -> deletRequestById($did);
    }
    $getReq = $bloodreq -> allRequest();
    $title  = "ALL";
    if(isset($_GET['req'])){
        $tmp = $_GET['req'];
//        echo $tmp;
        if($tmp == 'all'){
            $getReq = $bloodreq -> allRequest();
            $title  = "ALL";
        }elseif($tmp == 'valide'){
            $getReq = $bloodreq -> currentRequest();
            $title  = "VALIDE";
        }else{
           $getReq = $bloodreq -> outOfDateRequest();
           $title  = "INVALIDE"; 
        }
    }
?>
<div class="container">
    <div class="row">
        <?php 
            if(isset($reqDelete)){
                
       
        ?>
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong><?php echo $reqDelete; ?>!</strong>
        </div>
        <?php }?>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th colspan="9"><?php echo $title;?> BLOOD REQUEST</th>
                    </tr>
                    <tr>
                        <th colspan="3"><a href="?req=all">ALL</a></th>
                        <th colspan="3"><a href="?req=valide">VALIDE</a></th>
                        <th colspan="3"><a href="?req=invalide">INVALIDE</a></th>
                    </tr>
                    <tr>
                        <th>Sl. No.</th>
                        <th>Blood Group</th>
                        <th>Amount</th>
                        <th>Deadline</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Cont. No.</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($getReq)){
                        $i = 0;
                        while($value = $getReq -> fetch_assoc()){
                            $i++;
                    ?>
                    
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['blood_group']; ?></td>
                        <td><?php echo $value['req_amount']; ?></td>
                        <td><?php echo $value['req_deadline']; ?></td>
                        <td><?php echo $value['req_name']; ?></td>
                        <td><?php echo $value['req_location']; ?></td>
                        <td>0<?php echo $value['req_cnt']; ?></td>
                        <td><?php echo $value['req_message']; ?></td>
                        <td><a href="?req_id=<?php echo $value['req_id']; ?>"><span title="remove" class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php }}?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>