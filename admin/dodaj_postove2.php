<?php
ob_start();
require "includes/config.php";
include "includes/header.php";
include "function.php";

session_start();
if(!isset($_SESSION['korisnik_login']) || empty($_SESSION['korisnik_login'])) {
    header("Location: login.php");
    exit;
}

if(isset($_GET['edit'])){


}

?>


<body>
     

    <div id="wrapper">
    
        <!-- Navigation -->
        <?php  include "includes/navigation.php"  ?>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
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
                    </li>
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                       
                           
                        <?php 
                        
                         if(isset($_POST['submit'])){
                             $naslov = db_escape($_POST["naslovi"]);
                             $tekst = db_escape($_POST["tekst"]);
                             $slika = $_FILES['slike']['name'];
                             $slika_tmp = $_FILES['slike']['tmp_name'];

                             move_uploaded_file($slika_tmp, "../images/$slika" );

                             $query = "INSERT INTO go_line (naslov,tekst,slike) VALUES('{$naslov}','{$tekst}','{$slika}')";
                             $res = mysqli_query($connection, $query);
                             if(!$res){
                                die("Query failed ". mysqli_error($connection));
                             }
                             header("Location:go_line.php");
                             }
                             ?>
                       
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="author">Naslovi</label>
                            <input class="form-control" name="naslovi" type="text" />
                          </div>

                          <div class="form-group">
                            <label for="author">Tekst</label>
                            <input class="form-control" name="tekst" type="text" />
                          </div>
 
                         <div class="form-group">
                          <label for="image">Slike</label>
                          <input class="form-control" name="slike" type="file" />
                         </div>
  
                         <input class="btn btn-primary" name="submit" type="submit" value="Dodaj" />
                       </div>

                      </form>
                       
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