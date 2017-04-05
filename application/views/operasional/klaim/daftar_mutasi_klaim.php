<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="page-title">              
              <div class="title_left">
				<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cklaim/filtermutasiklaim') ?>">                                            
					<div class="col-md-15 col-sm-15 col-xs-12 form-group pull-right top_search">
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="Masukan nomor grup..." name="nomorgrup" id="idnomorgrup">
						<span class="input-group-btn">
						  <button class="btn btn-default" type="button" onClick="popitup('<?php echo base_url('index.php/cpopgrup') ?>',800,600)">...</button>
						  <button class="btn btn-default" type="submit">cari</button>
						</span>
					  </div>
					</div>
				</form>					
				<div class="form-group">
					<div class="col-lg-1">                                                    
						<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-primary" id="toggleFullScreen" href="<?php echo base_url('index.php/cklaim/entry_data_mutasi/') ?>">                                                                         
							Mutasi Baru
						</a>
					</div>                                                
				</div> 
				<br><br>
              </div>
            </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">              
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Transaksi <!--small>Users</small--></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <!--The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.-->
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
						<tr>
							<th>NO</th>
							<th>NOMOR MUTASI</th>
							<th>TGL MUTASI</th>
							<th>USER TGL ENTRY</th>
							<th>NO SURAT TGL REFERENSI</th>                                                            
							<th>NO SURAT TGL KONFIRMASI</th>                                                            
							<th>ACTION</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;  
						if (isset($hasil)){	
							foreach($hasil as $data) {
							?>
							<tr>									
								<td><?php echo $no++;?></td>
								<td><?php echo $data->NO_MUTASI;?></td>
								<td><?php echo $data->TGL_MUTASI;?></td>
								<td><?php echo $data->USER_REKAM;?><br><?php echo $data->TGL_REKAM;?></td>
								<td><?php echo $data->NO_SURAT_REF;?><br><?php echo $data->TGL_SURAT_REF;?></td>
								<td><?php echo $data->NO_SURAT_KONF;?><br><?php echo $data->TGL_SURAT_KONF;?></td>                                                                
								<td>                                                                    
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="<?php echo base_url('index.php/cklaim/entry_peserta_mutasi/'.$data->NO_MUTASI.'/'.$data->NOMOR_GRUP) ?>">
										 <i class="glyphicon glyphicon-list-alt"></i>
									</a>                                                                                                                                       
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="#" onClick="popitup('<?php echo base_url('index.php/cpopklaim/cetak_konfirmasi_mutasi/'.$data->NO_MUTASI) ?>',850,575)">
										 <i class="glyphicon glyphicon-print"></i>
									</a>
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="#" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/cetak_lampiran_konfirmasi_lebih/'.$data->NOMOR_GRUP) ?>',850,575)">
										 <i class="fa fa-file-text-o"></i>
									</a>
									
									<?php                                                                     
									if($data->NO_SIP1==''){
									?>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="<?php echo base_url('index.php/cklaim/generate_sip/'.$data->NO_MUTASI.'/ADMIN/'.$data->NOMOR_GRUP) ?>">
										 <i class="glyphicon glyphicon-export"></i>
									</a>
									<?php 
									}
									?>
									
									 
									<?php 
									/*
									if($data->STATUS=='1'){
									?>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											href="<?php echo base_url('index.php/cklaim/approval_simulasi_ppukp_konf/'.$data->NOMOR_PESERTA.'/'.$data->KODE_KLAIM.'/'.$data->TGL_KLAIM) ?>">
											 <i class="fa fa-check-square"></i>
										</a>
									<?php 
									}elseif($data->STATUS=='2'){
									?>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											href="<?php echo base_url('index.php/cklaim/gen_sip/'.$data->NOMOR_PESERTA.'/'.$data->KODE_KLAIM.'/'.$data->TGL_KLAIM) ?>">
											 <i class="glyphicon glyphicon-export"></i>
										</a>
									<?php 
									}*/
									?>
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen">
										 <i class="fa fa-folder-open-o"></i>
									 </a>
								</td>
							</tr>
							<?php
							}
						}
						?>									
						</tbody>   
					</table>
                  </div>
                </div>
              </div>
                           
             </div>
          </div>
        </div>
        <!-- /page content -->