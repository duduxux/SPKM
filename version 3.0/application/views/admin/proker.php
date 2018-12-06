<html>
	<div class="container">
        <h1>Program Kerja</h1>
        <?php foreach ($contents as $content) { ?>
        <div class="boxs" class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <?php if(isset($this->session->user)) { ?>
                        <form action="<?php echo base_url()."ControllerProkerAdmin/hapusProker/".$content['id_proker']; ?>" method="post" style="padding-left:75em;">
                            <input type="text" name="judul" value='<?php echo $content["judul_proker"]; ?>' hidden>
                            <input type="submit" name="hapus" value="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus program kerja yang Anda pilih?'); ">
                        </form>
                        <?php } ?>
                        <h4><a href="<?php echo base_url()."ControllerProkerAdmin/loadPilihan/".$content['id_proker'];?>"><?php echo $content['judul_proker']; ?></a></h4>
                        <p>Kementrian : <?php echo $content['kementrian'];?></p>
                        <p>Tanggal : <?php echo $content['tanggal_proker'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</html>