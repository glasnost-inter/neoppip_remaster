
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
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
                    <br />
                    <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cklaim/simpan_update_nilai_peserta/') ?>">                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NO MUTASI</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $NO_MUTASI;?>" id="email" name="NO_MUTASI" placeholder="Terisi Otomatis" class="form-control col-lg-6" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $NOMOR_PESERTA;?>" id="email" name="NOMOR_PESERTA" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA PENERIMA/DITARIK</label>
                        
                        <div class="col-md-9 col-sm-9 col-xs-12">                            
                            <input type="text"  value="<?php echo $NOMOR_PESERTA_PENERIMA_DITARIK;?>" id="idnomorpeserta" placeholder="Silahkan dipilih dengan tombol"   name="NOMOR_PESERTA_PENERIMA_DITARIK" class="form-control col-lg-6" readonly="true">                            
                            <?php
                            if($SELISIH > 0){
                            ?>
                                <a href="#" class="btn btn-default btn-s" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/pilih_konfirmasi_selisih_lebih/'.$NOMOR_GRUP) ?>',920,790)">
                                    <i class="fa fa-list"></i>
                                </a>
                            <?php
                            }else if($SELISIH < 0){
                            ?>
                                <a href="#" class="btn btn-default btn-s" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/pilih_konfirmasi_selisih_kurang/'.$NOMOR_GRUP.'/'.$SELISIH) ?>',920,790)">
                                    <i class="fa fa-list"></i>
                                </a>
                            <?php
                            }
                            ?>                            
                            <br>
                            Pilih peserta yang Disepakati Setelah Konfirmasi
                        </div>
                        
                    </div>                     
                    <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NILAI TERSEDIA</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo number_format($NILAI_TERSEDIA,0,',','.');?>" id="idnilaiperintah" name="NILAI_TERSEDIA" class="form-control col-lg-6" readonly="true"> 
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NILAI PERINTAH</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo number_format($NILAI_PERINTAH,0,',','.');?>" placeholder="Nilai Perintah Nasabah" id="idnilaiperintah" name="NILAI_PERINTAH" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">SELISIH</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo number_format($SELISIH,0,',','.');?>" placeholder="Nilai Perintah Nasabah" id="idnilaiperintah" name="SELISIH" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NILAI DISEPAKATI</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo number_format($NILAI_DISEPAKATI,0,',','.');?>" placeholder="Isikan Nilai Yang Disepakati Setelah Konfirmasi" id="idnilaiperintah" name="NILAI_DISEPAKATI" class="form-control col-lg-6">
                            <br>
                            <br>
                            Isikan Nilai Yang Disepakati Setelah Konfirmasi
                        </div>                        
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Simpan" class="btn btn-primary">                            
                        <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-primary" id="toggleFullScreen" href="<?php echo base_url('index.php/cklaim/entry_peserta_mutasi/'.$NO_MUTASI.'/'.$NOMOR_GRUP) ?>">                                                                         
                            Edit Peserta Lain
                        </a>                            
                    </div>                    
                </form> 
                  </div>
                </div>
              </div>
            </div>       
        <!-- /page content -->
