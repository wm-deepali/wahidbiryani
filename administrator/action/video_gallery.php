<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
if($_REQUEST['subview']=="add")
   {
          $title = mysqli_real_escape_string($db->conn,$_POST['title']);
          $link = mysqli_real_escape_string($db->conn,$_POST['link']);
		  $data = array("title"=>$title,
				             "link"=>$link,
						     "status"=>"active",
						     "added_date"=>date("Y-m-d H:i:s", time())
			 );
		  if($db->insert($data,'bk_video') == true)  
			{
			$last_id = mysqli_insert_id($db->conn);
			$_SESSION['video'] ="Added Success Fully.";
			echo "<script>window.location.href='../video_gallery.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['video'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../video_gallery.php?subview=add'</script>"; 	
			}	
   }

  if($_REQUEST['subview']=="update")
   {
           $title = mysqli_real_escape_string($db->conn,$_POST['title']);
          $link = mysqli_real_escape_string($db->conn,$_POST['link']);
          $data = array("title"=>$title,
				             "link"=>$link,
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
	 if($db->update($data,'bk_video',$field,$id) == true)  
			{
			$_SESSION['video'] ="Added Success Fully.";
			echo "<script>window.location.href='../video_gallery.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['video'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../video_gallery.php?subview=add'</script>"; 	
			}	
   }

else if($_REQUEST['subview']=="delete")
   {
       $table = "bk_video";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $sql2 = "SELECT * FROM bk_video WHERE id='".$id."'";
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['video'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['video'] = "Record couldn't be Deletd. Please try again.";  
		  }  
	  echo "<script>window.location.href='../video_gallery.php?subview=list'</script>"; 	  		
   } 
   ?>