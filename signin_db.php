<?php

session_start();
require_once 'config/db.php';

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: index.php");
        exit(); // Exit the script to prevent further execution.
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: index.php");
        exit();
    } else if (strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: index.php");
        exit();
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $check_data->bindParam(":username", $username);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    if ($row['urole'] == 'admin') {
                        $_SESSION['admin_login'] = $row['id'];
                        header("location: admin.php");
                        exit();
                    } else if ($row['urole'] == 'rider') {
                        $_SESSION['rider_login'] = $row['id'];
                        header("location: rider.php");
                        exit();
                    } else {
                        $_SESSION['user_login'] = $row['id'];
                        header("location: customer.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'รหัสผ่านผิด';
                    header("location: index.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

?>
