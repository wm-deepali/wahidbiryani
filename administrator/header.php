<?php 
include("connection.php");
if($_SESSION['admin_id']!='')
{
  $admin = new Common();
  $admin_details = $admin->GetUserDetails($_SESSION['admin_id']);
}
else
{
 echo "<script>window.location.href='index.php'</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.ico">
  <title></title>
  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
  <!-- ionicons -->
  <link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">
  <!-- theme style -->
  <link rel="stylesheet" href="css/master_style.css">
  <!-- fox_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/skins/_all-skins.css">
  <!-- weather weather -->
  <link rel="stylesheet" href="assets/vendor_components/weather-icons/weather-icons.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">
  <!-- date picker -->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">     
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope"></i>
                <span class="label label-success">5</span>
              </a>
              <ul class="dropdown-menu scale-up">
                <li class="header">You have 5 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu inner-content-div">
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                        </div>
                        <div class="mail-contnet">
                         <h4>
                          Hello
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <span> Hello Hello Hello Hello</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See all e-Mails</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-warning">7</span>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 7 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Hello Hello Hello Hello 
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag"></i>
              <span class="label label-danger">6</span>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 6 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                       Hello
                       <small class="pull-right">90%</small>
                     </h3>
                     <div class="progress xs">
                      <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                      aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">90% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <!-- end task item -->
            </ul>
          </li>
          <li class="footer">
            <a href="#">View all tasks</a>
          </li>
        </ul>
      </li>
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="images/avatar.png" class="user-image rounded-circle" alt="Image">
        </a>
        <ul class="dropdown-menu scale-up">
          <!-- Menu Footer-->
          <li class="user-footer">
               <div class="pull-left">
                  <a href="update_profile.php" class="btn btn-block btn-primary">My Account</a>
                </div> 
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-block btn-danger">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="image float-left">
          <img src="images/avatar.png" class="rounded" alt="Logo">
        </div>
        <div class="info float-left">
          <p>Wahid Biryani</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">        
        <li class="header">Main Menu</li>
        <li class="active">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Home Management</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="manage_slider.php?subview=list"><i class="fa fa-circle-o"></i>Slider Settings</a></li>
          <li><a href="manage_about.php"><i class="fa fa-circle-o"></i>About Us</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>About Us Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="about_us.php"><i class="fa fa-circle-o"></i>About Us</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Menu Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="menu_category.php?subview=list"><i class="fa fa-circle-o"></i>Menu  Category</a></li>
          <li><a href="menu_detail.php?subview=list"><i class="fa fa-circle-o"></i>View / Edit Menu</a></li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-file-image-o"></i>
            <span>Gallery Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="gallery_category.php?subview=list"><i class="fa fa-circle-o"></i>Gallery Category</a></li>
          <li><a href="gallery_image.php?subview=list"><i class="fa fa-circle-o"></i>Image Gallery</a></li>
          <li><a href="video_gallery.php?subview=list"><i class="fa fa-circle-o"></i>Video Gallery</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Manage Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="manage_branch.php?subview=list"><i class="fa fa-circle-o"></i>Manage  Branch</a></li>
          </ul>
        </li>
       <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>Website Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="general_setting.php"><i class="fa fa-circle-o"></i>General Settings</a></li>
        <li><a href="social_media.php"><i class="fa fa-circle-o"></i>Social Media</a></li>
        <li><a href="manage_testimonials.php"><i class="fa fa-circle-o"></i>Testimonials</a></li>
        <li><a href="manage_enquiry.php"><i class="fa fa-circle-o"></i>Home Enquiry</a></li>
        <li><a href="manage_seo.php?subview=list"><i class="fa fa-circle-o"></i>Manage Seo</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
