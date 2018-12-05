<html>
	<div class="container">
        <h1>Program Kerja</h1>
        <?php foreach ($contents as $content) { ?>
        <div class="boxs" class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <h4><a href="<?php echo base_url()."ControllerProker/loadPilihan/".$content['id_proker'];?>"><?php echo $content['judul_proker']; ?></a></h4>
                        <p>Kementrian : <?php echo $content['kementrian'];?></p>
                        <p>Tanggal : <?php echo $content['tanggal_proker'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</html>