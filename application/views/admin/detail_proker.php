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
    <?php } ?>
</html>