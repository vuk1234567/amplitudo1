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
if(isset($_GET['p_id'])){
   $p_id = $_GET['p_id'];
}   
    $query = "SELECT * FROM postovi WHERE id={$p_id}";
    $select_posts = mysqli_query($connection, $query);
   while($row = mysqli_fetch_array($select_posts)){
    $post_id = $row['id'];
    $post_naslovi = $row['naslov'];
    $post_tekst = $row['tekst'];
    $post_slike = $row['slike'];
}
if(isset($_POST['update'])){
    
    $post_naslovi = mysqli_real_escape_string($connection,$_POST['naslovi']);
    $post_tekst = mysqli_real_escape_string($connection,$_POST['tekst']);
    $post_slike = $_FILES['slike']['name'];
    $post_tmp_name = $_FILES['slike']['tmp_name'];

    move_uploaded_file($post_tmp_name, "../images/$post_slike" );
    if(empty($post_slike)){
        $query = "SELECT * FROM postovi WHERE id = $p_id";
        $sel_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($sel_query)){
             $post_slike = $row['slike'];
        }
}
  $query = "UPDATE postovi SET ";
    $query .= "naslov = '{$post_naslovi}', ";
    $query .= "tekst = '{$post_tekst}', ";
    $query .= "slike = '{$post_slike}' ";
    $query .= "WHERE  id = {$p_id}";

    $update_query = mysqli_query($connection, $query);
    if(!$update_query){
      die("Query failed ".mysqli_error($connection));
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

 
 
 <div class="form-group">
 <label for="author">Naslovi</label>
 <input class="form-control" name="naslovi" type="text" value="<?php echo $post_naslovi;  ?>" />
 </div>
 <div class="form-group">
 <label for="content">Tekst</label>
 <textarea class="form-control" name="tekst" type="text"><?php echo $post_tekst;  ?></textarea>
  </div>
 
  <div class="form-group">
   <img width="100" src="../images/<?php echo $post_slike; ?>" />
   <label for="image">Slike</label>
 <input class="form-control" name="slike" type="file" />
 </div>
  
  <input class="btn btn-primary" name="update" type="submit" value="Update" />
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