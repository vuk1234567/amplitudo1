<?php

require "includes/config.php";
include "function.php";

session_start();
if(!isset($_SESSION['korisnik_login']) || empty($_SESSION['korisnik_login'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['korisnik_login'];
$password="";
if(isset($_POST['submit'])){
    $password1 = db_escape($_POST['password1']); 
    $password = db_escape($_POST['password']); 
    if($password1 != $password) {
        
    $error="Vaš password nije validan.";    
    } else {
       $password_hash = db_escape(sha1($password));
  $query = mysqli_query($connection, "UPDATE korisnici set password='{$password_hash}' WHERE `username`='{$username}'");
  $msg="Uspješno ste promjenili password";
    }

}




?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>
     

    <div id="wrapper">
    
        <!-- Navigation -->
        <?php  include "includes/navigation.php"  ?>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post_down"><i class="fa fa-fw fa-arrows-v"></i> Postovi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post_down" class="collapse">
                            <li>
                               <a href="postovi.php">Postovi_1</a>
                            </li>
                            <li>
                                 <a href="go_line.php">Postovi_2</a>
                            </li>
                         </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Sastanci <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="tabela.php">Zakazani</a>
                            </li>
                            <li>
                                <a href="odaberiSastanak.php">Odaberi</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post_drop_down"><i class="fa fa-fw fa-arrows-v"></i> Slike <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post_drop_down" class="collapse">
                            <li>
                               <a href="office_slike.php">Office_slike</a>
                            </li>
                            <li>
                                 <a href="client_slike.php">Client_slike</a>
                            </li>
                         </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome <?php echo $_SESSION['korisnik_login'];    ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                        </ol>
                    </div>
                </div>
              
                <!-- /.row -->
                    


                    <form name="chngpwd" class="form-signin" method="post" action="#" onSubmit="return valid();">
                                
  <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } 
        else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo $msg; ?> </div><?php }?>
        
        <h1 class="h3 mb-3 font-weight-normal">Promjeni password</h1>
        <label for="inputUsername" class="sr-only">Pasword</label>
        <input style="width:300px;" type="password" id="inputUsername" name="password1" class="form-control" placeholder="Novi password" required autofocus <?php if(isset($_POST['password1'])) { echo 'value="' . $_POST['password1'] . '" '; } ?>>
        <label for="inputPassword" class="sr-only">Ponovi pasword</label>
        <input style="width:300px;" type="password" id="inputPassword" name="password" class="form-control" placeholder="Potvrdi novi password" required>
        <button style="width:100px;" class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Promjeni</button>
    </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
