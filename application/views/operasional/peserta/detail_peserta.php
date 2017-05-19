
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
                    <a href="<?php echo base_url('index.php/cpeserta/get_detail_peserta/'.$NOMORPESERTA) ?>" class="btn btn-primary btn-sm">Back&nbsp;&nbsp;<i class="fa fa-arrow-circle-left"></i></a>    
                    <form action="<?php echo base_url('index.php/cpeserta/update_data_peserta/') ?>" class="form-horizontal form-label-left input_mask" id="inline-validate" method="post">
                        <?php                                                                      
                        foreach($hasil as $data) {
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="<?php echo $data->NOMOR_PESERTA;?>" readonly id="required" name="NOMOR_PESERTA" class="form-control col-lg-6">
                            </div>																				
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR_GRUP</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NOMOR_GRUP;?>" readonly  id="required" name="NOMOR_GRUP" class="form-control col-lg-6">
                            </div>																				
                        </div> 
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->NOMOR_PESERTA;?>" id="required" name="NOMOR_PESERTA" class="form-control col-lg-6">
                                </div>																				
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->NAMA;?>" name="NAMA" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">USIA PENSIUN</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text"  value="<?php echo $data->USIA_PENSIUN;?>" name="USIA_PENSIUN" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">JENIS KELAMIN</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text"  value="<?php echo $data->JENIS_KELAMIN;?>"  name="JENIS_KELAMIN" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL MASUK</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->TGL_MASUK;?>"  name="TGL_MASUK" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TEMPAT LAHIR</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->TEMPAT_LAHIR;?>" name="TEMPAT_LAHIR" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL LAHIR</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->TGL_LAHIR;?>" name="TGL_LAHIR" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ALAMAT</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->ALAMAT;?>" name="ALAMAT" class="form-control col-lg-6">
                                </div>
                        </div>                    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL KERJA</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->TGL_KERJA;?>" name="TGL_KERJA" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">GAJI</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->GAJI;?>" name="GAJI" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">PHONE</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->PHONE;?>" name="PHONE" class="form-control col-lg-6">
                                </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">EMAIL</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->EMAIL;?>" name="EMAIL" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">JENIS_INVESTASI</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->JENIS_INVESTASI;?>" name="JENIS_INVESTASI" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">HANDPHONE</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->HANDPHONE;?>" name="HANDPHONE" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE_STATUS</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->KODE_STATUS;?>" name="KODE_STATUS" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR IDENTITAS</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->NOMOR_IDENTITAS;?>" name="NOMOR_IDENTITAS" class="form-control col-lg-6">
                                </div>
                        </div>                    
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE POS</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->KODE_POS;?>" name="KODE_POS" class="form-control col-lg-6">
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NO REKENING</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->NO_REKENING;?>" name="NO_REKENING" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA BANK</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->NAMA_BANK;?>" name="NAMA_BANK" class="form-control col-lg-6">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">PEMILIK REKENING</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" value="<?php echo $data->PEMILIK_REKENING;?>" name="PEMILIK_REKENING" class="form-control col-lg-6">
                                </div>
                        </div>                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">HP_KORESPONDENSI</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->HP_KORESPONDENSI;?>" name="HP_KORESPONDENSI" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ALAMAT_KORESPONDENSI</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->ALAMAT_KORESPONDENSI;?>" name="ALAMAT_KORESPONDENSI" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">IDENTITAS_WNA</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->IDENTITAS_WNA;?>" name="IDENTITAS_WNA" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">STATUS_PERNIKAHAN</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->STATUS_PERNIKAHAN;?>" name="STATUS_PERNIKAHAN" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL_PERNIKAHAN</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->TGL_PERNIKAHAN;?>" name="TGL_PERNIKAHAN" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NO_AGEN</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NO_AGEN;?>" name="NO_AGEN" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA_AGEN</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NAMA_AGEN;?>" name="NAMA_AGEN" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NAMA_PEMBAYAR_IURAN</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NAMA_PEMBAYAR_IURAN;?>" name="NAMA_PEMBAYAR_IURAN" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NO_PENAGIH</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NO_PENAGIH;?>" name="NO_PENAGIH" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">METODE_CHANNEL</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->METODE_CHANNEL;?>" name="METODE_CHANNEL" class="form-control col-lg-6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">HP_KORESPONDENSI</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->HP_KORESPONDENSI;?>" name="HP_KORESPONDENSI" class="form-control col-lg-6">
                            </div>
                        </div>                       
                        <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                        <?php                                                
                        }
                        ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>       
        <!-- /page content -->
