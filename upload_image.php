<!DOCTYPE html>
<?php include 'Header.php' ?>
<html>
<body>
  <div class="w3-panel w3-card-4 w3-pale-green">
    <form action="testing.php" method="post" enctype="multipart/form-data">
      <div style="padding:50px;">
      <table>
        <tr>
          <td>
            Name:
          </td>
          <td>
            <input type="text" name="product_name" />
          </td>
        </tr>
        <tr>
          <td>
            Product Quantity:
          </td>
          <td>
            <input type="number" name="product_quantity" min=1 />
          </td>
        </tr>
        <tr>
          <td>
            Product Price:
          </td>
          <td>
            <input type="number" name="product_price" />
          </td>
        </tr>
        <tr>
          <td>
            Product Category:
          </td>
          <td>
            <select name="product_code">
              <option value="1">Bread</option>
              <option value="2">Cake</option>
              <option value="3">Pastry</option>
            </select>
          </td>
        </tr>
          <td>
            Select Image File to Upload:
          </td>
          <td>
            <input type="file" name="file">
          </td>
        </tr>
        <tr>
          <td>
              <input type="submit" name="btnUpload" value="Upload">
          </td>
        </tr>
      </table>
      </div>
    </form>
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
