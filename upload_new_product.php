<!DOCTYPE html>
<?php include 'Header.php' ?>
<html>
<body>
  <div class="w3-panel w3-card-4 w3-pale-green">
    <div class="container">
    <form action="upload_new_product.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="form-group">
          Name:
          <input type="text" class="form-control" name="product_name" />
        </div>
        <div class="form-group">
          Product Price:
          <input type="text" class="form-control" name="product_price" />
        </div>
        <div class="form-group">
          Description: <br />
          <textarea class="form-control" name="product_description"></textarea>
        </div>
        <div class="form-group">
          Product Category:
          <select name="product_code">
            <option value="1">Bread</option>
            <option value="2">Cake</option>
            <option value="3">Pastry</option>
          </select>
        </div>
        <div class="form-group">
          Select Image File to Upload:
          <input type="file" name="file">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-default" name="btnUpload" value="Upload">
        </div>
      </div>
    </form>
  </div>
</div>
<?php
// Include the database configuration file
if(isset($_POST["btnUpload"])){
  $statusMsg = '';
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_code = $_POST['product_code'];
  $product_description = $_POST['product_description'];
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
              $insert = $con->query("INSERT into product (product_name, product_price, product_img, product_code, product_description ) VALUES
              ('".$product_name."','".$product_price."','".$fileName."','".$product_code."','".$product_description."')");
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
