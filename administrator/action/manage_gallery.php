<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
if($_REQUEST['subview']=="add")
{
 for($i=0; $i<count($_FILES['image']['name']); $i++) 
 {
  $data = array(
    "status"=>"active",
    "added_date"=>date("Y-m-d H:i:s", time())
    );
  if($db->insert($data,'bk_gallery') == true)  
  { 
   $last_id = mysqli_insert_id($db->conn);
   extract($_POST);
   if(isset($_FILES['image']['name'][$i]))
   {
    $image = $_FILES['image']['name'][$i];   
    $image_name = "gallery_".$date.".".$image;
    $upload = move_uploaded_file($_FILES['image']['tmp_name'][$i],"../gallery/".$image_name);
    if($upload)
    {
     $thumbnail = $obj->generateThumbnail("../gallery/".$image_name, "../gallery/thumb/".$image_name,260,154);
     $sql2 = "UPDATE bk_gallery SET image_name='".$image_name."' WHERE id='".$last_id."'";
     $update_image =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
   } 
 } 
 $_SESSION['gallery'] ="Image Added Success Fully.";
 echo "<script>window.location.href='../manage_gallery.php?subview=list'</script>";   
}
else
{
  $_SESSION['gallery'] ="Image couldn't be added.Please try again.";
  echo "<script>window.location.href='../manage_gallery.php?subview=add'</script>";  
}
}
}    
if($_REQUEST['subview']=="update")
{
 $field ="id";   
 $id = $_REQUEST['id'];
 if($_FILES['image']['name']!="")
 {
   unlink("../gallery/".$_POST['added_image']);
   $image = $_FILES['image']['name'];
   $exp = explode(".",$image);
   $extension = end($exp);
   $image_name = "gallery_".$date.".".$extension;
   $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../gallery/".$image_name);
   if($upload)
   {
    $thumbnail = $obj->generateThumbnail("../gallery/".$image_name, "../gallery/thumb/".$image_name,260,154);
    $sql2 = "UPDATE bk_gallery SET image_name='".$image_name."' WHERE id='".$id."'";
    $update_logo =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
  }
  
  $_SESSION['gallery'] ="Gallery Details Update Success Fully.";
  echo "<script>window.location.href='../manage_gallery.php?subview=list'</script>";    
}
else
{
  $_SESSION['gallery'] ="Gallery Details couldn't be updated.Please try again.";
  echo "<script>window.location.href='../manage_gallery.php?subview=list'</script>";    
} 
}
else if($_REQUEST['subview']=="bulk_actions")
{
 $table = "bk_gallery";
 $table_field = "status";
 $action = $_POST['bulk_action'];
 $data = $_POST['id'];
     //print_r($_POST['id']);
 if($db->bulk_actions($table,$table_field,$action,$data) == true)
 {
  $_SESSION['gallery'] = "Action Completed Successfully.";
}
else
{
  $_SESSION['gallery'] = "Action couldn't be Completed. Please try again.";  
}  
echo "<script>window.location.href='../manage_gallery.php?subview=list'</script>";         
} 
else if($_REQUEST['subview']=="delete")
{
 $table = "bk_gallery";
 $id = $_REQUEST['id'];
     //print_r($_POST['id']);
 $sql2 = "SELECT * FROM bk_gallery WHERE id='".$id."'";
 $get_images = mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
 $images = mysqli_fetch_assoc($get_images);
 unlink("../gallery/".$images['image_name']);
 unlink("../gallery/thumb/".$images['image_name']);
 if($db->delete_records($table,$id) == true)
 {
  $_SESSION['gallery'] = "Record Deleted Successfully.";
}
else
{
  $_SESSION['gallery'] = "Record couldn't be Deletd. Please try again.";  
}  
echo "<script>window.location.href='../manage_gallery.php?subview=list'</script>";         
}  