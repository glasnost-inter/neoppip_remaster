<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="page-title">              
              <div class="title_left">
				<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cklaim/simpan_peserta_mutasi/'.$NO_MUTASI.'/'.$NOMOR_GRUP) ?>">                                            
					<div class="col-md-15 col-sm-15 col-xs-12 form-group pull-right top_search">
					  <div class="input-group">
						<!--input type="text" class="form-control" placeholder="Masukan nomor grup..." name="nomorgrup" id="idnomorgrup"-->
						<input type="text" name="NOMOR_PESERTA" id="idnomorgrup" placeholder="Masukan Nomor Peserta..." class="form-control"> 
						<span class="input-group-btn">
						  <button class="btn btn-default" type="button" onClick="popitup('<?php echo base_url('index.php/Cpoppeserta/popfilterpesertagrup/'.$NOMOR_GRUP) ?>',780,550)">...</button>
						  <button class="btn btn-default" type="submit">simpan</button>
						</span>
					  </div>
					</div>
				</form>					
				<div class="form-group">
					<div class="col-lg-1">                                                    
						<a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-primary" id="toggleFullScreen" href="<?php echo base_url('index.php/cklaim/filtermutasiklaim/'.$NOMOR_GRUP) ?>">                                                                         
							Daftar Mutasi Grup
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
                                                            <th>NOMOR PESERTA</th>
                                                            <th>NILAI TERSEDIA</th>
                                                            <th>NILAI PERINTAH</th>
                                                            <th>NILAI DISEPAKATI</th>                                                                                                                        
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
                                                                <td><?php echo $data->NOMOR_PESERTA;?></td>
                                                                <td><?php echo number_format($data->NILAI_TERSEDIA,0,',','.');?></td>
                                                                <td><?php echo number_format($data->NILAI_PERINTAH,0,',','.');?></td>
                                                                <td><?php echo number_format($data->NILAI_DISEPAKATI,0,',','.');?></td>                                                                
                                                                <td>                                                                                                                                        
                                                                    <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                                                        class="btn btn-default btn-sm" id="toggleFullScreen"
                                                                        href="<?php echo base_url('index.php/cklaim/update_nilai_peserta/'.$data->NO_MUTASI.'/'.$data->NOMOR_PESERTA) ?>">
                                                                         <i class="glyphicon glyphicon-edit"></i>
                                                                    </a> 
                                                                    <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                                                        class="btn btn-default btn-sm" id="toggleFullScreen"
                                                                        href="<?php echo base_url('index.php/cklaim/delete_nilai_peserta/'.$data->NO_MUTASI.'/'.$data->NOMOR_PESERTA) ?>">
                                                                         <i class="glyphicon glyphicon-trash"></i>
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