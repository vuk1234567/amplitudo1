<?php

require "includes/config.php";
include "function.php";

session_start();
if(!isset($_SESSION['korisnik_login']) || empty($_SESSION['korisnik_login'])) {
    header("Location: login.php");
    exit;
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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['korisnik_login'];    ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="myprofile.php"><i class="fa fa-fw fa-user"></i> My profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.php?action=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
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
                               <a href="postovi.php"><i class="fa fa-fw fa-wrench"></i> Postovi_1</a>
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
                               <a href="office_slike.php"><i class="fa fa-fw fa-wrench"></i> Office_slike</a>
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
                   
                       
                        <form action="" method="post">
                         <div class="form-group">
                           <label for="datum">Pocetni datum:</label>
                           <input style="width:200px" type="date" name="datum" class="form-control" id="datum">
                         </div>
                         <div class="form-group">
                          <label for="datum1">Krajnji datum:</label>
                          <input style="width:200px" type="date" name="datum1" class="form-control" id="datum1">
                         </div>
                         <div class="form-group">
                           <label for="datum">Pocetno vrijeme:</label>
                           <input style="width:200px" type="time" name="datum3" class="form-control" id="datum">
                         </div>
                         <div class="form-group">
                           <label for="datum">Krajnje vrijeme:</label>
                           <input style="width:200px" type="time" name="datum4" class="form-control" id="datum">
                         </div>
                          <button type="submit" name="submit"class="btn-primary">Trazi</button>
                          <br>
                          <br>

                    <table class="table table-bordered table-hover" id="tabela">
                             <thead>
                               <tr>
                               <th>Id</th>
                               <th>Ime_Prezime</th>
                               <th>Firma</th>
                               <th>Email</th>
                               <th>Broj telefona</th>
                               <th>Datum</th>
                               <th>Vrijeme</th>
                               <th>Status</th>
                              
                               </tr>
                             </thead>
                             <tbody>
                                
                                <?php
                                
                                if(isset($_POST['submit'])){
 
                                $dat = db_escape($_POST['datum']);
                                $dat1 = db_escape($_POST['datum1']);
                                $dat2 = db_escape($_POST['datum3']);
                                $dat3 = db_escape($_POST['datum4']);


                               $query = "SELECT * FROM zakazivanje WHERE `datum` Between '{$dat}' AND '{$dat1}' AND vrijeme BETWEEN '{$dat2}' AND '{$dat3}'";
                                  $res = mysqli_query($connection, $query);
                                 $count = mysqli_num_rows($res);
                                 if($count=="0"){
                                    echo "<h3> Nemate zakazanih termina za izabrani period!<h3>";
                                 }else {
 
                                   while($row = mysqli_fetch_array($res)){
                                   $id = $row['id'];
                                 $ime_prezime = $row['ime_prezime'];
                                 $firma = $row['firma'];
                                 $email = $row['email'];
                                 $brojtelefona = $row['brojtelefona'];
                                 $datum = $row['datum'];
                                 $vrijeme = $row['vrijeme'];
                                 $status = $row['status'];
                                   echo "<tr>";

                                    echo "<td>$id</td>";
                                    echo "<td>$ime_prezime</td>";
                                    echo "<td>$firma</td>";
                                    echo "<td>$email</td>";
                                    echo "<td>$brojtelefona</td>";
                                    echo "<td>$datum</td>";
                                    echo "<td>$vrijeme</td>";
                                    echo "<td>$status</td>";
                                   
                                    
                                echo "</tr>";
                                     
                                  }
                              }
                              }
                                  ?>
                              
                                 </tbody>
                             
                                 </table>

                             </form>
                             <div class="container">
                                 
                            <button class="btn btn-danger">Stampaj tabelu</button>
                             </div>
                             <script src="includes/jquery-3.3.1.min.js"></script>
                             <script>
                                $('.btn').click(function(){
                                  var stampaj = document.getElementById('tabela');
                                  var wme = window.open("","","width=900, height=700");
                                  wme.document.write(stampaj.outerHTML);
                                  wme.document.close();
                                  wme.focus();
                                  wme.print();
                                  wme.close();

                                })


                             </script>
                    </div>
                </div>
                <!-- /.row -->

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