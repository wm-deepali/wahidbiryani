<?php
include("../connection.php"); 
include_once 'thumbnail.class.php';
$obj = new Thumbnail();
$date=date("YmdHis");
$facebook = mysqli_real_escape_string($db->conn,$_POST['facebook']);
$rss = mysqli_real_escape_string($db->conn,$_POST['rss']);
$youtube = mysqli_real_escape_string($db->conn,$_POST['youtube']);
$twitter = mysqli_real_escape_string($db->conn,$_POST['twitter']);
$ggle = mysqli_real_escape_string($db->conn,$_POST['ggle']);
$whatsapp = mysqli_real_escape_string($db->conn,$_POST['whatsapp']);
$data = array("facebook"=>$facebook,
	          "rss"=>$rss,
	          "youtube"=>$youtube,
	          "twitter"=>$twitter,
	          "ggle"=>$ggle,
	          "whatsapp"=>$whatsapp,
	          "status"=>"active",
              "added_date"=>date("Y-m-d H:i:s", time())
	         );
$field ="id";	 
$id = $_REQUEST['id'];
if($db->update($data,'bk_social_media',$field,$id) == true)  
{

	$_SESSION['social'] ="Social Media Update Success Fully.";
	echo "<script>window.location.href='../social_media.php?subview=update&id=".$id."'</script>"; 	 
}
else
{
	$_SESSION['social'] ="Social Media couldn't be updated.Please try again.";
	echo "<script>window.location.href='../social_media.php?subview=update&id=".$id."'</script>"; 	 
}			
