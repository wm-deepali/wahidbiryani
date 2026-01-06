<?php 
include("header.php");
if($_REQUEST['subview']=="add")
 $_HEADING = "Add New Image Gallery";
else if($_REQUEST['subview']=="update")
{
 $_HEADING = "Update Image Gallery";   
 $query = "SELECT * FROM bk_gallery WHERE id='".$_REQUEST['id']."'";
 $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
 $offer = mysqli_fetch_assoc($get_offer);
}
else if($_REQUEST['subview']=="list")
{
 $_HEADING = "View All Image Gallery";
 $rowsperpage = 200;
 if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
   $sql1 = "SELECT * FROM bk_gallery ORDER BY id DESC ";
 elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
   $sql1 = "SELECT * FROM bk_gallery WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC ";
 $db1 = $db->conn;
   $website = $_SERVER['PHP_SELF']."?subview=list"; // other arguments if need it.
   $pagination = new CSSPagination($db1, $sql1, $rowsperpage, $website); // create instance object
   $pagination->setPage($_GET['page']);
   if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
     $sql2 = "SELECT * FROM bk_gallery ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
   elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
    $sql2 = "SELECT * FROM bk_gallery WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
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
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> Gallery Management</a></li>
    <li class="breadcrumb-item active">Edit Gallery</li>
  </ol>
  <?php if($_SESSION['gallery']!=""){ ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['gallery'];$_SESSION['gallery']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['gallery']!="") { ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['gallery'];$_SESSION['gallery']="";?>
  </div>
  <?php } ?>
</section>
<br>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Report Data</h3>
    <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    <button class="btn btn-primary pull-right" data-target="#add_gal" data-toggle="modal">Add New Gallery</button>
  </div>
  <!-- /.box-header -->
  <?php if($_REQUEST['subview']=="list") {?>
  <div class="box-body">
   <div class="table-rs">
    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
      <thead>
       <tr>
        <th>Sr. No.</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1; while($row = mysqli_fetch_assoc($result)){?>
     <tr>
      <td><?php echo $i?></td>
      <td><img src="gallery/<?php echo $row['image_name'];?>" height="60px" width="120px"" class="rounded-circle img-sm"/></td>
      <?php 
      $query = "SELECT id FROM bk_gallery WHERE status='active' ";
      $get_cat=mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
      $cat = mysqli_fetch_assoc($get_cat);?>
      <td>
        <ul class="actions">
          <li><a href="?subview=update&id=<?php echo $row['id'];?>" data-target="#<?php echo $row['id'];?>" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
          <li><a href="action/manage_gallery.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
        </ul>
      </td>
    </tr>
    <div id="<?php echo $row['id'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Gallery</h4>
          </div>
          <form action="action/manage_gallery.php?subview=update&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
             <div class="form-group">
              <div class="col-sm-12">
                <h5> <label for="discount">Image only upload(260*154)</label><span class="text-danger">*</span></h5>
                <div class="controls">
                  <div class="form-group">
                    <?php if($row['image_name']!=""){?>      
                    <img src="gallery/<?php echo $row['image_name']?>" height="100" width="100"/>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                 
                    <input type="file" class="form-control" name="image" id="image"/>
                  </div> </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Update Gallery</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </form>
       </div>

     </div>
   </div>
   <?php $i++;} ?>
   <input type="hidden" id="id" value="<?php echo $i-1;?>" />
 </tbody>
 <tfoot>
   <tr>
    <th>Sr. No.</th>
    <th>Image</th>
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
<div id="add_gal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Gallery</h4>
      </div>
      <form action="action/manage_gallery.php?subview=add" method="post" enctype="multipart/form-data">
        <div class="modal-body">
         <div class="form-group">
          <div class="col-sm-12">
            <h5>Select Multiple Gallery Image (Use Only 260*154 image size)<span class="text-danger">*</span></h5>
            <div class="controls">
             <input type="file" class="form-control" name="image[]" id="image" multiple/>
           </div>
         </div>
       </div>
     </div>

     <div class="modal-footer">
       <button type="submit" name="cat" id="cat" class="btn btn-primary">Add New Gallery</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
   </form>
 </div>

</div>
</div>
<?php include('footer.php'); ?>
