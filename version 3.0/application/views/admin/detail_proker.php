<html>
    <?php foreach ($contents as $content) { ?>
        <div class="container">
            <div>
                <div>
                    <h3><?php echo $content['judul_proker'];?></h3>
                    <?php if(isset($this->session->user)) { ?>
                        <form action="<?php echo base_url() . "ControllerProkerAdmin/showeditProker/".$content['id_proker']; ?>" method="post" style="padding-left:70em;">
                            <input type="submit" name="edit" value="Edit">
                        </form>
                        <form action="<?php echo base_url() . "ControllerProkerAdmin/hapusProker/".$content['id_proker']; ?>" method="post" style="padding-left:70em;">
                            <input type="text" name="judul" value='<?php echo $content["judul_proker"]; ?>' hidden>
                            <input type="submit" name="hapus" value="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus program kerja yang Anda pilih?'); ">
                        </form>
                    <?php } ?>
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

                                    <?php if (isset($this->session->user)) { ?>
                                        <!--hapus-->
                                        <form action="<?php echo base_url()."ControllerProkerAdmin/hapusKomplain/".$kom['id_proker']; ?>" method="post">
                                            <input type="number" name="id" value="<?php echo $kom['id_komplain']; ?>" hidden="hidden">
                                            <input type="submit" value="hapus" name="hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus komplain yang Anda pilih?')">
                                        </form>
                                    <?php }
                                    if (isset($this->session->user) && $kom['status_komplain']==0) { ?>
                                        <!--setuju-->
                                        <br>
                                        <form action="<?php echo base_url()."ControllerProkerAdmin/setujuiKomplain/".$kom['id_proker']; ?>" method="post">
                                            <input type="number" name="id" value="<?php echo $kom['id_komplain']; ?>" hidden="hidden">
                                            <input type="submit" value="setuju" name="setuju">
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
                                }
                                if (isset($this->session->user) && $GLOBALS['found']==false && $kom['status_komplain']==1) { ?>
                                    <!--balas-->
                                    <h4>Balas</h4>
                                    <div class="boxs" class="row">
                                        <div>
                                            <div class="thumbnail">
                                                <div class="caption">
                                                    <h4><?php echo $this->session->nama; ?></h4>
                                                </div>
                                                <div class="caption">
                                                    <form action="<?php echo base_url() . "ControllerProkerAdmin/balas/".$kom['id_proker']; ?>" method="post">
                                                        <input type="number" name="idk" value="<?php echo $kom['id_komplain']; ?>" hidden="hidden">
                                                        <textarea id="styled" rows="5" cols="130" name="balasan" style="resize: none;" required></textarea><br><br>
                                                        <input type="submit" value="balas" name="balas">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="caption">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="caption">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
</html>