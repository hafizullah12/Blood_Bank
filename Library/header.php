<?php
session_start();
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    <link rel="icon" href="img/index.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class="container-fluid">
           
   <div class="navbar navbar-default " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span><img class="img-responsive brandimg" src="img/logo3.jpg"/></span></a>
           <a class="navbar-brand" href="index.php">BLOOD DONOR SOCIETY</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="alldonor.php">All Donors List</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Blood <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="benefitofdonation.php">Why donate Blood</a></li>
                <li><a href="eligibilityofdonation.php">Eligibility to Donate Blood</a></li>
                <li><a href="responsibility.php">Tips for Success Donation</a></li>

              </ul>
            </li>
            <li><a href="bloodrequest.php">Request for Blood</a></li>
            <li><a href="aboutus.php">About BDS</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>  