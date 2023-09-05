<?php
require('./config/dbconnectedit.php');

$id = $_GET["id"];

$sql = "SELECT * FROM food WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  
  <title>แก้ไขข้อมูลรายการอาหาร</title>
</head>

<body>
  
  <div class="container my-3">
    <h2 class="text-left">แก้ไขข้อมูลรายการอาหาร</h2>
    <hr>
    <form action="editupdatedata.php" method="POST">
      <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
      
          <div class="form-group">
            <label for="m_name">ชื่อ :</label>
            <input type="text" name="m_name" class="form-control" value="<?php echo $row["m_name"]; ?>">
          </div>

            <div class="form-group">
            <label for="m_price">ราคา :</label>
            <input type="text" name="m_price" class="form-control" value="<?php echo $row["m_price"]; ?>">
            </div>
          
            <div class="form-group">
            <label for="m_description">รายละเอียด :</label>
            <textarea name="m_description" class="form-control"><?php echo $row["m_description"]; ?></textarea>
            </div>

          
          

          
          <div class="my-3">
            <input type="submit" value="บันทึกข้อมูล"  class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="Edit.php" class="btn btn-primary">ยกเลิก</a>
          </div>
    </form>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    
</body>

</html>