<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
    $map = mysqli_real_escape_string($db->conn,$_POST['map']);
    $address = mysqli_real_escape_string($db->conn,$_POST['address']);
    $email = mysqli_real_escape_string($db->conn,$_POST['email']);
    $mob = mysqli_real_escape_string($db->conn,$_POST['mob']);
    $tel = mysqli_real_escape_string($db->conn,$_POST['tel']);
		$data = array("map"=>$map,
			         "address"=>$address,
			          "email"=>$email,
			           "mob"=>$mob,
			             "tel"=>$tel
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
		  if($db->update($data,'bk_general_setting',$field,$id) == true)  
			{
			 if($_FILES['image']['name']!="")
				 {
				   unlink("../logo/".$_POST['added_image']);
				   unlink("../logo/thumb/".$_POST['added_image']);
				   $image = $_FILES['image']['name'];
				   $exp = explode(".",$image);
				   $extension = end($exp);
				   $image_name = "logo_".$date.".".$extension;
				   $upload = move_uploaded_file($_FILES['image']['tmp_name'],"../logo/".$image_name);
					if($upload)
					  {
					  $thumbnail = $obj->generateThumbnail("../logo/".$image_name, "../logo/thumb/".$image_name, 530,450);
						$sql2 = "UPDATE bk_general_setting SET image_name='".$image_name."' WHERE id='".$id."'";
						$update_logo =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
					  }
				 }
			$_SESSION['brand'] ="General Setting Update Success Fully.";
			 echo "<script>window.location.href='../general_setting.php?subview=update&id=".$id."'</script>"; 	 
			}
		  else
		    {
			$_SESSION['brand'] ="General Setting couldn't be updated.Please try again.";
			 echo "<script>window.location.href='../general_setting.php?subview=update&id=".$id."'</script>"; 	 
			}			
     