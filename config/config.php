<?php 
$connection = mysqli_connect("localhost","root","","sastanci");
      if(!$connection){
         die("QUERY FAILED ".mysqli_error($connection));
}