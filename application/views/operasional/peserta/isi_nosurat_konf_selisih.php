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
                <h5>Data Surat</h5>
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
                <form action="<?php echo base_url('index.php/cpoppeserta/cetak_konfirmasi_selisih') ?>" method="post" class="form-horizontal" id="inline-validate">                    
                    <div class="form-group">
                        <label class="control-label col-lg-4">NOMOR PESERTA</label>

                        <div class="col-lg-8">
                            <input type="text" value="<?php echo $nomorpeserta;?>" id="idnomorpeserta" name="nomorpeserta" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">NOMOR SURAT</label>

                        <div class="col-lg-8">
                            <input type="text" value="<?php echo $nomorsurat;?>" id="idnomorsurat" name="nomorsurat" class="form-control col-lg-6">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-lg-4">TGL SURAT</label>

                        <div class="col-lg-8">
                            <input type="text" value="<?php echo $tglsurat;?>" id="idnomorsurat" name="tglsurat" class="form-control col-lg-6">
                        </div>
                    </div>        
                    <div class="form-actions">
                        <input type="hidden" value="<?php echo $kodeklaim;?>" id="idnomorpeserta" name="kodeklaim" class="form-control col-lg-6">
                        <input type="hidden" value="<?php echo $tglklaim;?>" id="idnomorpeserta" name="tglklaim" class="form-control col-lg-6">
                        <input type="submit" value="Update" class="btn btn-primary">
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