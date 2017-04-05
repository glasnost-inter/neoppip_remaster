<!-- page content -->
        <div role="main">
          <div class="">            
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
							<th>NOMOR BARIS</th>
							<th>TANGGAL</th>
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