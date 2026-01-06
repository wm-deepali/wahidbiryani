<?php 
include("header.php");
//echo $_POST['id'];
if($_REQUEST['subview']=="add")
 $_HEADING = "Add New Branch";
else if($_REQUEST['subview']=="update")
{
  $_HEADING = "Update Branch";  
  $query = "SELECT * FROM manage_branch WHERE id='".$_REQUEST['id']."'";
  $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
  $offer = mysqli_fetch_assoc($get_offer);
}
else if($_REQUEST['subview']=="list")
{
 $_HEADING = "View All Branch";
 $rowsperpage = 20;
 if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
   $sql1 = "SELECT * FROM manage_branch ORDER BY id DESC ";
 elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
   $sql1 = "SELECT * FROM manage_branch WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC ";
 $db1 = $db->conn;
   $website = $_SERVER['PHP_SELF']."?subview=list"; // other arguments if need it.
   $pagination = new CSSPagination($db1, $sql1, $rowsperpage, $website); // create instance object
   $pagination->setPage($_GET['page']);
   if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
     $sql2 = "SELECT * FROM manage_branch ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
   elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
    $sql2 = "SELECT * FROM manage_branch WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
  $result =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
  $num_data = mysqli_num_rows($result);
}
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Branch Management
   </h1>
   <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> Branch Management</a></li>
    <li class="breadcrumb-item active">Edit Branch</li>
  </ol>
  <?php if($_SESSION['services']!=""){ ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['services'];$_SESSION['services']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['services']!=""){?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['services'];$_SESSION['services']="";?>
  </div>
  <?php } ?>
</section>
<br>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Report Data</h3>
    <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    <button class="btn btn-primary pull-right" data-target="#add_serv" data-toggle="modal">Add New Branch</button>
  </div>
  <!-- /.box-header -->
  <?php if($_REQUEST['subview']=="list") {?>
  <div class="box-body">
   <div class="table-rs">
    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
      <thead>
       <tr>
        <th>Sr. No.</th>
        <th>Branch</th>
        <th>Branch Address</th>
        <th>Email ID</th>
        <th>Branch Mob no.</th>
        <th>Action</th>
      </tr>

    </thead>
    <tbody>
     <?php $i=1; while($row = mysqli_fetch_assoc($result)){?>
     <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row['branch']?></td> 
      <td><?php echo $row['address']?></td> 
      <td><?php echo $row['email']?></td> 
      <td><?php echo $row['mob_no']?></td> 
      <td>
        <ul class="actions">
          <li><a href="action/manage_branch.php?subview=update&id=<?php echo $row['id'];?>" data-target="#<?php echo $row['id'];?>" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
           </form>
         <li><a href="action/manage_branch.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
       </ul>
     </td>
   </tr>
   <div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Branch</h4>
      </div>
      <form action="action/manage_branch.php?subview=update&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
         <div class="form-group">
           <div class="row">
            <div class="col-sm-12">
                <h5>Branch Name<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="branch" class="form-control" value="<?php echo $row['branch']?>"> </div>
              </div>
              <div class="col-sm-12">
                <h5>Branch Map (iframe src) <span class="text-danger">*</span></h5>
                <div class="controls">
                <textarea name="map" class="form-control" rows="5"><?php echo $row['map']?></textarea>
              </div>
              <div class="col-sm-12">
                <h5>Branch Address <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>"> </div>
              </div>
              <div class="col-sm-12">
                <h5>Eamil ID<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>"> </div>
              </div>
                 
              <div class="col-sm-12">
                <h5>Branch Mob No. <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="mob_no" class="form-control" value="<?php echo $row['mob_no']?>"> </div>
              </div>
                <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                </div>
         </div>
        </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </form>
    </div>
   </div>
</div>
   <?php $i++;}?>
 </tbody>   
</table>
</div>
</div>
<?php } ?>
<!-- /.box-body -->
</div>
</div>
<!-- Modal -->
   <div id="add_serv" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Branch</h4>
        </div>
        <form action="action/manage_branch.php?subview=add" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="form-group">
             <div class="row">
              <div class="col-sm-12">
                <h5>Branch Name<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="branch" class="form-control"> </div>
              </div>
              <div class="col-sm-12">
                <h5>Branch Map (iframe src) <span class="text-danger">*</span></h5>
                <div class="controls">
                  <textarea name="map" class="form-control" rows="8"></textarea>
                   </div>
              </div>
              
              <div class="col-sm-12">
                <h5>Branch Address <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" class="form-control" name="address"> </div>
              </div>
                 
              <div class="col-sm-12">
                <h5>Email ID<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="email" class="form-control"> </div>
              </div>
                 
              <div class="col-sm-12">
                <h5>Branch Mob No. <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="mob_no" class="form-control"> </div>
              </div>
                 
                </div>
                </div>
              </div>
            
            <div class="modal-footer">
             <button type="submit" name="cat" id="cat" class="btn btn-primary">Add New Branch</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </form>
       </div>
     </div>
   </div>
   <?php include('footer.php'); ?>
   
   

