<?php



$connection = mysqli_connect("localhost","root","","sastanci");
      if(!$connection){
         die("QUERY FAILED ".mysqli_error($connection));
}
      
$msg="";
use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";

if(isset($_POST['submit'])){
  $ime_prezime = $_POST['ime_prezime'];
  $firma = $_POST['firma'];
  $email = $_POST['email'];
  $brojtel = $_POST['brojtel'];
  $datum = $_POST['date'];
  $vrijeme = $_POST['time'];
  $message = "Ime:";
  $message = " ".$ime_prezime."Firma: ".$firma."Br tel: ".$brojtel;

   $mail = new PHPMailer();
   $mail->addAddress('kovacevicvuk77@gmail.com');
   $mail->setFrom($email);
   $mail->Subject = $subject;
   $mail->isHTML(true);
   $mail->Body = $message;
   
   
   
 
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