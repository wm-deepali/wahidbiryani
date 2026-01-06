<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
    $title = mysqli_real_escape_string($db->conn,$_POST['title']);
     $name = mysqli_real_escape_string($db->conn,$_POST['name']);
    $content = mysqli_real_escape_string($db->conn,$_POST['text']);
   
	$data = array("title"=>$title,
		          "name"=>$name, 
			         "content"=>$content,
			        
					);
	$field ="id";	 
	$id = $_REQUEST['id'];
		  if($db->update($data,'bk_about',$field,$id) == true)  
			{
			 if($_FILES['image']['name']!="")
				 {
				   unlink("../gallery/".$_POST['added_image']);
				   unlink("../gallery/thumb/".$_POST['added_image']);
				   $image = $_FILES['image']['name'];
				   $exp = explode(".",$image);
				   $extension = end($exp);
				   $image_name = "gallery_".$date.".".$extension;
				   $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../gallery/".$image_name);
					if($upload)
					  {
					  $thumbnail = $obj->generateThumbnail("../gallery/".$image_name, "../gallery/thumb/".$image_name, 403,407);
						$sql2 = "UPDATE bk_about SET image_name='".$image_name."' WHERE id='".$id."'";
						$update_logo =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
					  }
				 }
			$_SESSION['brand'] ="About Us Update Success Fully.";
			 echo "<script>window.location.href='../manage_about.php?subview=update&id=".$id."'</script>"; 	 
			}
		  else
		    {
			$_SESSION['brand'] ="About Us couldn't be updated.Please try again.";
			 echo "<script>window.location.href='../manage_about.php?subview=update&id=".$id."'</script>"; 	 
			}	
			?>		
     