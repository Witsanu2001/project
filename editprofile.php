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

      
    <form class="row g-3" action="editprofiledata.php" method="POST">
        <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">
    
    <div class="col-md-6">
    <label for="firstname" class="form-label">ชื่อ</label>
    <input type="text" name="firstname" class="form-control" value="<?php echo $row["firstname"]; ?>">
    </div>
    <!-- <div class="col-md-6">
    <label for="inputPassword4" class="form-label">นามสกุล</label>
    <input type="password" class="form-control" value="
    </div> -->
    <div class="col-md-6">
    <label for="nickname" class="form-label">นามสกุล</label>
    <input type="text" name="lastname" class="form-control" value="<?php echo $row["lastname"]; ?>">
    </div>
    <div class="col-md-6">
    <label for="nickname" class="form-label">ชื่อเล่น</label>
    <input type="text" name="nickname" class="form-control" value="<?php echo $row["nickname"]; ?>">
    </div>
    <div class="col-md-6">
    <label for="numberphone" class="form-label">เบอร์โทรศัพท์</label>
    <input type="number" name="numberphone" class="form-control" value="<?php echo $row["numberphone"]; ?>">
    </div>
    <div class="row pw-3">
    <div class="col-3">
    <label for="address" class="form-label">ที่อยู่ 1</label>
    <input type="text" name="address" class="form-control"  value="<?php echo $row["address"]; ?>" placeholder="บ้าน , ห้องเช่า หรือ อื่นๆ]">
    </div>

    <div class="col-md-3">
            <label for="district" class="form-label">ตำบล</label>
            <select name="district" class="form-select" aria-label="Default select example">
            <option selected><?php echo $row["district"]; ?></option>
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            <option value="ท่ายาง">ท่ายาง</option>
            <option value="กรุงหยันใต้">กรุงหยันใต้</option>
            <option value="กุแหระ">กุแหระ</option>
            <option value="ทุ่งสัง">ทุ่งสัง</option>
            <option value="บางรูป">บางรูป</option>
            </select>
    </div>
    <div class="col-md-2">
            <label for="city" class="form-label">อำเภอ</label>
            <select name="city" class="form-select" aria-label="Default select example">
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            </select>
    </div>
    </div>
    <div class="row pw-3">
    <div class="col-3">
    <label for="address2" class="form-label">ที่อยู่ 2</label>
    <input type="text" name="address2" class="form-control"  value="<?php echo $row["address2"]; ?>" placeholder="บ้าน , ห้องเช่า หรือ อื่นๆ]">
    </div>

    <div class="col-md-3">
            <label for="district1" class="form-label">ตำบล</label>
            <select name="district1" class="form-select" aria-label="Default select example">
            <option selected><?php echo $row["district1"]; ?></option>
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            <option value="ท่ายาง">ท่ายาง</option>
            <option value="กรุงหยันใต้">กรุงหยันใต้</option>
            <option value="กุแหระ">กุแหระ</option>
            <option value="ทุ่งสัง">ทุ่งสัง</option>
            <option value="บางรูป">บางรูป</option>
            </select>
    </div>
    <div class="col-md-2">
            <label for="city" class="form-label">อำเภอ</label>
            <select name="city" class="form-select" aria-label="Default select example">
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            </select>
    </div>
    </div>
      <!-- <div class="col-12">
      <label for="address2" class="form-label">Address 2</label>
      <input type="text" name="address2" class="form-control" id="inputAddress2" value="<?php echo $row["address2"]; ?>" placeholder="อพาทเมน, ที่ทำงาน หรือ ที่อื่น"> -->
     <!-- </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">อำเภอ</label>
    <input type="text" class="form-control" id="inputCity"> -->
    <!-- </div>
    <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
    <option selected>Choose...</option>
    <option>...</option>
    </select>
    </div> -->
    
    <!-- <div class="col-12">
    <label for="url" class="form-label">url</label>
    <input type="text" name="url" class="form-control" id="inputZip" value="<?php echo $row["url"]; ?>" placeholder="ลิ้งตำแหน่งสถานที่ Google map">
    </div> -->
    
  
    <div class="my-3">
    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <!-- <input type="reset" value="ล้างข้อมูล" class="btn btn-danger"> -->
    <a href="profile.php" class="btn btn-primary">ยกเลิก</a>
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