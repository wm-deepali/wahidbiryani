<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");

if($_REQUEST['subview']=="add")
   {
		 $title = mysqli_real_escape_string($db->conn,$_POST['title']);
			$data = array("title"=>$title,
						 "status"=>"active",
						 "added_date"=>date("Y-m-d H:i:s", time())
			 );
		  if($db->insert($data,'bk_menu_category') == true)  
			{
			$last_id = mysqli_insert_id($db->conn);
			
			$_SESSION['category'] ="Category Added Success Fully.";
			echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	  
			
		 }
				  else {
      $_SESSION['category'] ="Category Not Added Success Fully.";
			echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	  
    } 	
   }
  if($_REQUEST['subview']=="update")
   {
    $title = mysqli_real_escape_string($db->conn,$_POST['title']);
		$data = array("title"=>$title
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
	 if($db->update($data,'bk_menu_category',$field,$id) == true)  {
		 	 
			$_SESSION['category'] ="Category Update Success Fully.";
			 echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	 
			}
		  else
		    {
			$_SESSION['category'] ="Category couldn't be updated.Please try again.";
			 echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	 
			}		
   }
  else if($_REQUEST['subview']=="bulk_actions")
   {
       $table = "bk_menu_category";
	   $table_field = "status";
	   $action = $_POST['bulk_action'];
	   $data = $_POST['id'];
	   //print_r($_POST['id']);
	    if($db->bulk_actions($table,$table_field,$action,$data) == true)
		  {
		  $_SESSION['category'] = "Action Completed Successfully.";
		  }
	   else
	      {
		  $_SESSION['category'] = "Action couldn't be Completed. Please try again.";  
		  }  
		  
	  echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	  		
   } 
   
  else if($_REQUEST['subview']=="delete")
   {
       $table = "bk_menu_category";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $sql2 = "SELECT * FROM bk_menu_category WHERE id='".$id."'";
		$get_images =	mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
		
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['category'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['category'] = "Record couldn't be Deletd. Please try again.";  
		  }  
		  
	  echo "<script>window.location.href='../menu_category.php?subview=list'</script>"; 	  		
   }  
   ?>