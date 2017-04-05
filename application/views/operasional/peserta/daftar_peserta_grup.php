<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">              
              <div class="title_left">
				<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpeserta/filtergrup') ?>">                                            
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
															<th>NOMOR_PESERTA</th>
															<th>NAMA_PESERTA</th>
															<th>TGL_MASUK</th>
															<th>TGL_LAHIR</th>
															<th>GAJI</th>
															<th>ACTION</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $no = 1;   
														if(isset($hasil)){		
                                                            foreach($hasil as $data) {
                                                            ?>
                                                            <tr>									
                                                                    <td><?php echo $data->NOMOR_PESERTA;?></td>
                                                                    <td><?php echo $data->NAMA;?></td>
                                                                    <td><?php echo $data->TGL_MASUK;?></td>
                                                                    <td><?php echo $data->TGL_LAHIR;?></td>
                                                                    <td><?php echo number_format($data->GAJI,2,',','.');?></td>
                                                                    <td><a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                                                            class="btn btn-default btn-sm" id="toggleFullScreen"
                                                                            href="#" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/detail_peserta/'.$data->NOMOR_PESERTA) ?>',850,575)">
                                                                             <i class="glyphicon glyphicon-zoom-in"></i>
                                                                         </a>
                                                                        <?php if($program_grup=='4'){ ?>
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
                                                                        <?php } ?>
                                                                        <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                                                            class="btn btn-default btn-sm" id="toggleFullScreen"
                                                                            onClick="popitup('<?php echo base_url('index.php/cpoppeserta/isi_nosurat_konf_kartu/'.$data->NOMOR_PESERTA) ?>',850,575)">
                                                                             <i class="glyphicon glyphicon-barcode"></i>
                                                                         </a>
                                                                        <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                                                            class="btn btn-default btn-sm" id="toggleFullScreen"
                                                                            href="<?php echo base_url('index.php/cpeserta/detail_peserta/'.$data->NOMOR_PESERTA) ?>">
                                                                             <i class="glyphicon glyphicon-edit"></i>
                                                                        </a>
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