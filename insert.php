<?php 

    session_start();
    include_once './config/dbconnectins.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADD MENU</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>

<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mydata";
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql="SELECT *
 FROM food ";
 $query= mysqli_query($db,$sql);

?>
    <br>
    
    
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



    
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
            
            <h2 class="text-center">เพิ่มรายการอาหาร</h2>

                 
                            
                            
               <form action="insertupload.php" method="POST" enctype="multipart/form-data">

                

                <div class="form-group">
                <label for="m_name">ชื่อ :</label>
                <input type="text" name="m_name" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="m_price">ราคา</label>
                <input type="text" name="m_price" class="form-control" required>
                </div>


                <div class="form-group">
                <label for="m_description">รายละเอียด</label>
                <textarea name="m_description" class="form-control"></textarea>
                </div>           
                            
                <div class="text-center justify-content-center align-items-center p-4 border-2 border-dashed rounded-3">

                <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                

                </div>
     
                <div class="d-sm-flex justify-content-end mt-2">

                <input type="submit" name="submit" value="บันทึก" class="btn btn-success"> &nbsp
                <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">&nbsp
                <a  href='edit.php' class="btn btn-primary">กลับหน้าหลัก</a></a>    
                </div>

                        
                   
                </form>
            </div>
        </div>
      
            
             
         
        </div>
           
    </div>
    
</body>
</html>
