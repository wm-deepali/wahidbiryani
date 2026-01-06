<?php 
include("header.php");
//echo $_POST['id'];
if($_REQUEST['subview']=="add")
 $_HEADING = "Add New Slider";
else if($_REQUEST['subview']=="update")
{
  $_HEADING = "Update Slider";  
  $query = "SELECT * FROM bk_slider WHERE id='".$_REQUEST['id']."'";
  $get_offer =  mysqli_query($db->conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
  $offer = mysqli_fetch_assoc($get_offer);
}
else if($_REQUEST['subview']=="list")
{
 $_HEADING = "View All Slider";
 $rowsperpage = 20;
 if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
   $sql1 = "SELECT * FROM bk_slider ORDER BY id DESC ";
 elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
   $sql1 = "SELECT * FROM bk_slider WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC ";
 $db1 = $db->conn;
   $website = $_SERVER['PHP_SELF']."?subview=list"; // other arguments if need it.
   $pagination = new CSSPagination($db1, $sql1, $rowsperpage, $website); // create instance object
   $pagination->setPage($_GET['page']);
   if($_REQUEST['status']=="all" || $_REQUEST['status']=="")
     $sql2 = "SELECT * FROM bk_slider ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
   elseif($_REQUEST['status']!="all" && $_REQUEST['status']!="")
    $sql2 = "SELECT * FROM bk_slider WHERE status = '".$_REQUEST['status']."' ORDER BY id DESC LIMIT " . $pagination->getLimit() . ", " . $rowsperpage; 
  $result =  mysqli_query($db->conn,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
  $num_data = mysqli_num_rows($result);
}
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Content Management
   </h1>
   <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-files-o"></i> Slider Management</a></li>
    <li class="breadcrumb-item active">Edit Slider</li>
  </ol>
  <?php if($_SESSION['slider']!=""){ ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['slider'];$_SESSION['slider']="";?>
  </div>
  <?php } ?>
  <?php if($_SESSION['slider']!=""){?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $_SESSION['slider'];$_SESSION['slider']="";?>
  </div>
  <?php } ?>
</section>
<br>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Report Data</h3>
    <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    <button class="btn btn-primary pull-right" data-target="#add_sld" data-toggle="modal">Add New Slider</button>
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
        <th>Heading</th>
       <th>Slider Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $i=1; while($row = mysqli_fetch_assoc($result)){?>
     <tr>
      <td><?php echo $i?></td>
      <td><img src="slider/<?php echo $row['image_name'];?>" height="60px" width="120px" class="rounded-circle img-sm"/></td>
     <td><?php echo $row['heading']?></td>
     <td><?php echo $row['title']?></td>
      <td>
        <ul class="actions">
          <li><a href="?subview=update&id=<?php echo $row['id'];?>" data-target="#<?php echo $row['id'];?>" data-toggle="modal" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
           </form>
         <li><a href="action/manage_slider.php?subview=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></li>
       </ul>
     </td>
   </tr>
   <div id="<?php echo $row['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Slider</h4>
      </div>
      <form action="action/manage_slider.php?subview=update&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
         <div class="form-group">
           <div class="row">
            <div class="col-sm-12">
              <h5>Slider Image<span class="text-danger">*</span></h5>
              <div class="controls">
              <div class="form-group">
                        <?php if($row['image_name']!=""){?>      
              <img src="slider/<?php echo $row['image_name']?>" height="100" width="100"/>
                <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="discount">Image only upload(1349*527)</label>
                      <input type="file" class="form-control" name="image" id="image"/>
                    </div>
              </div>
              </div>
              <div class="col-sm-12">
                <h5>Heading <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="heading" class="form-control" value="<?php echo $row['heading']?>"> </div>
                </div> 
            <div class="col-sm-12">
                <h5>Title <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="title" class="form-control" value="<?php echo $row['title']?>"> </div>
                </div> 
               
              <!--<div class="col-sm-12">
                  <h5>Content<span class="text-danger">*</span></h5>
                  <div class="controls">
                  <textarea name="text" class="form-control"><?php echo $row['content']?></textarea>
                     
                  </div></div>-->
                  <input type="hidden" name="added_image" value="<?php echo $row['image_name']?>" />
                  <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Update Slider</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </form>
       </div>
     </div>
   </div>
   <?php $i++;}?>
 </tbody>         
 <tfoot>
   <tr>
   <th>Sr. No.</th>
        <th>Image</th>
       <th>Heading</th>
       <th>Slider Title</th>
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
   <div id="add_sld" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Slider</h4>
        </div>
        <form action="action/manage_slider.php?subview=add" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="form-group">
             <div class="row">
              <div class="col-sm-12">
                <h5>Slider Image upload(1349*527)<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="file" class="form-control" name="image" id="image"/>
                </div>
              </div>
               <div class="col-sm-12">
                <h5>Heading <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="heading" class="form-control" data-validation-required-message="This field is required"> </div>
                </div>
            <div class="col-sm-12">
                <h5>Title <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="title" class="form-control" data-validation-required-message="This field is required"> </div>
                </div>
              <!--<div class="col-sm-12">
                  <h5>Content<span class="text-danger">*</span></h5>
                  <div class="controls">
                  <textarea name="text" class="form-control" placeholder="Details: "></textarea>
                  </div></div>-->
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <button type="submit" name="cat" id="cat" class="btn btn-primary">Add New Slider</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
         </form>
       </div>
     </div>
   </div>
   <?php include('footer.php'); ?>
   
   

