<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>


    <link rel="stylesheet" href="imgs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="slider">
    <center><?php if(isset($_SESSION['error'])) { ?>
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
            <?php } ?></center>       
        <figure>
            <div class="slide">
                <img src="./imgs/welcome.png" alt="">
            </div>
            <div class="slide">
                <img src="./imgs/free delivery.png" alt="">
            </div>
            <div class="slide">
                <img src="./imgs/pig2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="./imgs/delivery.jpg" alt="">
            </div>
        </figure>
    </div>
    <div class="container">
        <center><h3 class="mt-4">เข้าสู่ระบบ</h3></center>
        <form action="signin_db.php" method="post">
            <center>
            <div class="col-md-4">               
                <label  for="username" class="form-label"></label>
                <input  type="text" class="form-control" name="username" aria-describedby="username" placeholder="Username" required>
                
            </div>
            <div class="col-md-4">
                <label for="password" class="form-label"></label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            
            <br>
            <button type="submit" name="signin" class="btn btn-success">เข้าสู่ระบบ</button>
            <a href="register.php" class="btn btn-primary">สมัครสมาชิก</a>
        </form>
        </center>
       
        
    </div>
    
</body>
</html>