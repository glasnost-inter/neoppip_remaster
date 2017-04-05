
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
                    <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cklaim/simpan_data_mutasi/') ?>">                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NO MUTASI</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $NO_MUTASI;?>" id="email" name="NO_MUTASI" placeholder="Terisi Otomatis" class="form-control col-lg-6" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL MUTASI</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $TGL_MUTASI;?>" id="email" name="TGL_MUTASI" placeholder="dd/mm/yyyy" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR GRUP</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text"  value="<?php echo $NOMOR_GRUP;?>" id="idnomorgrup" placeholder="Silahkan dipilih dengan tombol"   name="NOMOR_GRUP" class="form-control col-lg-6" readonly="true">
                            <a href="#" class="btn btn-default btn-s" onClick="popitup('<?php echo base_url('index.php/cpopgrup') ?>',800,600)">
                                <i class="fa fa-list"></i>
                            </a>
                        </div>
                    </div>                     
                    <div class="form-group">    
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NO SURAT PERINTAH</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $NO_SURAT_REF;?>" placeholder="no surat dari nasabah" id="idnilaiperintah" name="NO_SURAT_REF" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL SURAT PERINTAH</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $TGL_SURAT_REF;?>" placeholder="dd/mm/yyyy" id="idnilaiperintah" name="TGL_SURAT_REF" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL ESTIMASI BAYAR</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" value="<?php echo $TGL_ESTIMASI_BAYAR;?>" placeholder="dd/mm/yyyy" id="idnilaiperintah" name="TGL_ESTIMASI_BAYAR" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-actions">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <?php
                            if($NO_MUTASI){
                                ?>
                                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-primary" id="toggleFullScreen" href="<?php echo base_url('index.php/cklaim/entry_peserta_mutasi/'.$NO_MUTASI.'/'.$NOMOR_GRUP) ?>">                                                                         
                                    Tambahkan Peserta
                                </a>
                                <?php
                            }
                            ?>
                    </div>                    
                </form>
                  </div>
                </div>
              </div>
            </div>       
        <!-- /page content -->
