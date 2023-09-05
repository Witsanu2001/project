<?php
require('./config/dbconnectedit.php');

$sql="SELECT * FROM users"; 
 
$resul=mysqli_query($con,$sql);

$count=mysqli_num_rows($resul);
$order=1;

?>

<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: people.php');
    }

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>จัดรายการบุคคล</title>
  </head>
  <body>
  <br>
   

    <div class="container">

    
    <div align = "right"><a class="btn btn-danger" href="admin.php">กลับหน้าหลัก</a></div>
      
        <!-- <center><img src="img/lampu.png" width="150" height="150"></center> -->

        <h1 class="text-center mt-3">จัดรายการบุคคล</h1>
        
        <?php 

            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <br>
        <h4><center>ADMIN</center></h4>
        <h4><center>( <?php echo $row['firstname'] . ' ' . $row['lastname'] ?> )</center></h4>
        <br>
        <table class="table table-bordered my-3">
        <thead class="table-danger ">
        
          <tr class="table-info">
                
                
                <th>ลำดับ</th>

                <th><center>ชื่อ-นามสกุล</center></th>
                
                <th><center>เบอร์โทรศัพท์</center></th>

                <!-- <th><center>อีเมล</center></th> -->

                <th><center>การใช้งาน</center></th>

                <th><center>วันที่สมัคร</center></th>

                <th><center>แก้ไข</center></th>
                <th><center>ลบ</center></th>
                
            </tr>
            
        </thead>
        <tbody>
        

        
            <?php while($row=mysqli_fetch_assoc($resul)){
             ?>
            <tr>
                
                <td><center><?php echo $order++;?></center></td>
                <td><?php echo $row["firstname"].' '.$row["lastname"];?></td>

                <td><center><?php echo $row["numberphone"];?></center></td>
              
                <!-- <td><?php echo $row["email"];?></td> -->

                <td><center><?php echo $row["urole"];?></center></td>

                <td><center><?php echo $row["created_at"];?></center></td>

                
                <td><center><a href="editpeole.php?id=<?php echo $row["id"]?>"class="btn"><img src="img/edit.png" width="40"></center></a></td>
                <td><center><a href="peopledata.php?id=<?php echo $row["id"]?>"class="btn" onclick="return confirm('ยืนยันการลบข้อมูล')"><img src="img/delete.png" width="30"></center></a></td>              
            </tr>
            <?php } ?>
        </tbody>
        </table>
        <br>
        
        
        
        
        

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
