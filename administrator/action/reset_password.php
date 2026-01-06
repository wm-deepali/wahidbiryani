<?php
include("../connection.php"); 

		  $query = ("SELECT id,name,email_id FROM bk_users WHERE email_id='".$_POST['admin_email']."' and user_role='admin'");
		  $match = mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		  $num_match = mysqli_num_rows($match);
		  if($num_match)
		    $user_det = mysqli_fetch_assoc($match);
		  $query1 = ("SELECT id,name,email_id FROM bk_users WHERE phone='".$_POST['admin_email']."'  and user_role='admin'") ;
		   $match1 = mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		  $num_match1 = mysqli_num_rows($match1);
		   if($num_match1)
		    $user_det = mysqli_fetch_assoc($match1);
		  if($num_match || $num_match1)
		     {
			  $password = $db->generatePassword($length=10,$strenth=8);
			 // exit;
			// echo "UPDATE bk_users SET password='".md5($password)."' WHERE id='".$user_det['id']."'";
			  $query = ("UPDATE bk_users SET password='".md5($password)."' WHERE id='".$user_det['id']."'") ;
			     $update_password = mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
				 if($update_password)
					{
					//echo "dfhdfhdf";
					//exit;
					 $query = ("SELECT * FROM bk_site_setting ");
		 $user_det1 = mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		  $user_detail = mysqli_fetch_array($user_det1);
		  	 $query = ("SELECT * FROM bk_logo where status='active' order by id desc limit 0,1 ") ;
			 $user_lo = mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
		              $user_logo = mysqli_fetch_array($user_lo);
					
					 $header = "From:'".$user_det['name']."'<info@".$user_detail['url'].">\r\n".
						  "MIME-Version: 1.0" . "\r\n" .
						  "Content-type: text/html; charset=UTF-8" . "\r\n"; 
					  $MailTo = $user_det['email_id'];
					  $MailSubject = 'Password Reset Successfully'; //text in the Subject field of the mail'
					$mail_body = '<div style="border: 1px solid #e6e6e6; width:65%; background-color:#F4FFFF;">
							<div style="width:500px;padding:0 0 0 15px;">
							<p>Dear <strong>'.$user_det['name'].'</strong></p>
							<br /><br />Account Login Details Given Below :
							<hr color="#2362a3" size="1px">
							Username : <strong> '.$user_det['email_id'].'</strong><br>
							Password : <strong> '.$password.'</strong><br>
							<hr color="#2362a3" size="1px" width="100%">
							<br /><br /><br />
							<font color="#2362a3"><em>Please do not reply to this e-mail as this a system generated notification.</em>
							<p><font size="1">Best Regards,<br>
							'.$user_det['name'].'</font></p></font>
							</div></div>';	
							$mail = mail($MailTo, $MailSubject, $mail_body, $header);
							  if($mail)
								 {
								   $_SESSION['recover'] = "Please Check Your Email-Id For New Password.";
	
								 }
					}
			}	
	   else
		 {
		   $_SESSION['recover'] = "Email-Id/Contact No. Doesn't Match.";
		 }	 
 echo "<script>window.location.href='../reset-password.php'</script>"; 	  		
    