<?php 
include("header.php");
echo $_POST['id'];
if($_REQUEST['subview']=="add")
 $_HEADING = "Add New Category Profile";
else if($_REQUEST['subview']=="update")
{
  $_HEADING = "Update Category Profile";  
  $query = "SELECT * FROM bk_gallery_category WHERE id='".$_REQUEST['id']."'";
  $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
  $offer = mysqli_fetch_assoc($get_offer);
}
else if($_REQUEST['subview']=="list")
{
 $_HEADING = "View All Category Profile";
 $rowsperpage = 20;
 if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
   $sql1 = "SELECT * FROM bk_gallery_category ORDER BY id DESC ";
 elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
   $sql1 = "SELECT * FROM bk_gallery_category WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC ";
 $db1 = $db->conn;
   $website = $_SERVER['PHP_SELF']."?subview=list"; // other arguments if need it.
   $pagination = new CSSPagination($db1, $sql1, $rowsperpage, $website); // create instance object
   $pagination->setPage($_GET['page']);
   if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
     $sql2 = "SELECT * FROM bk_gallery_category ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
   elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
    $sql2 = "SELECT * FROM bk_gallery_category WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
  $result =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
  $num_data = mysqli_num_rows($result);
}
?> 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Gallery Management
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> Gallery Category Management</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
      </ol>
      <?php if($_SESSION['category']!=""){ ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['category'];$_SESSION['category']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['category']!="") { ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['category'];$_SESSION['category']="";?>
  </div>
  <?php } ?>
    </section>
<br>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Data</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
              <button class="btn btn-primary pull-right" data-target="#add_cat" data-toggle="modal">Add New Category</button>
            </div>
            <!-- /.box-header -->
            <?php if($_REQUEST['subview']=="list") {?>
            <div class="box-body">
             <div class="table-rs">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
        <thead>
          <tr>
            <th>Sr. No.</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         <?php $i=1; while($row = mysqli_fetch_assoc($result)){?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
                        <ul class="actions">
                          <li><a href="?subview=update&id=<?php echo $row['id'];?>" data-target="#<?php echo $row['id'];?>" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
                            <li><a href="action/gallery_category.php?subview=delete&id=<?php echo $row['id'];?>" title="Delete Gallery"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                        </ul>
                       </td>
          </tr>
          <div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Category</h4>
      </div>
       <form action="action/gallery_category.php?subview=update&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
           <div class="row">
            <div class="col-sm-12">
            <h5>Category Name<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="title" class="form-control" value="<?php echo $row['title']?>"> </div>
            </div>
           </div>
          </div>
          </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Update Category</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
          <?php $i++;} ?>
        </tbody>
        <tfoot>
          <tr>
           <th>Sr. No.</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
</div>    
            </div>
            <?php } ?>
            <!-- /.box-body -->
          </div>
  </div>
  <!-- Modal -->
<div id="add_cat" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
        <form action="action/gallery_category.php?subview=add" method="post" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
           <div class="row">
            <div class="col-sm-12">
            <h5>Category Name<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="title" class="form-control" data-validation-required-message="This field is required" placeholder="Category:"> </div>
            </div>
           </div>
          </div>
          </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Add New Category</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <?php include('footer.php'); ?>
 