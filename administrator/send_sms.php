<?php include('header.php'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send SMS
		</h1>
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><i class="fa fa-cog"></i> Notification Management</li>
        <li class="breadcrumb-item active">Send SMS</li>
      </ol>
    </section>

          <div class="box">
           <div class="box-body">
             <div class="row">
            <div class="col">
            	<form novalidate>
            	<h2>Send SMS</h2>
            	<div class="form-group">
					 <div class="row">
						<div class="col-sm-6">
						<h5>Send to<span class="text-danger">*</span></h5>
						<div class="controls">
							<select id="sms" name="interested" class="form-control" onchange="sms()">
								<option value="">Send To All</option>
								<option value="6">Send Package Wise</option>
								<option value="7">Send Individual</option>
							</select>
						</div>
						</div>
						<div class="col-sm-6" style="display: none;" id="package">
						<h5>Select Package<span class="text-danger">*</span></h5>
						<div class="controls">
							<select class="form-control" required>
								<option value="">Prime</option>
							</select>
						</div>
						</div>
						<div class="col-sm-6" style="display: none;" id="individual">
						<h5>Enter Individual ID<span class="text-danger">*</span></h5>
						<div class="controls">
							<input type="number" class="form-control" required>
						</div>
						</div>
					 </div>
					</div>
					<div class="form-group">
					 <div class="row">
						<div class="col-sm-12">
						<h5>Message<span class="text-danger">*</span></h5>
						<div class="controls">
							<textarea rows="6" cols="30" class="form-control"></textarea>	
						</div>
						</div>
					 </div>
					</div>
						</div>
					</div>
					<div class="text-xs-right">
						<button type="submit" class="btn btn-lg btn-info">Send SMS</button>
					</div>
					
				</form>
            </div>
            <div class="box-header">
              <h3 class="box-title">Report Data</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-rs">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Send To</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td>01</td>
						<td>Package</td>
						<td>hello Hello hello Hello hello Hello hello Hello </td>
						<td>
                       	<ul class="actions">
                          	<li><a href="#view_message" data-toggle="modal" data-target="#view_message" title="View Message"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                          	<li><a href="#" title="Delete Client"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                        </ul>
                       </td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Sr. No</th>
						<th>Send To</th>
						<th>Message</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
</div>
              
            </div>
            <!-- /.box-body -->
          </div>

  </div>
</div>
 <div id="view_message" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">View Message</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	
        	<div class="col-sm-12 divfix">
        		<h6>Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello </h6>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <?php include('footer.php'); ?>
 