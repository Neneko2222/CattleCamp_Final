<?php 
$databaseHost = 'localhost';
$databaseName = 'fod';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>

<?php
if(isset($_POST['add']))
{
   // $id = mysqli_real_escape_string($conn, $_POST['id']);

   $f_type = mysqli_real_escape_string($conn, $_POST['f_type']);
   $v_name = mysqli_real_escape_string($conn, $_POST['v_name']);
   $v_con = mysqli_real_escape_string($conn, $_POST['v_con']);
   $v_city = mysqli_real_escape_string($conn, $_POST['v_city']);
	$f_weight = mysqli_real_escape_string($conn, $_POST['f_weight']);
	$dop = mysqli_real_escape_string($conn, $_POST['dop']);
	$dor = mysqli_real_escape_string($conn, $_POST['dor']);
		
    //FOR UPLOADING IMAGE 
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "img/".$filename;

    //echo $folder;
    move_uploaded_file($tempname,$folder);

    if(empty($f_type) || empty($v_name) || empty($v_con) || empty($v_city) || empty($f_weight) || empty($dop) || empty($dor) || empty($filename)  ) {
				
      if(empty($f_type)) {
         echo "<font color='red'>f_type field is empty.</font><br/>";
      }
      if(empty($v_name)) {
         echo "<font color='red'>v_name field is empty.</font><br/>";
      }
      if(empty($v_con)) {
         echo "<font color='red'>v_con field is empty.</font><br/>";
      }

      if(empty($v_city)) {
         echo "<font color='red'>v_city field is empty.</font><br/>";
      }
      if(empty($f_weight)) {
         echo "<font color='red'>f_weight field is empty.</font><br/>";
      }
      if(empty($dop)) {
         echo "<font color='red'>dop field is empty.</font><br/>";
      }
      if(empty($dor)) {
         echo "<font color='red'>dor field is empty.</font><br/>";
      }

      if(empty($filename)) {
         echo "<font color='red'>filename field is empty.</font><br/>";
      }
     
   }else{

   $query = "INSERT INTO fodder(id,f_type,v_name,v_con,v_city,f_weight,dop,dor,receipt) VALUES('','$f_type','$v_name','$v_con','$v_city',$f_weight,'$dop','$dor','$folder')";
   $data = mysqli_query($conn ,$query);
    if($data)
    {
        echo "Data Inserted";
    }else{
        echo "Data Failed To Insert";

    }

}
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Charts</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">CattleCamp</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          
        </div>
      
      <li class="nav-item">
        <a class="nav-link" href="add.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Farmer</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fodder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Fodder</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="masterfodder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Master Fodder</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cattles.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Cattle</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insp.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inspection</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>About Us</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>Contact Us</span></a>
      </li>
    </ul>

</head>
<body>

<div class="container">
<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Fodder Profile</li>
        </ol>

  <p>Please Enter your Information:</p>

        
        <form method = "post" action = "" enctype="multipart/form-data">
               <fieldset>
               <table class="table " >
               <thead>
      <tr>
      <div class="form-group row">
  <label for="f_type" class="col-2 col-form-label">Fodder Type</label>
  <div class="col-10">
  <select class="form-control" id="f_type" name="f_type">
      <option>Wheat</option>
      <option>Grass</option>
      <option>Corn</option>
      <option>Hay</option>
    </select>
  </div>
                        </tr></thead>
                  
                     <thead>
      <tr>

      <div class="form-group row">
  <label for="v_name" class="col-2 col-form-label">Vendor Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="v_name" name="v_name">
  </div>
</div>
                        
                           </tr></thead>

                     <thead>
      <tr>
      <div class="form-group row">
  <label for="v_con" class="col-2 col-form-label">Vendor Contact</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="v_con" name="v_con">
  </div>
</div>
                        
                           </tr></thead>
                  
                      <thead>
      <tr>
      <div class="form-group row">
  <label for="v_city" class="col-2 col-form-label">Vendor City</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="v_city" name="v_city">
  </div>
</div>
                        
                           </tr></thead>	
			
                     <thead>
      <tr>
      <div class="form-group row">
  <label for="f_weight" class="col-2 col-form-label">Fodder Weight</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="f_weight" name="f_weight">
  </div>
</div>              
      
      
                           </tr></thead>		

                     <thead>
      <tr>
      <div class="form-group row">
  <label for="dop" class="col-2 col-form-label">Date of purchase</label>
  <div class="col-10">
    <input class="form-control" type="date" value="" id="dop" name="dop">
  </div>
</div>
                        
                           </tr></thead>		    

                     <thead>
      <tr>
      <div class="form-group row">
  <label for="dor" class="col-2 col-form-label">Date of received</label>
  <div class="col-10">
    <input class="form-control" type="date" value="" id="dor" name="dor">
  </div>
</div>
                        
                           </tr></thead>
                     
                     <thead>
      <tr>

      <div class="form-group row">
    <label for="img" class="col-2 col-form-label">Po receipt </label>
    <div class="col-10">
    <input type="file" class="form-control-file" value="img" name="img" id="img" aria-describedby="fileHelp">
    </div>
</div>
 
                        </tr></thead>

                    <thead>
      <tr>
                     
                        <button name = "add" type = "submit" id = "add" class="btn btn-primary">Add</button>
                        <button name = "display" type = "submit" id = "display" class="btn btn-success" href="display.php">Display</button>   
                            
                
 
			   
			   
                        </tr></thead>                
                  </table>
               </fieldset>
               </form>
               <a href="webcam.php">Click a Picture!!</a>


            </body>
            </html>   
