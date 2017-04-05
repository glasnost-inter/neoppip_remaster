<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar Transaksi</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
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
							<th>NOMOR PESERTA</th>
							<th>NAMA PENERIMA</th>
							<th>KODE KLAIM</th>
							<th>TGL KLAIM</th>
							<th>AKUMULASI DANA</th>
							<th>PERINTAH BAYAR</th>
							<th>ACTION</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;                                                                
							foreach($hasil as $data) {
							?>
							<tr>									
								<td><?php echo $data->NOMOR_PESERTA;?></td>
								<td><?php echo $data->NAMA_PENERIMA;?></td>
								<td><?php echo $data->KODE_KLAIM;?></td>
								<td><?php echo $data->TGL_KLAIM;?></td>
								<td><?php echo number_format($data->AKUMULASI_DANA,2,',','.');?></td>
								<td><?php echo number_format($data->JUMLAH_KLAIM_PERINTAH,2,',','.');?></td>
								<td>
									<?php /*if($program_grup=='4'){ ?>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											onClick="popitup('<?php echo base_url('index.php/cpopbukudana/get_buku_dana_ind_ppukp/'.$data->NOMOR_PESERTA) ?>',850,575)">
											 <i class="fa fa-book"></i>
										</a>                                                                        
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											onClick="popitup('<?php echo base_url('index.php/cpoppeserta/simulasi_peserta_ppukp/'.$data->NOMOR_PESERTA) ?>',850,825)">
											 <i class="fa fa-money"></i>
										</a>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											href="<?php echo base_url('index.php/cpeserta/simulasi_ppukp_konf/'.$data->NOMOR_PESERTA) ?>">
											 <i class="fa fa-pencil-square-o"></i>
										</a>
									<?php }else{ ?>
										<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
											class="btn btn-default btn-sm" id="toggleFullScreen"
											onClick="popitup('<?php echo base_url('index.php/cpopbukudana/get_buku_dana/'.$data->NOMOR_PESERTA) ?>',850,575)">
											 <i class="fa fa-book"></i>
										 </a>
									<?php }*/ ?>
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="<?php echo base_url('index.php/cklaim/detail_simulasi_ppukp_konf/'.$data->NOMOR_PESERTA.'/'.$data->KODE_KLAIM.'/'.$data->TGL_KLAIM) ?>">
										 <i class="glyphicon glyphicon-list-alt"></i>
									</a>
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen"
										href="<?php echo base_url('index.php/cklaim/rekalkulasi_simulasi_ppukp_konf/'.$data->NOMOR_PESERTA.'/'.$data->KODE_KLAIM.'/'.$data->TGL_KLAIM) ?>">
										 <i class="glyphicon glyphicon-edit"></i>
									</a>
									<?php 
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
									}
									?>
									<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
										class="btn btn-default btn-sm" id="toggleFullScreen">
										 <i class="fa fa-folder-open-o"></i>
									 </a>
								</td>
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
          </div>
        </div>
        <!-- /page content -->