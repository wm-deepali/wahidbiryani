<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");

if($_REQUEST['subview']=="add")
   {
          $title = mysqli_real_escape_string($db->conn,$_POST['title']);
    
      $content=mysqli_real_escape_string($db->conn,$_POST['text']);
      $data = array("title"=>$title,
                   
             "content"=>$content,
            "status"=>"active",
            "added_date"=>date("Y-m-d H:i:s", time())
       );
     
      if($db->insert($data,'bk_testimonial') == true)  
      {
      $last_id = mysqli_insert_id($db->conn);
      if($_FILES['image']['name']!="")
         {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
       
         
           $image = $_FILES['image']['name'];
         /*  $exp = explode(".",$image);
           $extension = end($exp);
           
           $image_name = "testi_".$date.".".$extension;*/
            $image_name = $image;
          $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../aboutus/".$image_name);
          if($upload)
            {
            $thumbnail = $obj->generateThumbnail("../gallery/".$image_name, "../gallery/thumb/".$image_name, 100, 100);
            $sql2 = "UPDATE bk_testimonial SET image_name='".$image_name."' WHERE id='".$last_id."'";
            $update_image = mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
            }
            
            }
  else {
      
      $_SESSION['slider'] = "File is Not an image!";
      echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>"; 
     }  
            
            
            
         }
      $_SESSION['slider'] ="Added Success Fully.";
      echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>";     
      }
      else
      {
      $_SESSION['slider'] ="Image couldn't be added.Please try again.";
      echo "<script>window.location.href='../manage_testimonials.php?subview=add'</script>";  
      } 
    
   }
   
  if($_REQUEST['subview']=="update")
   {
          $title = mysqli_real_escape_string($db->conn,$_POST['title']);
    
      $content=mysqli_real_escape_string($db->conn,$_POST['text']);
      $data = array("title"=>$title,
                    
             "content"=>$content
          );
   $field ="id";   
   $id = $_REQUEST['id'];
      if($db->update($data,'bk_testimonial',$field,$id) == true)  
      {
       if($_FILES['image']['name']!="")
         {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
           unlink("../gallery/".$_POST['added_image']);
           unlink("../gallery/thumb/".$_POST['added_image']);
           $image = $_FILES['image']['name'];
          /* $exp = explode(".",$image);
           $extension = end($exp);
           
           $image_name = "testi_".$date.".".$extension;*/
           $image_name = $image;
           $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../gallery/".$image_name);
          if($upload)
            {
              $thumbnail = $obj->generateThumbnail("../gallery/".$image_name, "../gallery/thumb/".$image_name, 100, 100);
            $sql2 = "UPDATE bk_testimonial SET image_name='".$image_name."' WHERE id='".$id."'";
            $update_logo =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
            }
            
           }
  else {
      
      $_SESSION['slider'] = "File is Not an image!";
      echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>"; 
     }      
            
         }
      $_SESSION['slider'] ="Update Success Fully.";
      }
      else
        {
      $_SESSION['slider'] ="couldn't be updated.Please try again.";
      } 
      //exit;
    echo "<script>window.location.href='../manage_testimonials.php?subview=update&id=".$id."'</script>";        
   } 

if($_REQUEST['subview']=="update1")
   {
     
      $data = array(
       
       "status"=>'deactive',
         
          );
   $field ="id";   
   $id = $_REQUEST['id'];
      if($db->update($data,'bk_testimonial',$field,$id) == true)  
      {
      
      $_SESSION['slider'] ="Update Success Fully.";
      }
      else
        {
      $_SESSION['slider'] ="couldn't be updated.Please try again.";
      } 
      //exit;
      
  
      echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>";     
   } 
     if($_REQUEST['subview']=="update2")
   {
    
      $data = array(
       
       "status"=>'active',
          
          );
   $field ="id";   
   $id = $_REQUEST['id'];
      if($db->update($data,'bk_testimonial',$field,$id) == true)  
      {
      
      $_SESSION['slider'] ="Update Success Fully.";
      }
      else
        {
      $_SESSION['slider'] ="couldn't be updated.Please try again.";
      } 
      //exit;
        echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>";  
   }

  else if($_REQUEST['subview']=="bulk_actions")
   {
       $table = "bk_testimonial";
     $table_field = "status";
     $action = $_POST['bulk_action'];
     $data = $_POST['id'];
     //print_r($_POST['id']);
      if($db->bulk_actions($table,$table_field,$action,$data) == true)

      {
      $_SESSION['slider'] = "Action Completed Successfully.";
      }
     else
        {
      $_SESSION['slider'] = "Action couldn't be Completed. Please try again.";  
      }  
      
    echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>";         
   } 
   
  else if($_REQUEST['subview']=="delete")
   {
       $table = "bk_testimonial";
     $id = $_REQUEST['id'];
     //print_r($_POST['id']);
      $sql2 = "SELECT * FROM bk_testimonial WHERE id='".$id."'";
    $get_images = mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
      $images = mysqli_fetch_assoc($get_images);
         unlink("../gallery/".$images['image_name']);
       unlink("../gallery/thumb/".$images['image_name']);
     
      if($db->delete_records($table,$id) == true)
      {
      $_SESSION['slider'] = "Record Deleted Successfully.";
      }
     else
        {
      $_SESSION['slider'] = "Record couldn't be Deletd. Please try again.";  
      }  
      
    echo "<script>window.location.href='../manage_testimonials.php?subview=list'</script>";         
   }  