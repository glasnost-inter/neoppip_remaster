<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
				<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpeserta/individu') ?>">                                            
					<div class="col-md-15 col-sm-15 col-xs-12 form-group pull-right top_search">
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="Masukan tahun masuk [yyyy]" name="tahun" id="idnomorgrup">
						<span class="input-group-btn">
						  <!--button class="btn btn-default" type="button" onClick="popitup('<?php echo base_url('index.php/cpopgrup') ?>',800,600)">...</button-->
						  <button class="btn btn-default" type="submit">cari</button>
						</span>
					  </div>
					</div>
				</form>	
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
                      <a href="<?php echo base_url('index.php/cpeserta/get_detail_peserta/'.$NOMORPESERTA) ?>" class="btn btn-primary btn-sm">Back&nbsp;&nbsp;<i class="fa fa-arrow-circle-left"></i></a>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>NO</th>
							<th>NOMOR BARIS</th>
							<th>TANGGAL</th>
							<th>STATUS TRANSAKSI</th>									
							<th>SANDI</th>									
							<th>MUTASI IURAN</th>
							<th>AKUMULASI IURAN</th>
							<th>MUTASI HASIL</th>
							<th>AKUMULASI HASIL</th>
							<th>SALDO DANA</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach($hasil as $data) {
						?>
						<tr>	
							<td><?php echo $no++;?></td>
							<td><?php echo $data->NOMOR_BARIS;?></td>
							<td><?php echo $data->TGL_TRANSAKSI;?></td>
							<td><?php echo $data->NBOB;?></td>
							<td><?php echo $data->KODE_SANDI;?></td>
							<td><?php echo number_format($data->MUTASI_IURAN_IND+$data->MUTASI_IURAN_PERS,0,",",".");?></td>
							<td><?php echo number_format($data->AKUMULASI_IURAN_IND+$data->AKUMULASI_IURAN_PERS,0,",",".");?></td>
							<td><?php echo number_format($data->MUTASI_HASIL,0,",",".");?></td>
							<td><?php echo number_format($data->AKUMULASI_HASIL,0,",",".");?></td>
							<td><?php echo number_format($data->AKUMULASI_DANA,0,",",".");?></td>
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