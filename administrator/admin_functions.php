<?php 
include("connection.php");
//$functions = new Functions;

if($_REQUEST['act']=='get_sub_cat')
   {
	$category = mysql_real_escape_string($_REQUEST['category']);
	$db->get_subcat_ajax($category);
    }
	
	elseif($_REQUEST['act']=='get_sub_cat1')
   {
	$category = mysql_real_escape_string($_REQUEST['category']);
	$db->get_subcat_ajax1($category);
    }
	
elseif($_REQUEST['act']=='get_product_type')
   {
    $category = mysql_real_escape_string($_REQUEST['category']);
    $db->get_product_types_ajax($category);
    }
	
	elseif($_REQUEST['act']=='get_sub_sub_cat')
   {
    $category = mysql_real_escape_string($_GET['category']);
	
	$sub_cat = mysql_real_escape_string($_REQUEST['sub_cat']);
	
	
	
    $db->get_sub_subcat_ajax($sub_cat,$category);
    }
	
		
mysql_close();
