<?php
include("../connection.php");   
 if($_REQUEST['subview']=="delete")
{
 $table = "bk_contact";
 $id = $_REQUEST['id'];
     //print_r($_POST['id']);
 $sql2 = "SELECT * FROM bk_contact WHERE id='".$id."'";
 if($db->delete_records($table,$id) == true)
 {
  $_SESSION['enquiry'] = "Record Deleted Successfully.";
}
else
{
  $_SESSION['enquiry'] = "Record couldn't be Deletd. Please try again.";  
}  

echo "<script>window.location.href='../manage_enquiry.php?subview=list'</script>";         
}  