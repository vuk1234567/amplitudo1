
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
