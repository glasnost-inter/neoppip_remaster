<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <style>
    .form-control.col-lg-6 {
        width: 50% !important;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        
        <div class="box">
            <header>
                <div class="icons"><i class="glyphicon glyphicon-zoom-in"></i></div>
                <h5>Data Simulasi</h5>
                <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
            </header>
            <div id="collapse3" class="body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpoppeserta/simulasi_peserta_ppukp/'.$nomorpeserta) ?>">
                    <div class="form-group">
                            <label class="control-label col-lg-4">NOMOR PESERTA</label>

                            <div class="col-lg-8">
                                    <input type="text" value="<?php echo $nomorpeserta;?>" id="required" name="required" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">TGL TRANSAKSI</label>

                            <div class="col-lg-8">
                                    <input type="type" value="<?php echo $tgltransaksi;?>" id="email" name="tgltransaksi" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">KODE KLAIM</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo $kodeklaim;?>" id="password" name="kodeklaim" class="form-control col-lg-6">
                            </div>
                    </div>                    
                    <div class="form-actions">
                            <input type="submit" value="Hitung" class="btn btn-primary">
                    </div>                    
                </form>    
            </div>
        </div>
	<div class="box">
            <header>
                <div class="icons"><i class="fa fa-credit-card"></i></div>
                <h5>Data Akumulasi Dana</h5>
                <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
            </header>
            <div id="collapse3" class="body">  
                <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                            <label class="control-label col-lg-4">AKUMULASI IURAN</label>
                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($akumulasi_iuran,2,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">AKUMULASI HASIL</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($akumulasi_hasil,2,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">NILAI TERSEDIA</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($akumulasi_dana,2,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                </form>    
            </div>
        </div>
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-files-o"></i></div>
                <h5>Data Hasil Simulasi</h5>
                <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
            </header>
            <div id="collapse3" class="body">
                <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                            <label class="control-label col-lg-4">NILAI KLAIM HITUNG SYSTEM</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($hasil_simulasi,2,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                </form>    
            </div>
        </div>		
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->