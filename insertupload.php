<?php 

session_start();
include_once './config/dbconnectins.php';

if (isset($_POST['submit']))
  


         

         
// File upload path
         $targetDir = "imgs/";

 {

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
             

        // Allow certain file formats


        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        
        if (in_array($fileType, $allowTypes)) {

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $db->query("INSERT INTO food(m_name,file_name,m_price,m_description,uploaded_on) VALUES ('".$_POST["m_name"]."','".$fileName."','".$_POST["m_price"]."','".$_POST["m_description"]."', NOW())");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: insert.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: insert.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: insert.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: insert.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location:insert.php");
    }

}



?>