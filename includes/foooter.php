<?php



$connection = mysqli_connect("localhost","root","","sastanci");
      if(!$connection){
         die("QUERY FAILED ".mysqli_error($connection));
}
      
 //$greska = "";
if(isset($_POST['submit'])){
  $ime_prezime = $_POST['ime_prezime'];
  $firma = $_POST['firma'];
  $email = $_POST['email'];
  $brojtel = $_POST['brojtel'];
  $datum = $_POST['date'];
  $vrijeme = $_POST['time'];
   
   /*if(empty($ime_prezime) || empty($firma) || empty($email) || empty($brojtel) || empty($datum) || empty($vrijeme)){
	   $greska = "Molimo unesite sva polja"; 
	   echo ""Molimo unesite sva polja"";    i ovako mi pravi gresku, bez promenljive $greska
   }
   */
   
 
  $query = "INSERT INTO zakazivanje (ime_prezime,firma,email,brojtelefona,datum,vrijeme) VALUES ('{$ime_prezime}','{$firma}','{$email}','{$brojtel}','{$datum}','{$vrijeme}')";
  $result = mysqli_query($connection,$query);
  if(!$result){
      die("Query failed ".mysqli_error($connection));
  }
  header ('Location: index.php');

}



?>


 






<div  id="popup1" class="overlay">
	<div style="background-color:#2e2f30;" class="popup">
        
		<h2 style="text-align:center; color:#ffa202;">COLINPG</h2>
		<p style="text-align:center; color:white;">Zakazite sastanak sa 
		nekim od nasih poslodavaca</p>
		<a class="close"  style="color:#ffa202" href="#">&times;</a>
		<div class="content">
		<!--<h4><?php  echo $greska; ?><h4>-->
			<form method="post" action="index.php">
<ul class="form-style-1">
   
	<li>
        <input style="text-align:center; border-radius: 5px;" type="text" name="ime_prezime" class="field-long" placeholder="Ime i Prezime" required />
    </li>
	<li>
        <input style="text-align:center; border-radius: 5px;" type="text" name="firma" class="field-long" placeholder="Firma" required />
    </li>
	<li>
        <input style="text-align:center; border-radius: 5px;" type="text" name="email" class="field-long" placeholder="email" required />
    </li>
    <li>
        <input style="text-align:center; border-radius: 5px;" type="text" name="brojtel" class="field-long" placeholder="Broj telefona" required  />
    </li>
	 <li><input style="border-radius: 5px;" type="date" name="date" class="field-divided" placeholder="First" required  />&nbsp;<input type="time" style="border-radius: 5px;" name="time" class="field-divided"  required  /></li>
   
    
    <li>
        <div style="text-align:center">
             <button type="submit" name="submit" class="btn-lg dugme">zakazi sastanak</button>
        </div>
    </li>
</ul>
</form>
		</div>
	</div>
</div>