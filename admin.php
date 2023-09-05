<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
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
    <title>Lampoo admin</title>

    <link rel="stylesheet" href="customer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <meta http-equiv="refresh" content="30">  
    
</head>
<body>
        
        <?php 

            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>

    

    <nav>
        <div class="nav-container">
            <a href="customer.php">
                <img src="./imgs/lampu.png" class="logonav">
            </a>

            <center>
                <img src="./imgs/admin.png" class="logonav">
            </center>

            <div class="nav-profile">
            <p class="nav-profile-name"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></p>  
                
                <div class="nav-profile-cart">
                    <a href="#"><i class="fas fa-user"></i></a>  
                </div>
                
                <!-- <div class="nav-profile-cart">
                    <a href="item.php">
                    <i class="fas fa-bell-concierge"></i>
                    <div id="cartcount" class="cartcount">
                        0
                    </div>
                </a>
                </div> -->
                
            </div>
        </div>
    </nav>
    

    
    
    <div class="container">
  
        <div class="sidebar">
            
            
            <a href="item.php" class="sidebar-items">ออเดอร์</a>

            <a href="edit.php" class="sidebar-items">จัดการรายการอาหาร</a>

            <a href="people.php" class="sidebar-items">การใช้งาน</a>
            
            <!-- <a href="insertEP.php" class="sidebar-items">พนักงานจัดส่ง</a> -->
            
            <a href="logout.php" class="sidebar-items1">ออกจากระบบ</a>
        </div>


        <div id="productlist" class="product">
        </div>
        

        
    </div>

    <div id="modalDesc" class="modal" style="display: none;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>รายละเอียด</h2>
            <br>
            <div class="modaldesc-content">
                <img id="mdd-img" class="modaldesc-img" >
                <div class="modaldesc-detail">
                    <p id="mdd-name" style="font-size: 1.5vw;">Product name</p>
                    <p id="mdd-price" style="font-size: 1.2vw;">500 บาท</p>
                    <br>
                    <p id="mdd-desc" style="color: #adadad;">Lorem iaudantium harum doloremque alias. Quae, vel ipsum quasi, voluptas, sit optio nemo magni numquam non dicta voluptates porro! Vero eveniet numquam sit aut vel eligendi officiis iste tenetur expedita. Delectus vero quibusdam adipisci in. Esse.</p>
                    <br>
                    <div class="btn-control">
                        <button onclick="closeModal()" class="btn">
                            ปิด
                        </button>
                        <!-- <button class="btn btn-buy">
                            <a href="edit.php" style="color: #ffff;">แก้ไข</a>
                            
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>  
</body>
</html>