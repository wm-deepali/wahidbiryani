<?php include('administrator/connection.php'); ?>
 <?php
        if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $email=$_POST['email'];
          $mobile=$_POST['mobile'];
          $message=$_POST['message'];
          $sql = "INSERT INTO bk_contact(name, email, message, mobile)
          VALUES ('$name','$email','$message','$mobile')";
           if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) 
  {
       // $note= 'Please enter valid text';
       $_SESSION['contact']="<center><p style='color: red;'>Please enter valid Captcha.</p></center>";
    echo "<script>window.location.href='index.php'</script>";
    } 
    else{
           mysqli_query($db->conn,$sql);
          $_SESSION['contact'] = "<center><p style='color: red;'>Thank You For Submit Contact Detail</p></center>";
        } 
        }
        header('Location:index.php');
        ?>
