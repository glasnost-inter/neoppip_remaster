<?php
if(isset($hasil)){
    foreach($hasil as $data) {
        $kodeklaim = $data->KODE_KLAIM;
        $tgltransaksi = $data->TGL_KLAIM;
        $nomorpeserta = $data->NOMOR_PESERTA;
        $nomorgrup = $data->NOMOR_GRUP;
        $jumlah_klaim = $data->JUMLAH_KLAIM;
        $nilaiperintah = $data->JUMLAH_KLAIM_PERINTAH;
        $nama_penerima = $data->NAMA_PENERIMA;
        $nomor_bukti = $data->NOMOR_BUKTI;
        $tgl_bayar = $data->TGL_BAYAR;
        $status = $data->STATUS;
        $userrekam = $data->USERREKAM;
        $userupdate = $data->USERUPDATE;
        $tglrekam = $data->TGLREKAM;
        $tglupdate = $data->TGLUPDATE;
        $total_nilai_klaim = $data->TOTAL_NILAI_KLAIM;
        $bunga_real = $data->BUNGA_REAL;
        $cara_bayar = $data->CARA_BAYAR;
        $nomor_rekening = $data->NOMOR_REKENING;
        $kode_kantor = $data->KODE_KANTOR;
        $tgl_otorisasi = $data->TGL_OTORISASI;
        $nomor_pph = $data->NOMOR_PPH;
        $kode_bank = $data->KODE_BANK;
        $prosentase_anuitas = $data->PROSENTASE_ANUITAS;
        $kolektif = $data->KOLEKTIF;
        $status_proses = $data->STATUS_PROSES;
        $tgl_akseptasi = $data->TGL_AKSEPTASI;
        $status_adjust = $data->STATUS_ADJUST;
        $nama_bank = $data->NAMA_BANK;
        $npwp = $data->NPWP;
        $tgl_transfer = $data->TGL_TRANSFER;
        $tgl_surat_konf = $data->TGL_SURAT_KONF;
        $nilai_max = $data->NILAI_MAX;
        $status_kondisi = $data->STATUS_KONDISI;
        $akumulasi_iuran = $data->AKUMULASI_IURAN;
        $akumulasi_hasil = $data->AKUMULASI_HASIL;
        $akumulasi_dana = $data->AKUMULASI_DANA;
        $hasil_simulasi = $data->HASIL_SIMULASI;
        $selisih = $data->SELISIH;
        $nosuratperintah = $data->NO_SURAT_REF;
        $tglsuratperintah = $data->TGL_SURAT_REF;
        $no_surat_konf = $data->NO_SURAT_KONF;
        $selisih_iuran = $data->SELISIH_IURAN;
    }
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
                <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/cklaim/approve_ppukp_konf/') ?>">
                    <div class="form-group">
                        <label class="control-label col-lg-4">NOMOR PESERTA</label>

                        <div class="col-lg-8">
                                <input type="text" value="<?php echo $nomorpeserta;?>" id="required" name="nomorpeserta" class="form-control col-lg-6">
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
                    <div class="form-group">
                    <label class="control-label col-lg-4">NO PESERTA 
                    <?php if(($akumulasi_dana-$nilaiperintah)<0){?>
                            DITARIK IURAN
                    <?php }else{ ?>    
                            PENERIMA IURAN
                    <?php }?>
                    </label>
                        <div class="col-lg-8">
                            <input type="text" value="" placeholder="Silahkan pilih peserta" id="idnomorpeserta" name="nomorpesertalain" class="form-control col-lg-6">                            
                            <?php  
                            $mindana = abs($akumulasi_iuran-$nilaiperintah);
                            
                            if(($akumulasi_dana-$nilaiperintah)<0){?>                                
                                <a href="#" class="btn btn-default btn-s" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/pilih_konfirmasi_selisih_kurang/'.$nomorgrup.'/'.$mindana) ?>',1200,560)">
                                    <i class="fa fa-list"></i>
                                </a>
                            <?php }else{ ?>                                    
                                    <a href="#" class="btn btn-default btn-s" onClick="popitup('<?php echo base_url('index.php/cpoppeserta/pilih_konfirmasi_selisih_lebih/'.$nomorgrup) ?>',1200,560)">
                                        <i class="fa fa-list"></i>
                                    </a>
                            <?php }?>
                        </div>                        
                    </div>                                        
                    <input type="hidden"  value="<?php echo $akumulasi_iuran;?>" id="confirm_password" name="akumulasi_iuran" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $akumulasi_hasil;?>" id="confirm_password" name="akumulasi_hasil" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $akumulasi_dana;?>" id="confirm_password" name="akumulasi_dana" class="form-control col-lg-6">
                    <input type="hidden"  value="<?php echo $hasil_simulasi;?>" id="confirm_password" name="hasil_simulasi" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $nilaiperintah;?>" id="date" name="nilaiperintah" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $akumulasi_dana-$nilaiperintah;?>" id="minsize" name="selisih" class="form-control col-lg-6">                    
                    <input type="hidden" value="<?php echo $akumulasi_iuran-$nilaiperintah;?>" id="minsize" name="selisih_iuran" class="form-control col-lg-6">
                    <input type="hidden" value="<?php echo $nomorgrup;?>" id="minsize" name="nomorgrup" class="form-control col-lg-6">                                                                            
                    <input type="hidden" value="<?php echo $nama_penerima;?>" id="minsize" name="nama_penerima" class="form-control col-lg-6">                                                                            
                    <div class="form-actions">
                            <input type="submit" value="Approve" class="btn btn-primary">
                    </div>                    
                </form>    
            </div>
        </div>
        <!--
	<div class="box">
            <header>
                <div class="icons"><i class="fa fa-credit-card"></i></div>
                <h5>Data Akumulasi Dana</h5>
                <!-- .toolbar ->
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
            </div>            <!-- /.toolbar ->
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
                <!-- .toolbar ->
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
            </div>            <!-- /.toolbar ->
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
                
            </div>
        </div>		
        -->
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