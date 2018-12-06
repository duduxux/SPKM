<html>
    <?php foreach ($contents as $content) { ?>
        <div class="container">
            <div>
                <div>
                    <h3><?php echo $content['judul_proker'];?></h3>
                    <p>Kementrian : <?php echo $content['kementrian'];?></p>
                    <p>Tanggal : <?php echo $content['tanggal_proker'];?></p>
                    <center><img src="<?php echo $content['gambar_proker']; ?>" height="300px"></center><br><br>
                    <p><?php echo nl2br($content['isi_proker']);?></p><br><br>
                    <div class="share">
                        <h5>Share Article :</h5>
                        <ul class="share_nav">
                            <li><a href="#"><img src="<?php echo base_url()."assets/images/";?>facebook.png" title="facebook"></a></li>
                            <li><a href="#"><img src="<?php echo base_url()."assets/images/";?>twitter.png" title="Twitter"></a></li>
                            <li><a href="#"><img src="<?php echo base_url()."assets/images/";?>rss.png" title="Rss"></a></li>
                            <li><a href="#"><img src="<?php echo base_url()."assets/images/";?>gpluse.png" title="Google+"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
        <div class="container">
            <h4>Komplain</h4>
            <?php foreach ($komplain as $kom) { ?>
                <?php if($kom['id_proker']==$content['id_proker']) { ?>
                    <div class="boxs" class="row">
                        <div>
                            <div class="thumbnail">
                                <div class="caption">
                                    <h4>
                                        <?php echo $kom['nama']; ?>
                                        <?php if ($kom['status_komplain']==1) { ?>
                                            <small>Disetujui</small>
                                        <?php } ?>
                                    </h4>
                                </div>
                                <div class="caption">
                                    <p><?php echo $kom['isi_komplain'];?></p><br>
                                    <p>Suka : <?php echo $kom['suka'];?></p>

                                    <?php if (isset($this->session->user) && ($this->session->user)==$kom['username']) { ?>
                                        <!--hapus-->
                                        <form action="<?php echo base_url()."ControllerProker/hapusKomplain/".$kom['id_proker']; ?>" method="post">
                                        </form>
                                    <?php } else if (isset($this->session->user)) { ?>
                                        <!--suka-->
                                        <form action="<?php echo base_url()."ControllerProker/sukaiKomplain/".$kom['id_proker']; ?>" method="post">
                                            <input type="number" name="id" value="<?php echo $kom['id_komplain']; ?>" hidden="hidden">
                                            <input type="number" name="sukai" value="<?php echo $kom['suka']; ?>" hidden="hidden">
                                            <input type="submit" value="suka" name="suka">
                                        </form>
                                    <?php } ?>
                                </div>
                                <!--balasan-->
                                <?php $GLOBALS['found']=false;
                                foreach ($balasan as $bls) {
                                    if($kom['id_komplain']==$bls['id_komplain']) { 
                                        $GLOBALS['found'] = true; ?>
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <h4><?php echo $bls['nama_admin']; ?> <small>membalas</small></h4>
                                            </div>
                                            <div class="caption">
                                                <p><?php echo $bls['isi_balasan'];?></p><br>
                                            </div>
                                        </div>
                                    <?php break; }
                                } ?>
                            </div>
                            <div class="caption">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php if (isset($this->session->user)) { ?>
        <div class="container">
            <h4>Tambah Komplain</h4>
            <div class="boxs" class="row">
                <div>
                    <div class="thumbnail">
                        <div class="caption">
                            <h4><?php echo $this->session->nama; ?></h4>
                        </div>
                        <div class="caption">
                            <form action="<?php echo base_url()."ControllerProker/tambahKomplain/".$content['id_proker']; ?>" method="post">
                                <textarea id="styled" rows="5" cols="130" name="isi_proker" style="resize:none;" required></textarea><br><br>
                                <input type="submit" value="kirim" name="submit">
                            </form>
                        </div>
                    </div>
                    <div class="caption">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
</html>