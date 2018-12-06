<html>
    <style type="text/css">
        a:link {
            text-decoration: none !important;
        }
    </style>
    <div class="container-fluid">
        <?php foreach ($contents as $content) { ?>
            <div class="profil_user" align="center">
                <?php if($content['gambar_admin']!=null) { ?>
                    <img style="border-radius: 50%; width: 300px; height: 300px;" src="<?php echo $content['gambar_admin']; ?>">
                <?php } else { ?>
                    <img style="border-radius: 50%; width: 300px; height: 300px;" src="">
                <?php } ?>
                <h3><b><?php echo $content['nama_admin']; ?></b></h3>
                <h5>No KTP: <?php echo $content['no_ktp_admin']; ?></h5>
                <h5>Alamat: <?php echo $content['alamat_admin']; ?></h5>
                <h5>No Telepon: <?php echo $content['no_tel_admin']; ?></h5>
                <h5>Email: <?php echo $content['email_admin']; ?></h5>
            </div>
            <?php if ((isset($this->session->user) == true)&&(($this->session->user)==$content['username_admin'])) { ?>
                <div align="center" style="padding-bottom: 20px;"><a href="<?php echo base_url()."ControllerAdmin/showedit/".$this->session->user; ?>">EDIT PROFIL</a></div>
            <?php }
        } ?>
    </div>
</html>