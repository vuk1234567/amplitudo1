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

if(isset($_GET['obrisi'])){

 $del_id = $_GET['obrisi'];
 
 $query = "DELETE FROM client_slike WHERE id = '{$del_id}' ";
 $res = mysqli_query($connection, $query);

 
}


?>

<script>
function myFunction() {
    var agree = confirm("Da li ste sigurni da želite da obrišete proizvod?");
    if(agree){
        return true;
    }else {
        return false;
    }
}
</script>



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
                         <div class="col-xs-6">
                        <?php

                        if(isset($_POST['submit'])){

                             $slika = $_FILES['slika']['name'];
                             $slika_tmp = $_FILES['slika']['tmp_name'];

                             move_uploaded_file($slika_tmp, "../images/$slika" );

                             $query = "INSERT INTO client_slike (slike) VALUES('{$slika}')";
                             $res = mysqli_query($connection, $query);
                             header("Location:client_slike.php");
                             }
                             ?>
                              <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                              <label for="title">Slika</label>
                              <input class="form-control" name="slika" type="file" />
                              </div>
                              <div class="form-group">
                              <input class="btn btn-primary" name="submit" type="submit" value="Dodaj sliku" />
                             </div>
                             </form>
                         </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                             <thead>
                               <tr>
                               <th>Id</th>
                               <th>Slike</th>
                               <th>Obrisi</th>
                               </tr>
                             </thead>
                             <tbody>
                        <?php 
                         $query = "SELECT * FROM client_slike";
                             $of_slike = mysqli_query($connection, $query);
                             while($row = mysqli_fetch_array($of_slike)){
                                 $id = $row['id'];
                                 $slike = $row['slike'];
                             
                                 echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td><img width='100' src='../images/$slike'></td>";
                                    echo "<td><a href='client_slike.php?obrisi=$id' onclick='return myFunction()'>Obrisi</a><td>";
                                    
                                echo "</tr>";
                            }


                        ?>
                        </tbody>

                    </table>

                </div>
                       

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