<?php
require('./config/dbconnectedit.php');

$id = $_GET["id"];

$sql = "SELECT * FROM users WHERE id=$id";
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
  
  <title>แก้ไขข้อมูล</title>
</head>

<body>
  
  <div class="container my-3">
    <h2 class="text-left">แก้ไขข้อมูล</h2>
    <hr>
    <form action="editpeopledata.php" method="POST">
      <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
      
          <div class="form-group">
            <label for="firstname">ชื่อ:
            <?php echo $row["firstname"].' '.$row["lastname"];?>
            </label>
          </div>
          <br>
          
          <div  class="col-md-4">
            <label for="numberphone" class="form-label">เบอร์โทรศัพท์ :</label>
            <input type="text" name="numberphone" class="form-control" value="<?php echo $row["numberphone"]; ?>">
          </div>
          <br>


          
          
          <div class="col-md-4">
          <select name="urole" class="form-select" aria-label="Default select example">
          <option selected><?php echo $row["urole"]; ?></option>
          <option value="admin">admin</option>
          <option value="rider">rider</option>
          <option value="user">user</option>
          </select>
          </div>
          <br>

         
          
          <div class="my-3">
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <!-- <input type="reset" value="ล้างข้อมูล" class="btn btn-danger"> -->
            <a href="people.php" class="btn btn-primary">ยกเลิก</a>
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