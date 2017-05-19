<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
				<form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpeserta/get_detail_peserta') ?>">                                            
					<div class="col-md-15 col-sm-15 col-xs-12 form-group pull-right top_search">
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="Masukan nomor peserta" name="nomor_peserta" id="idnomorpeserta">
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
                    </p>    
                        
                        <?php
                        $no = 1;                                                                
                        if(isset($hasil)){
                        foreach($hasil as $data) {
                        ?>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA</label>                                                
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>                                                
                                <label class="control-label col-md-8 col-sm-8 col-xs-11"><?php echo $data->NOMOR_PESERTA;?></label>
                        </div>
                        <br/>    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR GRUP</label>                                                
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>                                                
                                <label class="control-label col-md-8 col-sm-8 col-xs-11"><?php echo $data->NOMOR_GRUP;?></label>
                        </div>
                        <br/>    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NPWP</label>                                                
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>                                                
                                <label class="control-label col-md-8 col-sm-8 col-xs-11"><?php echo $data->NPWP;?></label>
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NAMA;?></label>
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">USIA PENSIUN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->USIA_PENSIUN;?></label>
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">JENIS KELAMIN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->JENIS_KELAMIN;?></label>    							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL MASUK</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->TGL_MASUK;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TEMPAT LAHIR</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->TEMPAT_LAHIR;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL LAHIR</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->TGL_LAHIR;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ALAMAT</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->ALAMAT;?></label>							
                        </div>
                        <br/>                    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL KERJA</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->TGL_KERJA;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">GAJI</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->GAJI;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TELEPON RUMAH</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->PHONE;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">EMAIL</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->EMAIL;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">HANDPHONE</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->HANDPHONE;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">JENIS_INVESTASI</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->JENIS_INVESTASI;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE_STATUS KEPESERTAAN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->KODE_STATUS;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR_IDENTITAS</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NOMOR_IDENTITAS;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE POS</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->KODE_POS;?></label>							
                        </div>
                        <br/>						
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NO REKENING</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NO_REKENING;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA BANK</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NAMA_BANK;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">PEMILIK REKENING</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->PEMILIK_REKENING;?></label>							
                        </div>

                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">HANDPHONE KORESPONDENSI</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->HP_KORESPONDENSI;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ALAMAT KORESPONDENSI</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->ALAMAT_KORESPONDENSI;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">IDENTITAS_WNA</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->IDENTITAS_WNA;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">STATUS_PERNIKAHAN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->STATUS_PERNIKAHAN;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL_PERNIKAHAN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->TGL_PERNIKAHAN;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NO_AGEN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NO_AGEN;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA_AGEN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NAMA_AGEN;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA_PEMBAYAR_IURAN</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NAMA_PEMBAYAR_IURAN;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NO_PENAGIH</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->NO_PENAGIH;?></label>							
                        </div>
                        <br/>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">METODE_CHANNEL</label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-1">:</label>
                                <label class="col-md-8 col-sm-8 col-xs-11"><?php echo $data->METODE_CHANNEL;?></label>							
                        </div>
                        <br/>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                                <a href="<?php echo base_url('index.php/cpeserta/detail_peserta/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Update&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>						
                                <a href="<?php echo base_url('index.php/cdokumen/daftar_dokumen_peserta/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Dokumen&nbsp;&nbsp;<i class="fa fa-folder-open-o"></i></a>						
                                <a href="<?php echo base_url('index.php/cpeserta/historis_investasi_peserta/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Perubahan Paket&nbsp;&nbsp;<i class="fa fa-line-chart"></i></a>						
                                <a href="<?php echo base_url('index.php/cbukudana/get_buku_dana/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Buku Dana&nbsp;&nbsp;<i class="fa fa-book"></i></a>						
                                <a href="<?php echo base_url('index.php/cpeserta/historis_perubahan_grup/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Historis Update&nbsp;&nbsp;<i class="fa fa-history"></i></a>						
                                <a href="<?php echo base_url('index.php/cdokumen/daftar_dokumen_peserta/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Ucapan Terima Kasih&nbsp;&nbsp;<i class="fa fa-envelope-o"></i></a>						
                                <a href="<?php echo base_url('index.php/cdokumen/proses_klaim/'.$data->NOMOR_PESERTA) ?>" class="btn btn-primary btn-sm">Proses Klaim&nbsp;&nbsp;<i class="fa fa-money"></i></a>						
                        </div>

                        <?php
                        }
                        }        
                        ?>															
                  </div>
                </div>
              </div>
                           
             </div>
          </div>
        </div>
        <!-- /page content -->