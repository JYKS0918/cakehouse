<?php
include 'Header.php'
 ?>
 <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
       <!-- First Photo Grid-->
       <!--First photo -->
     <div class="w3-row-padding w3-padding-16 w3-center">
           <?php
           if($_SERVER['REQUEST_METHOD'] == "GET") {
              $ps = $con->prepare("SELECT * from product WHERE product_code = ?");
              $ps->bind_param("i",$_GET['id']);
              if(!$ps->execute()) {
                die("Error executing query.");
              } else {
                $result = $ps->get_result();
                while($row = $result->fetch_assoc()) {
                  echo<<<HERE
                  <div class="w3-quarter">
                  <a href="#cake">
                  <img src="Pictures/{$row['product_img']}" alt="{$row['product_name']}" style="width:100%; opacity:0.8;">
                  </a>
                  <h3>The Perfect Icing Cakes</h3>
                  <p>{$row['product_name']}</p>
                  </div>
HERE;
                }
                die("");
              }
           }
           ?>
       <!-- Second photo -->
         <div class="w3-quarter">
         <a href="#bread">
           <img src="Pictures/bread.jpeg" alt="Bread" style="width:100%; height:200px; opacity:0.8; ">
         </a>
         <h3>Soft and fluffy bun freshly made</h3>
         <p>Made from great butter.</p>
         </div>
       <!--  Thrid photo -->
         <div class="w3-quarter">
         <a href="#pastry">
           <img src="Pictures/pastry.jpg" alt="Pastry" style="width:100%; opacity:0.8;">
         </a>
         <h3>Crunchy and Chewy Pastry</h3>
         <p>Using the greatest flour and material</p>
         </div>
       <!-- Fourth Photo -->
       <div class="w3-quarter">
         <a href="#bread">
           <img src="Pictures/HomeImage.jpg" alt="Home!" style="width:100%; opacity:0.8;">
         </a>
         <h3>AWESOME FOOD FOOD FOOD</h3>
         <p>HELLO THIS IS THE BEST FOOD EVER</p>
       </div>

     </div>
 </div>
 </body>
<?php
include 'Footer.php'
 ?>
