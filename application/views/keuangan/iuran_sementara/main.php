<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="page-title">
              <div class="title_left">
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cakuntansi/get_rekap_iuran_aktif') ?>">                                            
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
                            <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL TRANSAKSI</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="" id="required" name="TGL_TRANSAKSI" class="form-control col-lg-6">
                               </div>																				
                            </div>
                            <div class="form-group">
                               <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE BANK</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                   <select class="form-control" name="KODE_BANK">
                                        <option>BNI</option>
                                        <option>MANDIRI</option>                            
                                   </select>
                               </div>																				
                            </div>                            
                            <div class="ln_solid"></div>
                            <div class="form-actions">                                
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <input type="submit" value="Search" class="btn btn-primary">
                               </div>
                            </div>
                          </div>
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
                    <h2>Detail Rekap</h2>
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
                        <?php
                        $no = 1;                                                                
                        if(isset($hasil)){
                            foreach($hasil as $data) {
                            $id_rekap = $data->ID_REKAP_IURAN;
                            $tgl_transaksi = $data->TGL_TRANSAKSI;
                            $kd_bank = $data->KODE_BANK;                            
                            ?>                          
                      <a href="<?php echo base_url('index.php/cakuntansi/gen_jurnal_rekap_iuran_aktif/'.$data->ID_REKAP_IURAN.'/'.str_replace('/','.',$data->TGL_TRANSAKSI).'/'.$data->KODE_BANK) ?>" class="btn btn-primary btn-sm">Generate Jurnal&nbsp;&nbsp;<i class="fa fa-refresh"></i></a>    
                      <form action="<?php echo base_url('index.php/cpeserta/update_data_peserta/') ?>" class="form-horizontal form-label-left input_mask" id="inline-validate" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID REKAP</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->ID_REKAP_IURAN;?>" name="KODE_BANK" class="form-control col-lg-6">
                                </div>																				
                             </div>                             
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL TRANSAKSI</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                     <input type="text" value="<?php echo $data->TGL_TRANSAKSI;?>" name="TGL_TRANSAKSI" class="form-control col-lg-6">
                                </div>																				
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">KODE BANK</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->KODE_BANK;?>" name="KODE_BANK" class="form-control col-lg-6">
                                </div>																				
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">IURAN</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo number_format($data->IURAN,2,',','.');?>" name="IURAN" class="form-control col-lg-6">
                                </div>																				
                             </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">USER ENTRY</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->USER_ENTRY;?>" name="USER_ENTRY" class="form-control col-lg-6">
                                </div>																				
                             </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TGL ENTRY</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->TGL_ENTRY;?>" name="TGL_ENTRY" class="form-control col-lg-6">
                                </div>																				
                             </div> 
                           </form>
                            <?php
                            }
                        }else{
                        ?>
                        <a href="<?php echo base_url('index.php/cakuntansi/gen_rekap_iuran_aktif/'.str_replace('/','.',$TGL_TRANSAKSI).'/'.$KODE_BANK) ?>" class="btn btn-primary btn-sm">Generate Rekap&nbsp;&nbsp;<i class="fa fa-refresh"></i></a>    
                        <?php
                        }        
                        ?>                   
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
                          <?php
                          if($id_rekap<>''){
                          ?>  
                          <!--The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.-->
                          <a href="<?php echo base_url('index.php/cakuntansi/entry_tambahan_iuran_sementara/'.str_replace('.','/',$tgl_transaksi).'/'.$kd_bank.'/'.$id_rekap) ?>" class="btn btn-primary btn-sm">New&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                          <a href="<?php echo base_url('index.php/cakuntansi/upload_tambahan_iuran_sementara/'.str_replace('.','/',$tgl_transaksi).'/'.$kd_bank.'/'.$id_rekap) ?>" class="btn btn-primary btn-sm">Upload&nbsp;&nbsp;<i class="fa fa-upload"></i></a>
                          <?php
                          }
                          ?>
                        </p>                                                          

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Id Iuran Sementara</th>                                                                              
                              <th>Iuran</th>
                              <th>Keterangan</th>
                              <th>Retur/Identifikasi</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            if(isset($hasil2)){
                                foreach($hasil2 as $data) {						 
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data->ID_IURAN_SEMENTARA;?></td>                                
                                    <td><?php echo number_format($data->IURAN,2,",",".");?></td>
                                    <td><?php echo $data->KETERANGAN;?></td>						                                                            
                                    <td><?php echo $data->KETERANGAN_IDENTIFIKASI.$data->KETERANGAN_RETUR;?></td>						                                                            
                                    <td><a href="<?php echo base_url('index.php/cakuntansi/update_iuran_sementara/'.$data->ID_IURAN_SEMENTARA) ?>" class="btn btn-primary btn-sm">Update&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url('index.php/cakuntansi/delete_iuran_sementara/'.$data->ID_IURAN_SEMENTARA.'/'.str_replace('.','/',$tgl_transaksi).'/'.$kd_bank.'/'.$data->ID_REKAP) ?>" class="btn btn-primary btn-sm">Hapus&nbsp;&nbsp;<i class="fa fa-remove"></i></a>
                                        <?php if ((isset($data->KETERANGAN_IDENTIFIKASI) || isset($data->KETERANGAN_RETUR))==FALSE){?>
                                        <a href="<?php echo base_url('index.php/cakuntansi/entry_retur_iuran_sementara/'.$data->ID_IURAN_SEMENTARA) ?>" class="btn btn-primary btn-sm">Retur&nbsp;&nbsp;<i class="fa fa-rotate-left"></i></a>
                                        <a href="<?php echo base_url('index.php/cakuntansi/entry_pembukuan_iuran_sementara/'.$data->ID_IURAN_SEMENTARA.'/'.str_replace('.','/',$tgl_transaksi).'/'.$kd_bank.'/'.$data->ID_REKAP) ?>" class="btn btn-primary btn-sm">Teridentifikasi&nbsp;&nbsp;<i class="fa fa-book"></i></a>
                                        <?php } ?>
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