<?php
require('./config/dbconnectedit.php');

$sql="SELECT * FROM food"; 
 
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

    <title>รายการอาหาร</title>
  </head>
  <body>
  <br>
   

    <div class="container">

    
    <div align = "right"><a class="btn btn-danger" href="admin.php">กลับหน้าหลัก</a></div>
      
        <!-- <center><img src="img/lampu.png" width="150" height="150"></center> -->

        <h1 class="text-center mt-3">ข้อมูลรายการอาหาร</h1>
        <a href="insert.php" class="btn btn-primary"><img src="img/plus.png" width="20">&nbsp;เพิ่มรายการอาหาร</a>
          
        <table class="table table-bordered my-3">
        <thead class="table-danger ">
        
          <tr class="table-info">
                
                
                <th>ลำดับ</th>

                <th><center>ชื่อ</center></th>
                
                <th><center>รูปภาพ</center></th>

                <th>ราคา</th>

                <th><center>รายละเอียด</center></th>

                <th>แก้ไข</th>
                <th>ลบ</th>
                
            </tr>
            
        </thead>
        <tbody>
        

        
            <?php while($row=mysqli_fetch_assoc($resul)){
             ?>
            <tr>
                <td><?php echo $order++;?></td>
                <td><?php echo $row["m_name"];?></td>

                <td><img src="imgs/<?php echo $row["file_name"]; ?>" width="100px" height="100px" alt=""></td> 
              
                <td><?php echo $row["m_price"];?></td>

                <td><?php echo $row["m_description"];?></td>

                

                
                <td><a href="editformdata.php?id=<?php echo $row["id"]?>"class="btn"><center><img src="img/edit.png" width="40"></center></a></td>
                <td><a href="deletedata.php?id=<?php echo $row["id"]?>"class="btn" onclick="return confirm('ยืนยันการลบข้อมูล')"><center><img src="img/delete.png" width="30"></center></a></td>
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
