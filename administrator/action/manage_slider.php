<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
if($_REQUEST['subview']=="add")
   {
		  $title = mysqli_real_escape_string($db->conn,$_POST['title']);
		  $heading = mysqli_real_escape_string($db->conn,$_POST['heading']);
          $content = mysqli_real_escape_string($db->conn,$_POST['text']);
		  $data = array("title"=>$title,
				        "content"=>$content,
				        "heading"=>$heading,
						"status"=>"active",
						"added_date"=>date("Y-m-d H:i:s", time())
			 );
		  if($db->insert($data,'bk_slider') == true)  
			{
			$last_id = mysqli_insert_id($db->conn);
			if($_FILES['image']['name']!="")
				 {
				   $image = $_FILES['image']['name'];
				   $exp = explode(".",$image);
				   $extension = end($exp);
				   $image_name = "slider_".$date.".".$extension;
					$upload = move_uploaded_file($_FILES['image']['tmp_name'],"../slider/".$image_name);
					if($upload)
					  {
					 $thumbnail = $obj->generateThumbnail("../slider/".$image_name, "../slider/thumb/".$image_name, 1349,527);
						$sql2 = "UPDATE bk_slider SET image_name='".$image_name."' WHERE id='".$last_id."'";
						 $update_image =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
					  }  
				 }
			$_SESSION['slider'] ="Slider Added Success Fully.";
			echo "<script>window.location.href='../manage_slider.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['slider'] ="Slider couldn't be added.Please try again.";
			echo "<script>window.location.href='../manage_slider.php?subview=add'</script>"; 	
			}	
   }
  if($_REQUEST['subview']=="update")
   {
    $title = mysqli_real_escape_string($db->conn,$_POST['title']);
    $heading = mysqli_real_escape_string($db->conn,$_POST['heading']);
    $content = mysqli_real_escape_string($db->conn,$_POST['text']);
    $link = mysqli_real_escape_string($db->conn,$_POST['link']);
    $data = array("title"=>$title,
			       "content"=>$content,
			       "heading"=>$heading
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
		  if($db->update($data,'bk_slider',$field,$id) == true)  
			{
			 if($_FILES['image']['name']!="")
				 {
				   unlink("../slider/".$_POST['added_image']);
				   unlink("../slider/thumb/".$_POST['added_image']);
				   $image = $_FILES['image']['name'];
				   $exp = explode(".",$image);
				   $extension = end($exp);
				   $image_name = "slider_".$date.".".$extension;
				   $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../slider/".$image_name);
					if($upload)
					  {
					  $thumbnail = $obj->generateThumbnail("../slider/".$image_name, "../slider/thumb/".$image_name, 1349,527);
						$sql2 = "UPDATE bk_slider SET image_name='".$image_name."' WHERE id='".$id."'";
						$update_logo =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
					  }
				 }
			$_SESSION['slider'] ="Slider Update Success Fully.";
			 echo "<script>window.location.href='../manage_slider.php?subview=list'</script>"; 	 
			}
		  else
		    {
			$_SESSION['slider'] ="Slider couldn't be updated.Please try again.";
			 echo "<script>window.location.href='../manage_slider.php?subview=list'</script>"; 	 
			}			
   } 
  else if($_REQUEST['subview']=="bulk_actions")
   {
       $table = "bk_slider";
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
	  echo "<script>window.location.href='../manage_slider.php?subview=list'</script>"; 	  		
   } 
  else if($_REQUEST['subview']=="delete")
   {
       $table = "bk_slider";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $sql2 = "SELECT * FROM bk_slider WHERE id='".$id."'";
		$get_images =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
		 $images = mysqli_fetch_assoc($get_images);
		     unlink("../slider/".$images['image_name']);
		     unlink("../slider/thumb/".$images['image_name']);
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['slider'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['slider'] = "Record couldn't be Deletd. Please try again.";  
		  }  
	  echo "<script>window.location.href='../manage_slider.php?subview=list'</script>"; 	  		
   }  
   ?>