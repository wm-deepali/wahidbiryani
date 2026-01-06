<?php include('administrator/connection.php'); ?>
 <?php //session_start(); ?>
 <?php
        if(isset($_POST['submit'])){
          $title=$_POST['title'];
          $email=$_POST['email'];
          $mobile=$_POST['mobile'];
          $content=$_POST['content'];
          //$image=$_FILES['image_name']['name'];
         /* move_uploaded_file($_FILES['image_name']['tmp_name'], 'administrator/gallery/'.$image);
          $file_type = $_FILES['image_name']['type']; //returns the mimetype
$allowed = array("image/jpg", "image/png", "image/jpeg");
if(!in_array($file_type, $allowed)) {
  $_SESSION['error']= "<center><p style='color: red;'>Only jpg, png, and jpeg files are allowed.</p></center>";
}
else{
          $image1=$_FILES['image_name']['name'];
          move_uploaded_file($_FILES['image_name']['tmp_name'], 'administrator/gallery/'.$image1);*/

          $sql = "INSERT INTO bk_testimonial(title, email, mobile, content)
          VALUES ('$title','$email','$mobile','$content')";
          mysqli_query($db->conn,$sql);
          $_SESSION['testi'] = "<center><p style='color: red;'>Thank You For Feedback</p></center>";
       //} 
      }
        header('Location:index.php');
        ?>
