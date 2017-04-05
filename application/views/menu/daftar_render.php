<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            
 <!--Begin Datatables-->
			<div class="row">
			  <div class="col-lg-12">
					<div class="box">
						<header>
							<div class="icons"><i class="fa fa-table"></i></div>
							<h5>Dynamic Table</h5>
						</header>
						<div id="collapse4" class="body">
							<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
								<tr>
									<th>KODE_MENU</th>
									<th>NAMA_MENU</th>
									<th>LABEL</th>									
									<th>LVL</th>									
									<th>KODE_INDUK</th>									
									<th>URL</th>									
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach($hasil as $data) {
								?>
								<tr>									
									<td><?php echo $data->KODE_MENU;?></td>
									<td><?php echo $data->NAMA_MENU;?></td>
									<td><?php echo $data->LABEL;?></td>
									<td><?php echo $data->LVL;?></td>
									<td><?php echo $data->KODE_INDUK;?></td>
									<td><?php echo $data->URL;?></td>
								</tr>
								<?php
								}
								?>									
								</tbody>                
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
			<!--End Datatables-->
			
			
			
			
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
</div>
<!-- /#content -->