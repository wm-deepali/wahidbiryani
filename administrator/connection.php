<?php
session_start();
setcookie("humans_21909", '1');
error_reporting(0);
date_default_timezone_set('Asia/Calcutta');
$request_url = $_SERVER['REQUEST_URI'];
$exp_url = explode("/",$request_url);
$current_dir=  $_SERVER['SCRIPT_FILENAME'];
$expl = explode("/",$current_dir);
$dir_count = count($expl)-2;
$dir = $expl[$dir_count];
if($_SERVER['REMOTE_ADDR']=='::1')
{
if($dir=='action')
   include("../../classes/all.classes.php");
else if($dir=='public_html' || $dir=='') /*  localhost folder name */
  include("classes/all.classes.php");
else
  include("../classes/all.classes.php");
}
else{
if($dir=='action')
include("../../classes/all.classes.php");
else if($dir=='public_html' || $dir=='')/*  Online folder name if website on directly then use http either use folder name only */
include("classes/all.classes.php");
else
include("../classes/all.classes.php");
}
$db = new Common();
$users = new Front_End;
$admin_email = $users->SiteSetting("email_id");
?>