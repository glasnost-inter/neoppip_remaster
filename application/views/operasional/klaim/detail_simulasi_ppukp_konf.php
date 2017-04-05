<?php
//var_dump($hasil); die;
foreach($hasil as $data) {
    $kodeklaim = $data->KODE_KLAIM;
    $tgltransaksi = $data->TGL_KLAIM;
    $nomorpeserta = $data->NOMOR_PESERTA;
    $nomorgrup = $data->NOMOR_GRUP;
    $nilaiperintah = $data->JUMLAH_KLAIM_PERINTAH;
    $nama_penerima = $data->NAMA_PENERIMA;
    $status = $data->STATUS;
    $userrekam = $data->USERREKAM;
    $userupdate = $data->USERUPDATE;
    $tglrekam = $data->TGLREKAM;
    $tglupdate = $data->TGLUPDATE;
    $cara_bayar = $data->CARA_BAYAR;
    $status_proses = $data->STATUS_PROSES;
    $akumulasi_iuran = $data->AKUMULASI_IURAN;
    $akumulasi_hasil = $data->AKUMULASI_HASIL;
    $akumulasi_dana = $data->AKUMULASI_DANA;
    $hasil_simulasi = $data->HASIL_SIMULASI;
    $selisih = $data->SELISIH;
    $selisih_iuran = $data->SELISIH_IURAN;
    $nosuratperintah = $data->NO_SURAT_REF;
    $tglsuratperintah = $data->TGL_SURAT_REF;
}
?>
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
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpeserta/simulasi_ppukp_konf/'.$nomorpeserta) ?>">
                    <div class="form-group">
                        <label class="control-label col-lg-4">NOMOR PESERTA</label>

                        <div class="col-lg-8">
                                <input type="text" value="<?php echo $nomorpeserta;?>" id="required" name="required" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">TGL TRANSAKSI</label>

                        <div class="col-lg-8">
                                <input type="text" value="<?php echo $tgltransaksi;?>" id="email" name="tgltransaksi" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">KODE KLAIM</label>

                        <div class="col-lg-8">
                                <input type="text"  value="<?php echo $kodeklaim;?>" id="password" name="kodeklaim" class="form-control col-lg-6">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-lg-4">NILAI KLAIM PERINTAH</label>
                        <div class="col-lg-8">
                            <input type="text" value="<?php echo number_format($nilaiperintah,0,',','.');?>" id="idnilaiperintah" name="nilaiperintah" class="form-control col-lg-6">
                        </div>
                    </div>    
                    <div class="form-group">    
                    <label class="control-label col-lg-4">NO SURAT PERINTAH</label>
                        <div class="col-lg-8">
                            <input type="text" value="<?php echo $nosuratperintah;?>" placeholder="no surat dari nasabah" id="idnilaiperintah" name="nosuratperintah" class="form-control col-lg-6">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-lg-4">TGL SURAT PERINTAH</label>
                        <div class="col-lg-8">
                            <input type="text" value="<?php echo $tglsuratperintah;?>" placeholder="dd/mm/yyyy" id="idnilaiperintah" name="tglsuratperintah" class="form-control col-lg-6">
                        </div>
                    </div>
                    <!--div class="form-actions">
                            <input type="submit" value="Hitung" class="btn btn-primary">
                    </div-->                    
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
                                    <input type="text"  value="<?php echo number_format($akumulasi_iuran,0,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">AKUMULASI HASIL</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($akumulasi_hasil,0,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">NILAI TERSEDIA</label>

                            <div class="col-lg-8">
                                    <input type="text"  value="<?php echo number_format($akumulasi_dana,0,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
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
                                <input type="text"  value="<?php echo number_format($hasil_simulasi,0,',','.');?>" id="confirm_password" name="confirm_password" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">NILAI KLAIM PERINTAH</label>

                            <div class="col-lg-8">
                                <input type="text" value="<?php echo number_format($nilaiperintah,0,',','.');?>" id="date" name="date" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">SELISIH ANTARA AKUMULASI DANA DAN PERINTAH BAYAR</label>

                            <div class="col-lg-8">
                                <input type="text" value="<?php echo number_format($akumulasi_dana-$nilaiperintah,0,',','.');?>" id="minsize" name="minsize" class="form-control col-lg-6">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-lg-4">SELISIH ANTARA AKUMULASI IURAN DAN PERINTAH BAYAR</label>

                            <div class="col-lg-8">
                                <input type="text" value="<?php echo number_format($akumulasi_iuran-$nilaiperintah,0,',','.');?>" id="minsize" name="minsize" class="form-control col-lg-6">
                            </div>
                    </div>
                </form>
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cpeserta/simpan_simulasi_ppukp_konf/'.$nomorpeserta) ?>">                    
                    <input type="hidden" value="<?php echo $nomorpeserta;?>" id="required" name="nomorpeserta" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $tgltransaksi;?>" id="email" name="tgltransaksi" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $kodeklaim;?>" id="password" name="kodeklaim" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $nilaiperintah;?>" id="idnilaiperintah" name="nilaiperintah" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $akumulasi_iuran;?>" id="confirm_password" name="akumulasi_iuran" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $akumulasi_hasil;?>" id="confirm_password" name="akumulasi_hasil" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $akumulasi_dana;?>" id="confirm_password" name="akumulasi_dana" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $hasil_simulasi;?>" id="confirm_password" name="hasil_simulasi" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $nilaiperintah;?>" id="date" name="nilaiperintah" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $akumulasi_dana-$nilaiperintah;?>" id="minsize" name="selisih" class="form-control col-lg-6">                    
                    <input type="hidden" value="<?php echo $akumulasi_iuran-$nilaiperintah;?>" id="minsize" name="selisih_iuran" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $nosuratperintah;?>" placeholder="no surat dari nasabah" id="idnilaiperintah" name="nosuratperintah" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $tglsuratperintah;?>" placeholder="dd/mm/yyyy" id="idnilaiperintah" name="tglsuratperintah" class="form-control col-lg-6">
                    <?php if($nilaiperintah<>0){ 
                            $mindana = abs($akumulasi_iuran-$nilaiperintah);
                        ?>
                        <input type="button" value="Surat Konfirmasi" onClick="popitup('<?php echo base_url('index.php/cpopklaim/cetak_konfirmasi_selisih/'.$nomorpeserta.'/'.$kodeklaim.'/'.str_replace("/", "-", $tgltransaksi)) ?>',850,575)" class="btn btn-primary">                        
                        <?php if(($akumulasi_dana-$nilaiperintah)<0){?>
                            <input type="button" value="Lampiran" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/cetak_lampiran_konfirmasi_selisih_kurang/'.$nomorgrup.'/'.$mindana) ?>',850,575)" class="btn btn-primary">
                    <?php }else{ ?>    
                            <input type="button" value="Lampiran" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/cetak_lampiran_konfirmasi_lebih/'.$nomorgrup) ?>',850,575)" class="btn btn-primary">
                    <?php }                         
                    }?>
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