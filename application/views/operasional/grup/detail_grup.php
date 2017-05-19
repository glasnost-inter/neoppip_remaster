
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NOMOR PESERTA</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" value="<?php echo $data->NOMOR_GRUP;?>" readonly  id="required" name="NOMOR_GRUP" class="form-control col-lg-6">
                            </div>																				
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
