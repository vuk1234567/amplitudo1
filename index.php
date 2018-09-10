<?php  include "config/config.php";  ?>
<?php  include "includes/header.php";  ?>
<body>
   <!--navigation-->
   <?php include "includes/navigation.php";   ?>

    <article id="portfolio">
        <div class="wrapper">
            <div class="li">
          <h1>AMPLITUDO AFFILIATE OF GOLIN</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt sapien ac porttitor commodo. Integer euismod id massa a euismod. In bibendum semper finibus. Praesent non orci eu enim hendrerit interdum. Ut lobortis porttitor arcu, vitae scelerisque elit suscipit at. Integer aliquet pulvinar mauris.</p>
         


	<a class="dugme" href="#popup1">Zakazi sastanak</a>


      <?php  include "popup.php";   ?>

      <!--end popup-->


        </div>
    </article><!--end article portfolio-->


     <section id="cetiri">
      <div class="wrapper">

          <div  class="ourLeft">

            <article id="dd" class="ourWorks">
              <?php
              $query = "SELECT * FROM postovi";
                $svi_postovi = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($svi_postovi)){
                  $naslov = $row['naslov'];
                  $tekst = $row['tekst'];
                  $slike = $row['slike'];

              ?>
              <h2><?php echo $naslov; ?></h2>
              <p><?php  echo $tekst; ?></p>
            </article>
           <article class="ourWorks">
              <a href="#"><img src="images/<?php echo $slike; ?>" alt="neka-slika"></a>
           </article>
           <?php
         }
         ?>
            </div><!--end ourLeft-->

             
                
        </div>
    </section><!--end section cetiri--> 

    <section id="pet">
      <div class="wrapper">

        <h3>CLIENTS</h3>
        <?php
          $query = "SELECT * FROM client_slike";
          $res = mysqli_query($connection,$query);
          while($row = mysqli_fetch_array($res)){
               $client_slike = $row['slike'];

        ?>
           <a href="#" target="_blank" class="referenceClient"><img src="images/<?php echo $client_slike; ?>"></a>
              <?php } ?>
                
                <div id="slajder">
                    <a href="#"><i class="fas fa-circle"></i></a>
                    <a href="#"><i class="fas fa-circle"></i></a>
                    <a href="#"><i class="fas fa-circle"></i></a>
                  </div>

        </div>

    </section><!--end section pet--> 

   <section id="products">
        <div class="wrapper">
            
            <header>
                <h2>GO LINE</h2>
                <h4>WE ARE THE RELEVANCE AGENCY</h4>
                <h6>We're relevance obseessed. More importanly, we're relevance equipped.</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, esse, fugit, autem, ratione quam doloremque impedit sunt unde repellat ipsum architecto quod itaque ab omnis laudantium modi fugiat accusamus? Explicabo, tempore, est, rerum recusandae at architecto</p> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, esse, fugit, autem, ratione quam doloremque impedit sunt unde repellat</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, esse, fugit, autem, ratione quam doloremque impedit sunt unde repellat</p>
            </header>
             <?php
          $query = "SELECT * FROM go_line";
          $res = mysqli_query($connection,$query);
          if(!$res){
              die("Query failed ". mysqli_error($connection));
          }
          while($row = mysqli_fetch_array($res)){
               $naslov = $row['naslov'];
               $tekst = $row['tekst'];
               $go_slike = $row['slike'];

        ?>
            <article class="product">
                <span>
                    <img src="images/<?php echo $go_slike;  ?>">
                </span>
                <h5><?php echo $naslov;  ?></h5>
                <p><?php echo $tekst;  ?></p>
            </article>
        <?php  }  ?>
            
        </div>    
    </section>

     
            
            
 <section id="central">
      <div class="wrapper">
        
          <main id="slajder">

              <h1>OFFICES</h1>
              <h2><a href="#">EMEA</a>
                  <a href="#">AMERICAS</a>
                  <a href="#">AZIA</a></h2>
           
               <?php
               $query = "SELECT * FROM office_slike";
               $res = mysqli_query($connection, $query);
               while($row = mysqli_fetch_assoc($res)){
                     $slika = $row['slike'];
                     ?>
                <a href="#" target="_blank" class="referenceLink"><img src="images/<?php echo $slika; ?>"></a>
               
           <?php } ?>
            </main>
        
            
        </div>
         <section id="contact">
      <div class="wrapper">
        
          <div class="mapa">
          <iframe  style="width:400px; height: 200px; id="map" <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.268089633888!2d19.245673315234324!3d42.44331167918144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134deb3023e0d9e5%3A0x6ea20dbd662584a5!2s56+Bulevar+Svetog+Petra+Cetinjskog%2C+Podgorica%2C+Montenegro!5e0!3m2!1sen!2s!4v1535866432316" width="600" height="450" frameborder="0" style="border:0" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div style="margin-left: 600px; " class="con">
          <h2 style="color:#181819;">CONTACT</h2>
          <p>Bulevar Petra Cetinjskog 56</p>
          <p>81000 Podgorica, Montenegro</p>
          <p>+382 223 240</p>
          <p>info@amplitudo.me</p>
        </div>
      </div>
    </section>
   
    </section>

    <div id="wrapper">
            <div id="footer">
                    
                  <div id="global">
                     <ul>
                        <li class="bord"><a href="#">Global</a></li>
                        <li><a href="#">Asia</a></li>
                        <li><a href="#">Emea</a></li>
                        <li><a href="#">Americas</a></li>
                      </ul>
                 </div><!--end of nav-->
            </div><!--end of header-->
            <section id="foot1">
             <div id="wrapper">
             <div id="footer1">
                 <p>Golin Podgorica All right reserved</p>
            </div>
          </div>
          </section>



   
     
</body>
</html>