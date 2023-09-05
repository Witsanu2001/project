<?php
require('./config/dbconnectemp.php');
$sql="SELECT * FROM employee"; 
$resul=mysqli_query($con,$sql);

$count=mysqli_num_rows($resul);
$order=1;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ข้อมูลพนักงาน</title>
  </head>
  <body>
    <div class="container">
        <br>
    <div align = "left"><input type="button" onclick="history.back()" class="btn btn-danger"value="ย้อนกลับ"></div>
        
        <center><img src="img/lampu.png" width="150" height="150" input type="button" onclick="history.back()" ></center>
        <h1 class="text-center mt-3">ข้อมูลพนักงานจัดส่ง</h1>
        <!-- <from action="searchdata.php" class="form-group my-3"method="POST"> -->
            <!-- <div class="row">
                <div class="col-6">
                    <input type="text"
                     placeholder="ค้นหา" 
                     name="namesearch" 
                     class="form-control">
                </div>
                <div class="col-6">
                    <input type="submit"value="ค้นหาข้อมูลพนักงาน"  
                    class="btn btn-info">
                </div>
            </div> -->
        </from>
        <table class="table table-bordered my-3">
        <thead class="table-danger ">
            <tr class="table-info">
                <th>ลำดับ</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ชื่อเล่น</th>
                <th>ที่อยู่</th>
                <th>ข้อมูลรถ</th>
                <th>เบอร์โทรศัพท์</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($resul)){
             ?>
            <tr>
                <td><?php echo $order++;?></td>
                <td><?php echo $row["emp_title"];?></td>
                <td><?php echo $row["emp_name"];?></td>
                <td><?php echo $row["emp_surname"];?></td>
                <td><?php echo $row["emp_adr"];?></td>
                <td><?php echo $row["emp_car"];?></td>
                <td><?php echo $row["emp_tel"];?></td>
                <td><a href="editformdata.php?emp_id=<?php echo $row["emp_id"]?>"class="btn"><center><img src="img/edit.png" width="40"></center></a></td>
                <td><a href="deletedata.php?emp_id=<?php echo $row["emp_id"]?>"class="btn" onclick="return confirm('ยืนยันการลบข้อมูล')"><center><img src="img/delete.png" width="30"></center></a></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        <a href="insertform.php" class="btn btn-primary"><img src="img/plus.png" width="20">&nbsp;กรอกข้อมูลพนักงาน</a>


    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
