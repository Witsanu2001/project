<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: index.php');
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

    <title>รายการสั่งออเดอร์</title>


    <style type="text/css">
        body {
            font-family: 'Sarabun', sans-serif;
        }

        @media print {
            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
  </head>
  <body>

  

<div class="row">
            <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
            </div>
  <?php } ?>
</div>

  
  <?php 

  if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>

  
  

  <form action="orderdata.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">

  <h1 class="text-center mt-3">รายการสั่งออเดอร์</h1>



  <h4><center>

  <div class="form-group">
                <input type="hidden" for="order_id">รหัสรายการ  <?php echo $_GET["transid"];?></label>
                <input type="hidden" for="order_id"></label>
                
  </div> </center></h4>
  <center>
  <h5><p >วันที่สั่ง  <?php echo $_GET["updated"];?></h5>
  </center>
  <div class="container">
    
    <div class="row pw-3">
    <h5><p class="text-right">ชื่อ  <?php echo $_GET["userid"];?>

    

               

    </center>
  <div class="row pw-3">
  <div class="col-md-2">
  <label  class="form-label">บ้านเลขที่</label>
  <select id="address" class="form-select">
  <option selected><?php echo $row["address"];?></option>
  <option><?php echo $row["address2"];?></option>

  </select>
  </div>


  <div class="col-md-2">
  <label for="delivery_dis" class="form-label">ตำบล</label>
  <select id="delivery_dis" class="form-select">
  <option selected><?php echo $row["district"];?></option>
  <option>ทุ่งใหญ่</option>
  <option>ท่ายาง</option>
  <option>ทุ่งสัง</option>
  <option>กุเเหระ</option>
  <option>ปริก</option>
  </select>
  </div>

    <div class="col-md-2">
    <label for="delivery_city" class="form-label">อำเภอ</label>
    <select id="delivery_city" class="form-select">
    <option selected><?php echo $row["city"];?></option>
    </select>
    </div>
    
    </div>
    <br>
</div>
  </div>

  <?php
          require('./config/dbconnectedit.php');
          $sql="SELECT * FROM sp_transaction"; 
          $resul=mysqli_query($con,$sql);
          $count=mysqli_num_rows($resul);
          $order=1;
          ?>

  <table class="table table-borderless">
        <thead class="table">

        <th><center>จำนวน</center></th>              
                
        <th><center>รายการ</center></th>

        <th><center>ราคา/ชุด</center></th>

        <th><center>ราคารวม</center></th>
           
            
        </thead>
        <tbody>
              <?php 
              $orderlist = json_decode($_GET["product"], true);
              foreach( $orderlist as $k => $v){
              ?>
              <tr>

              <td><center>
              <?php   
               
                 echo $v['count'].'<br>'.'<br>';
               
               ?>
               </center></td>

 
              <td><center>
              <?php   
               
                 echo $v['m_name'].'<br>'.'<br>';
               
               ?>
               </center></td>

               <td><center>
              <?php   
               
                 echo $v['m_price'].'<br>'.'<br>';
               
               ?>
               </center></td>

               <td><center>
              <?php   
               
                 echo $v['m_price']*$v['count'];
               
               ?>
               </center></td>
              
              
            
            </tr>
            <?php } ?>
        </tbody>
        </table>

        <div class="container">
        <p class="text-right">รวมการสั่งซื้อ    <?php echo $_GET["amont"];?>    บาท</p>   
        <p class="text-right">ค่าจัดส่ง    <?php echo $_GET["shipping"];?>     บาท</p>
        <p class="text-right">ยอดชำระเงินทั้งหมด    <?php echo $_GET["netamount"];?>    บาท</p>  
        </div>

        <td>
          <div align = "center">
          

          <!-- <a href="deletorder.php?id=<?php echo $row["id"]?>"class="btn btn-danger" onclick="return confirm('ยืนยันการยกเลิก')" >ยกเลิก</a></td> -->
          
          </div>
        </form>
        <div class="mt-4 text-center no-print">
        <button type="button" class="btn btn-warning" onclick="return print();">พิมพ์</button>
    </div>
  </body>
</html>