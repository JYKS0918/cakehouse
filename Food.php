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
                  <div class="col-sm-4">
                    <div class="panel-primary">
                    <div class="panel-body">
                      <img src="Pictures/{$row['product_img']}" alt="{$row['product_name']}" style="width:100%; opacity:0.8;">
                    </div>
                    <p style="font-size:18px;">{$row['product_name']}</p>
                    <p style="font-size:18px;">RM {$row['product_price']}</p>
                    </div>
                  </div>


HERE;
                }
                die("");
              }
           }
           ?>
     </div>
 </div>
 </body>
<?php
include 'Footer.php'
 ?>
