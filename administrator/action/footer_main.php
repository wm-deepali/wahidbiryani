<?php

include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();

if($_REQUEST['subview']=="add")
   {
     $check = mysql_query("SELECT name FROM  bk_footer WHERE name='".$_POST['name']."'") or die(mysql_error());
   
	 
	 
	
	 if(mysql_num_rows($check)) 
	   {
	     $_SESSION['footer1'] ="Same Name (".$_POST['name'].") Already Exists.";
		 echo "<script>window.location.href='../footer_main.php?subview=add'</script>"; 
	   }
	  
    

   else{
		   $name = mysql_real_escape_string($_POST['name']);
		    $title = mysql_real_escape_string($_POST['title']);
			 $content = mysql_real_escape_string($_POST['text']);
		   	
			$data = array("name"=>$name,
			              "title"=>$title,
						  "text"=>$content,
						
						"status"=>"active",
						"added_date"=>date("Y-m-d H:i:s", time())
			 );
		 
		  if($db->insert($data,' bk_footer') == true)  
			{
			
			
			 
			$_SESSION['footer'] ="Added Success Fully.";
			echo "<script>window.location.href='../footer_main.php?subview=list'</script>"; 	  
			}
		  else
			{
			$_SESSION['footer1'] ="Couldn't be added.Please try again.";
			echo "<script>window.location.href='../footer_main.php?subview=add'</script>"; 	
			}	
	  }		
   }
   
  if($_REQUEST['subview']=="update")
   {
   
	
	
	
	 $name = mysql_real_escape_string($_POST['name']);
		    $title = mysql_real_escape_string($_POST['title']);
			 $content = mysql_real_escape_string($_POST['text']);
		   	
			$data = array("name"=>$name,
			              "title"=>$title,
						  "text"=>$content,
	 
		
					
					);
	 $field ="id";	 
	 $id = $_REQUEST['id'];
		  if($db->update($data,' bk_footer',$field,$id) == true)  
			{
			
			
		
				 
				 
			$_SESSION['footer'] ="Update Success Fully.";
			}
		  else
		    {
			$_SESSION['footer1'] ="Couldn't be updated.Please try again.";
			}	
			//exit;
	  echo "<script>window.location.href='../footer_main.php?subview=list'</script>"; 	  		
   } 
  else if($_REQUEST['subview']=="bulk_actions")
   {
       $table = "bk_footer";
	   $table_field = "status";
	   $action = $_POST['bulk_action'];
	   $data = $_POST['id'];
	   //print_r($_POST['id']);
	    if($db->bulk_actions($table,$table_field,$action,$data) == true)
		  {
		  $_SESSION['footer'] = "Action Completed Successfully.";
		  }
	   else
	      {
		  $_SESSION['footer1'] = "Action couldn't be Completed. Please try again.";  
		  }  
		  
	  echo "<script>window.location.href='../footer_main.php?subview=list'</script>"; 	  		
   } 
   
  else if($_REQUEST['subview']=="delete")
   {
       $table = " bk_footer";
	   $id = $_REQUEST['id'];
	   //print_r($_POST['id']);
	    $get_images = mysql_query("SELECT * FROM  bk_footer WHERE id='".$id."'") or die(mysql_error());
		 $images = mysql_fetch_assoc($get_images);
		     unlink("../school/".$images['school_image']);
		 
	    if($db->delete_records($table,$id) == true)
		  {
		  $_SESSION['footer'] = "Record Deleted Successfully.";
		  }
	   else
	      {
		  $_SESSION['footer1'] = "Record couldn't be Deletd. Please try again.";  
		  }  
		  
	  echo "<script>window.location.href='../footer_main.php?subview=list'</script>"; 	  		
   }  