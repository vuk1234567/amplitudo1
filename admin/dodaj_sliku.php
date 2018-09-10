 
<?php

if(isset($_POST['submit'])){

 $slika = $_FILES['slika']['name'];
 $slika_tmp = $_FILES['slika']['tmp_name'];

move_uploaded_file($slika_tmp, "../images/$slika" );

$query = "INSERT INTO office_slike (slike) VALUES('{$slika}')";
$res = mysqli_query($connection, $query);
die('Query failed '. mysqli_error($connection));
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















