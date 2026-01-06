<?php include('header.php'); 
$_HEADING = "Update Update Profile";   
   $query = "SELECT * FROM bk_users";
   $get_user =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
   $users = mysqli_fetch_assoc($get_user); 
if(isset($_POST['submit'])){
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
if($pass==$cpass){
$query="UPDATE bk_users SET password='".$pass."',new_pass='".$pass."' WHERE password='".$users['password']."'";
mysqli_query($db->conn,$query);
$_SESSION['pass']="Update your password";
}
else{
  $_SESSION['pass']="Please Match Password and Confirm Password";
}
}
if(isset($_POST['update'])){
$email_id=$_POST['email'];
$name=$_POST['name'];
if($pass==$cpass){
$query="UPDATE bk_users SET email_id='".$email_id."',name='".$name."' WHERE password='".$users['password']."'";
mysqli_query($db->conn,$query);
$_SESSION['pass']="Update your password";
}
else{
  $_SESSION['pass']="Please Match Password and Confirm Password";
}
}
   ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Account
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><i class="fa fa-cog"></i> Setting</li>
        <li class="breadcrumb-item active">Update Profile</li>
      </ol>
    </section>
<section class="content">

      <div class="row">
        <div class="col-xl-12 col-lg-12">
        <?php if($_SESSION['pass']!=""){?>
           <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <?php echo $_SESSION['pass'];$_SESSION['pass']="";?>
                  </div>
       <?php } ?>
      </div>
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src='images/avatar.png' alt="profile picture"> -->

              <h3 class="profile-username text-center">User Name</h3>

              <p class="text-muted text-center">Admin</p>
      
              <div class="row">
                <div class="col-12">
                 <div class="profile-user-info">
            <p>Name</p>
            <h6 class="margin-bottom"><?= $users['email_id']; ?></h6>
            <p>Email</p>
            <h6 class="margin-bottom"><?= $users['name']; ?></h6> 
          </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
        <li><a href="#updateprofile" class="active" data-toggle="tab">Profile</a></li>
               <li><a href="#accountsec" data-toggle="tab">Account Secuirty</a></li>
            </ul>
                        
            <div class="tab-content">
             
              <div class="tab-pane active" id="updateprofile" >
                <form class="form-horizontal form-element col-12" method="post">
                <!--  <div class="form-group">
                  <label for="exampleInputFile">Update Profile</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block text-red">Please Upload 100x100 Size. </p>
                </div> -->
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?= $users['email_id']; ?>" name="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?= $users['name']; ?>" name="name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" checked="">
            <label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <button type="submit" class="btn btn-success btn-lg" name="update">Update Profile</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
               <div class="tab-pane" id="accountsec" >
                <form class="form-horizontal form-element col-12" method="post">
                  <div class="form-group row">
                    <label for="inputpass" class="col-sm-2 control-label">Current Password</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" value="<?= $users['new_pass']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpass" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputpass" placeholder="Enter New Password" required data-validation-required-message="This field is required" name="pass">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpass" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                     <input type="password" class="form-control" id="inputpass" placeholder="Enter Confirm Password" required data-validation-required-message="This field is required" name="cpass">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                      <button type="submit" class="btn btn-success btn-lg">Update Security</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </div>
  <?php include('footer.php'); ?>
 