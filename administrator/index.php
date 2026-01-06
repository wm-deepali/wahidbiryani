<?php 
include("connection.php");
$admin = new Common;
$admin_details = $admin->GetUserDetails(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard | Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
      background: #F5F7FA;    
    } 
    .panel-default>.panel-heading {
      color: #fff;
      background: linear-gradient(to right,#00A5A8 0,#4DCBCD 100%) !important;
    }
    .btn-primary {
      border-color: #00A5A8!important;
      background-color: #00B5B8!important;
      color: #FFF;
    }

    .box-login{
      position: fixed;
      top: 50%;
      left: 50%;
      /* bring your own prefixes */
      transform: translate(-50%, -50%);
    }
  </style>
</head>
<body>
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-body">
           <div class="container">
            <div class="row">
              <div class="col-md-4 col-xs-12 box-login">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                  </div>
                  <div class="panel-body">
                    <fieldset>
                     <label style="color:#FF0000; text-align:center;"><?php echo $_SESSION['login'];$_SESSION['login']=""?></label>
                     <form action="action/login.php?subview=login" method="post">
                      <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="user_name" type="text">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                      </div>
                      <!-- <div class="checkbox">
                        <label>
                          <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                        </label>
                      </div> -->
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
                   <p class="pull-right"><a href="#forgotPass" data-toggle="modal">Forgot Password?</a></p> 
                      </form>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="forgotPass" class="modal fade" role="dialog">
          <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Forgot Password</h4>
                  <?php 
//$email=$_POST['email'];
$query="SELECT name FROM bk_users";
$get_email=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."DATA NOT INSERTED");
$email=mysqli_fetch_array($get_email);
if($email['name']!=$_POST['email']){
echo "Please Correct Email ID!";
}
else{
   $unique=rand(0000,9999);
    $password=$unique;
    $headers .= "Reply-To: admin <superadmin@onyxenterprises.in>\r\n";
    $headers .= "Return-Path: admin <superadmin@onyxenterprises.in>\r\n"; 
    $header = "From:Onyx-SMS<superadmin@onyxenterprises.in>\r\n".
    "MIME-Version: 1.0" . "\r\n" .
    "Content-type: text/html; charset=UTF-8" . "\r\n"; 
      $MailSubject = 'Onxy Eterprises - Change Password'; //text in the Subject field of the mail'
      $mail_body = '<table id="customers">
  <tr>
    <td>Password</td>
    <th>'.$password.'</th>
  </tr>
</table>';  
      //echo $username; exit();   
      $query="UPDATE bk_users SET new_pass='".$password."',password='".md5($password)."' WHERE name='".$email['name']."'";
      mysqli_query($db->conn,$query);                   
      $mail = mail($email['name'], $MailSubject, $mail_body, $header);
  echo "Your Password Change please check email Id";
}
?>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="row">
                       <label class="col-sm-2">
                        Email : 
                      </label>
                      <div class="col-sm-10">
                        <input type="text"  name="email" class="form-control" placeholder="Enter Email id" required>
                        <small>Enter your registered admin email id to get link to change your password</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="forget_password" class="btn btn-sm btn-info">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</body>
</html>
