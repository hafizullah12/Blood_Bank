<?php
$filepath=realpath(dirname(__FILE__));
    session_start();
    $adId = $_SESSION['adminId'];
    if(!$adId){
       header('Location:login.php'); 
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
        <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php">BDS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Donor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="createdoner.php">Create Donor</a></li>
            <li><a href="donerlist.php">Donor List</a></li>
          </ul>
        </li>
          
        <li><a href="allbloodrequest.php">Blood Request</a></li>
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Department<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="createdept.php">Create Department</a></li>
            <li><a href="deptlist.php">Department List</a></li>
          </ul>
        </li>
         
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Batch<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="createbatch.php">Create Batch</a></li>
            <li><a href="batchlist.php">Batch List</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blood<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="createblood.php">Create Blood</a></li>
            <li><a href="bloodlist.php">Blood List</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a target="_blank" href="../index.php">Visit Site</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"><?php echo $_SESSION['adminName'];?></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="changepass.php">Change Password</a></li>
            <li class="divider"></li>
              <?php
                if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                    session_destroy();
                    header('Location:login.php');
                }  
            ?>
            <li><a href="? action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      </div>
