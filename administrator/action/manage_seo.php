<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
if($_REQUEST['subview']=="add")
   {
   	      $url = mysqli_real_escape_string($db->conn,$_POST['url']);
          $meta_title = mysqli_real_escape_string($db->conn,$_POST['meta_title']);
          $meta_key = mysqli_real_escape_string($db->conn,$_POST['meta_key']);
          $meta_desc = mysqli_real_escape_string($db->conn,$_POST['meta_desc']);
		  $data = array("meta_title"=>$meta_title,
				             "meta_key"=>$meta_key,
				             "meta_desc"=>$meta_desc,
				             "url"=>$url,
						     "status"=>"active",
						     "added_date"=>date("Y-m-d H:i:s", time())
			 );
		  if($db->insert($data,'bk_seo') == true)  
			{
			$last_id = mysqli_insert_id($db->conn);
			$_SESSION['seo'] ="Added Success Fully.";
			echo "<script>window.location.href='../manage_seo.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['seo'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../manage_seo.php?subview=add'</script>"; 	
			}	
   }

  if($_REQUEST['subview']=="update")
   {      
   	      $url = mysqli_real_escape_string($db->conn,$_POST['url']);
          $meta_title = mysqli_real_escape_string($db->conn,$_POST['meta_title']);
          $meta_key = mysqli_real_escape_string($db->conn,$_POST['meta_key']);
          $meta_desc = mysqli_real_escape_string($db->conn,$_POST['meta_desc']);
    $data = array("meta_title"=>$meta_title,
				             "meta_key"=>$meta_key,
				             "meta_desc"=>$meta_desc,
				             "url"=>$url,
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
	 if($db->update($data,'bk_seo',$field,$id) == true)  
			{
			$_SESSION['seo'] ="Added Success Fully.";
			echo "<script>window.location.href='../manage_seo.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['seo'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../manage_seo.php?subview=add'</script>"; 	
			}	
   }

else if($_REQUEST['subview']=="delete")
   {
       $table = "bk_seo";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $sql2 = "SELECT * FROM bk_seo WHERE id='".$id."'";
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['seo'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['seo'] = "Record couldn't be Deletd. Please try again.";  
		  }  
	  echo "<script>window.location.href='../manage_seo.php?subview=list'</script>"; 	  		
   } 
   ?>