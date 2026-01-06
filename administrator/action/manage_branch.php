<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
if($_REQUEST['subview']=="add")
   {
          $map = mysqli_real_escape_string($db->conn,$_POST['map']);
          $address = mysqli_real_escape_string($db->conn,$_POST['address']);
          $email = mysqli_real_escape_string($db->conn,$_POST['email']);
          $branch = mysqli_real_escape_string($db->conn,$_POST['branch']);
          $mob_no = mysqli_real_escape_string($db->conn,$_POST['mob_no']);
		  $data = array("address"=>$address,
				             "map"=>$map,
				             "email"=>$email,
				             "branch"=>$branch,
				             "mob_no"=>$mob_no,
						     "status"=>"active",
						     "added_at"=>date("Y-m-d H:i:s", time())
			 );
		  if($db->insert($data,'manage_branch') == true)  
			{
			$last_id = mysqli_insert_id($db->conn);
			$_SESSION['services'] ="Added Success Fully.";
			echo "<script>window.location.href='../manage_branch.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['services'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../manage_branch.php?subview=add'</script>"; 	
			}	
   }

  if($_REQUEST['subview']=="update")
   {
          $map = mysqli_real_escape_string($db->conn,$_POST['map']);
          $address = mysqli_real_escape_string($db->conn,$_POST['address']);
          $email = mysqli_real_escape_string($db->conn,$_POST['email']);
          $branch = mysqli_real_escape_string($db->conn,$_POST['branch']);
          $mob_no = mysqli_real_escape_string($db->conn,$_POST['mob_no']);
    $data = array("address"=>$address,
				             "map"=>$map,
				             "email"=>$email,
				             "branch"=>$branch,
				             "mob_no"=>$mob_no,
						     "status"=>"active",
						     "added_at"=>date("Y-m-d H:i:s", time())
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
	 if($db->update($data,'manage_branch',$field,$id) == true)  
			{
			$_SESSION['services'] ="Added Success Fully.";
			echo "<script>window.location.href='../manage_branch.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['services'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../manage_branch.php?subview=add'</script>"; 	
			}	
   }

else if($_REQUEST['subview']=="delete")
   {
       $table = "manage_branch";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $sql2 = "SELECT * FROM manage_branch WHERE id='".$id."'";
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['services'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['services'] = "Record couldn't be Deletd. Please try again.";  
		  }  
	  echo "<script>window.location.href='../manage_branch.php?subview=list'</script>"; 	  		
   } 