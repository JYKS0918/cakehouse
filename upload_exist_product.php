<!DOCTYPE html>
<?php include 'Header.php' ?>
<html>
<body>
  <div class="w3-panel w3-card-4 w3-pale-green">
    <div class="container">
    <form action="upload_exist_product.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <div class="form-group">
          Date Produced: <br />
          <input type="date" name="item_date_made" />
        </div>
        <div class="form-group">
          Expired Date: <br />
          <input type="date" name="item_date_expired" />
        </div>
        <div class="form-group">
          Select Product to be added: <br />
          <select name="product_id">
          <?php
            $query = "SELECT product_id, product_name
            FROM product";
            $query_run = mysqli_query($con, $query);
            while($row =  $query_run->fetch_assoc()){
              echo<<<HERE
              <option value="{$row['product_id']}">{$row['product_name']}</option>
HERE;
            }
          ?>
          </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-default" name="btnUploadProduct" value="Upload Product"></input>
        </div>
      </div>
    </form>
    <?php
    if(isset($_POST["btnUploadProduct"])){
      $item_date_made = $_POST['item_date_made'];
      $item_date_expired = $_POST['item_date_expired'];
      $product_id = $_POST['product_id'];
      $status_code = 1;
      $query = "INSERT into item_detail(item_date_made, item_date_expired, status_code, product_id) VALUES
                ('$item_date_made', '$item_date_expired', '$status_code', '$product_id')";
      $query_run = mysqli_query($con, $query);
      echo '<script type="text/javascript">alert("Insert Successful") </script>';
    }
    ?>
  </div>
</div>
<?php
// Include the database configuration file
if(isset($_POST["btnUpload"])){
  $statusMsg = '';
  $product_name = $_POST['product_name'];
  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];
  $product_code = $_POST['product_code'];
  // File upload path
  $targetDir = "Pictures/";
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  if(isset($_POST["btnUpload"]) && !empty($_FILES["file"]["name"])){
      // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database
              $insert = $con->query("INSERT into product (product_name, product_quantity, product_price, product_img, product_code ) VALUES
              ('".$product_name."','".$product_quantity."','".$product_price."','".$fileName."','".$product_code."')");
              if($insert){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  echo $statusMsg;
              }else{
                  $statusMsg = "File upload failed, please try again.";
                  echo $statusMsg;
              }
          }else{
              $statusMsg = "Sorry, there was an error uploading your file.";
              echo $statusMsg;
          }
      }else{
          $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
          echo $statusMsg;
      }
  }else{
      $statusMsg = 'Please select a file to upload.';
      echo $statusMsg;
  }
}
include 'Footer.php';
