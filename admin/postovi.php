<?php

require "includes/config.php";
include "includes/header.php";
include "function.php";

session_start();
if(!isset($_SESSION['korisnik_login']) || empty($_SESSION['korisnik_login'])) {
    header("Location: login.php");
    exit;
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
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                       
                          <table class="table table-bordered table-hover">
                             <thead>
                               <tr>
                               <th>Id</th>
                               <th>Naslov</th>
                               <th>Tekst</th>
                               <th>Slika</th>
                               </tr>
                             </thead>
                             <tbody>
                        <?php 
                         $query = "SELECT * FROM postovi";
                             $svi_postovi = mysqli_query($connection, $query);
                             while($row = mysqli_fetch_array($svi_postovi)){
                                 $id = $row['id'];
                                 $naslov = $row['naslov'];
                                 $tekst = $row['tekst'];
                                 $slike = $row['slike'];
                             
                                 echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$naslov</td>";
                                    echo "<td>$tekst</td>";
                                    echo "<td><img width='100' src='../images/$slike'></td>";
                                    echo "<td><a href='promjeni_postove.php?p_id=$id'>Promjeni</a></td>";
                                    
                                    
                                echo "</tr>";
                            }


                        ?>
                        </tbody>

                    </table>
					
					 <table class="table table-bordered table-hover">
                             <thead>
                               <tr>
                               <th>Id</th>
                               <th>Naslov</th>
                               <th>Tekst</th>
                               <th>Slika</th>
                               </tr>
                             </thead>
                             <tbody>
                        <?php 
                         $query = "SELECT * FROM postovi1";
                             $svi_postovi = mysqli_query($connection, $query);
                             while($row = mysqli_fetch_array($svi_postovi)){
                                 $id = $row['id'];
                                 $naslov = $row['naslov'];
                                 $tekst = $row['tekst'];
                                 $slike = $row['slika'];
                             
                                 echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td>$naslov</td>";
                                    echo "<td>$tekst</td>";
                                    echo "<td><img width='100' src='../images/$slike'></td>";
                                    echo "<td><a href='promjeni_postove1.php?p_id=$id'>Promjeni</a></td>";
                                    
                                    
                                echo "</tr>";
                            }


                        ?>
                        </tbody>

                    </table>

                    
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