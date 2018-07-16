<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Department.php');

    $dept = new Department();
    if(isset($_GET['dept_id'])){
        $did = $_GET['dept_id'];
//        echo $did;
        $dd  = $dept -> deleteById($did);
    }
    $getDept = $dept -> getAllDept();
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead >
                    <tr>
                        <th colspan="4">DEPARTMET LIST  <span style="color:red;">
                            <?php
                                if(isset($dd)){
                                    echo $dd;
                                }
                            ?>
                            </span></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Desciption</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($getDept)){
                            while($value = $getDept -> fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $value['dept_name']; ?></td>
                        <td><?php echo $value['dept_des']; ?></td>
                        <td><a href="editdept.php?dept_id=<?php echo $value['dept_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="? dept_id=<?php echo $value['dept_id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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