<html>
    <style type="text/css">
        a:link {
            text-decoration: none !important;
        }
    </style>
    <div class="container-fluid">
        <?php foreach ($contents as $content) { ?>
            <div class="profil_user" align="center">
                <?php if($content['gambar']!=null) { ?>
                    <img style="border-radius: 50%; width: 300px; height: 300px;" src="<?php echo $content['gambar']; ?>">
                <?php } else { ?>
                    <img style="border-radius: 50%; width: 300px; height: 300px;" src="">
                <?php } ?>
                <h3><b><?php echo $content['nama']; ?></b></h3>
                <h5>No KTP: <?php echo $content['no_ktp']; ?></h5>
                <h5>Alamat: <?php echo $content['alamat']; ?></h5>
                <h5>No Telepon: <?php echo $content['no_tel']; ?></h5>
                <h5>Email: <?php echo $content['email']; ?></h5>
            </div>
            <?php if ((isset($this->session->user) == true)&&(($this->session->user)==$content['username'])) { ?>
                <div align="center" style="padding-bottom: 20px;"><a href="<?php echo base_url()."ControllerPengguna/showedit/".$this->session->user; ?>">EDIT PROFIL</a></div>
            <?php }
        } ?>
    </div>
</html>