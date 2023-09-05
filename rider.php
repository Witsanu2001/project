<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['rider_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พนักงานจัดส่ง</title>

    <link rel="stylesheet" href="custermer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <?php 

            if (isset($_SESSION['rider_login'])) {
                $rider_id = $_SESSION['rider_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $rider_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        

        <section class="vh-100" style="background: linear-gradient(125deg, #7cfc00, #32cd32);">
    <div class="container py-2">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0" >               
            <h2><h3 class="mt-4" >สวัสดีพนักงานจัดส่ง <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3></h2>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img src="https://cdn.pic.in.th/file/picinth/12b50941b7276587c.jpeg" alt="12b50941b7276587c.jpeg"  border="0"
              class="rounded-circle img-fluid" style="width: 150px;">
              
              
            <h5 class="my-3"><p class="nav-profile-name"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></p></h5>
            <a href="editrider.php?id=<?php echo $row["id"]?>"class="btn"><img src="img/edit.png" width="40"> </a>
            

          <!-- สำหรับติดต่อพนักงาน -->
            <!-- <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div> -->



          </div>
          <a href="logout.php" class="btn btn-danger"><i class="fa-solid fa-door-open fa-fade">  Logout</i></a>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ชื่อ</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ชื่อเล่น</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["nickname"];?></p>
              </div>
            </div>

    
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">เบอร์โทรศัพท์</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["numberphone"];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ที่อยู่</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["address"];?></p>
              </div>
            </div>
          </div>
        </div>
        
        <h1 class="text-center mt-3">รายการส่งออเดอร์</h1>

          
        <table class="table table-bordered my-3">
        <thead class="table-danger ">
        
          <tr class="table-info">
          <?php
          require('./config/dbconnectedit.php');
          $sql="SELECT * FROM sp_transaction"; 
          $resul=mysqli_query($con,$sql);
          $count=mysqli_num_rows($resul);
          $order=1;
          ?>

                
                <th><center>รายการ</center></th>

                <th><center>จำนวน</center></th>

                <th><center>สถานะ</center></th>

                <th><center>เวลาที่สั่ง</center></th>

                
            </tr>
            
        </thead>
        <tbody>
      </div>
    </div>
  </div>
  </section>


        
    </div>
</body>
</html>