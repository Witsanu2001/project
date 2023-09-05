<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container my-3">
        <Center><h3 class="mt-4">สมัครสมาชิก</h3></Center>
        <hr>
        <form class="row g-3" action="signup_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>

            <div class="col-md-6">
                <label for="firstname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control"  name="firstname" placeholder="Enter your name" aria-describedby="firstname" required>
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname" placeholder="Enter your lastname" aria-describedby="lastname" required>
            </div>
            <div class="col-md-6">
                <label for="nickname" class="form-label">ชื่อเล่น</label>
                <input type="text" class="form-control" name="nickname" placeholder="Enter your nickname" aria-describedby="nickname" required>
            </div>
            <div class="col-md-6">
                <label for="numberphone" class="form-label">เบอร์โทร</label>
                <input type="number" class="form-control" name="numberphone" placeholder="Enter your numberphone" aria-describedby="numberphone" required>
            </div>
            <!-- <div class="col-12">
                <label for="address" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" placeholder="Enter your address" name="address" aria-describedby="address" required>
            </div> -->
            <br>
            <div class="row pw-3">
            <div class="col-3">
            <label for="address" class="form-label">บ้านเลขที่กับชื่อหมู่บ้าน</label>
            <input type="text" class="form-control" name="address" placeholder="บ้าน , ห้องเช่า หรือ อื่นๆ]" aria-describedby="numberphone" required>
            </div>
            <div class="col-md-3">
            <label for="district" class="form-label">ตำบล</label>
            <select name="district" class="form-select" aria-label="Default select example">
            <option selected>กรุณาเลือกตำบลของท่าน</option>
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            <option value="ท่ายาง">ท่ายาง</option>
            <option value="ทุ่งสัง">กรุงหยันใต้</option>
            <option value="ทุ่งสัง">กุแหระ</option>
            <option value="ทุ่งสัง">ทุ่งสัง</option>
            <option value="ทุ่งสัง">บางรูป</option>
            </select>
            </div>

            <div class="col-md-2">
            <label for="city" class="form-label">อำเภอ</label>
            <select name="city" class="form-select" aria-label="Default select example">
            <option value="ทุ่งใหญ่">ทุ่งใหญ่</option>
            </select>
            </div>






            <div class="col-md-2">


            </div>
    
            </div>








            <div class="col-12">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" aria-describedby="username" required>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password"  class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <div class="col-12">
                <label for="confirm password" class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" placeholder="confirm password" name="c_password" required>
            </div>
            <div class="my-3">
            <button type="submit" name="signup" class="btn btn-primary">สมัครสมาชิก</button>
            </div>
        </form>
        
        <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="index.php">เข้าสู่ระบบ</a></p>
    </div>
    
</body>
</html>