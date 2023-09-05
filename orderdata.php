<?php 

    session_start();
    require_once 'config/dbconnectorder.php';

    if (isset($_POST['order'])) 
        $transid = $_POST['transid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $nickname = $_POST['nickname'];
        $numberphone = $_POST['numberphone'];
        // $address = $_['address'];
        // $district = $_POST['district'];
        // $city = $_POST['city'];


                    $stmt = $conn->prepare("INSERT INTO order(firstname, lastname, nickname, numberphone, urole) 
                                            VALUES(:firstname, :lastname, :nickname, :numberphone,)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":nickname", $nickname);
                    $stmt->bindParam(":numberphone", $numberphone);
                    // $stmt->bindParam(":address", $address);
                    // $stmt->bindParam(":district", $district);
                    // $stmt->bindParam(":city", $city);
                    
                //     $_SESSION['success'] = "คุณสมัครสมาชิกเรียบร้อยแล้ว!";
                //     header("location: index.php");
                // } else {
                //     $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                //     header("location: register.php");
                // }

           
    
    


?>