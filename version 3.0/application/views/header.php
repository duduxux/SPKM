<html>
    <head>
        <title>SPKM - Sistem Penghubung Kementrian dan Masyarakat</title>
        
        <link href="<?php echo base_url()."assets/";?>css/bootstrap.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()."assets/";?>css/stylesh.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />	
        <link href="<?php echo base_url()."assets/";?>css/spkm.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />	
        <link href="<?php echo base_url()."assets/";?>css/etalage.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url()."assets/";?>admin/font-awesome/css/font-awesome.min.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script type="application/x-javascript">
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); }
        </script>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <script src="<?php echo base_url()."assets/";?>js/jquery.min.js"></script>
        <script src="<?php echo base_url()."assets/";?>js/jquery.etalage.min.js"></script>
    </head>

    <script>
        jQuery(document).ready(function($){
            $('#etalage').etalage( {
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,    		
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 1
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });
        });
    </script>

    <script type="text/javascript" src="js/jquery.flexisel.js"></script>

    <div class="header">
        <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                    <a href="<?php echo base_url();?>"><img src="<?php echo base_url()."assets/";?>images/logo-spkm.png" width="80" /></a>
                </div>
                <div class="top-header-left" style="color:white; padding-left:2em;"><h3>SPKM - Sistem Penghubung Kementrian dan Masyarakat</h3></div>
                <div class="top-header-right">
                    <div class="down-top"></div>
                    <?php if (isset($this->session->user)) { ?>
                        <ul class="support">
                            <li><i class="fa fa-user fa-1x" aria-hidden="true"></i><a href="<?php echo base_url()."ControllerPengguna/showprofil/".$this->session->user;?>"><span>Hi, </span><?php echo $this->session->nama;?></a></li>
                        </ul>
                        <ul class="support">
                            <li><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i><a onclick="return confirm('Apakah Anda yakin ingin keluar dari SPKM?')" href="<?php echo base_url()."ControllerLogout/logout/user";?>"><span></span>Logout</a></li>
                        </ul>
                    <?php } else { ?>
                        <ul class="support">
                            <li><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i><a href="<?php echo base_url()."ControllerLogin/login/user";?>">LOGIN</a></li>
                        </ul>
                        <ul class="support">
                            <li><i class="fa fa-user fa-1x" aria-hidden="true"></i><a href="<?php echo base_url()."ControllerSignUp/showregister/user";?>"><span> </span>REGISTER</a></li>
                        </ul>
                    <?php } ?>
                    <div class="clearfix"></div>	
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="bottom-header">
            <div class="container">
                <div class="top-header-right">
                    <form action="<?php echo base_url()."ControllerProker/cariProker/"; ?>" method="get">
                        Kementrian
                        <select name="kementrian">
                            <option value="Hukum dan Hak Asasi Manusia">Hukum dan Hak Asasi Manusia</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Energi dan Sumber Daya Mineral">Energi dan Sumber Daya Mineral</option>
                            <option value="Perindustrian">Perindustrian</option>
                            <option value="Perdagangan">Perdagangan</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Lingkungan Hidup dan Kehutanan">Lingkungan Hidup dan Kehutanan</option>
                            <option value="Perhubungan">Perhubungan</option>
                            <option value="Kelautan dan Perikanan">Kelautan dan Perikanan</option>
                            <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                            <option value="Pekerjaan Umum dan Perumahan Rakyat">Pekerjaan Umum dan Perumahan Rakyat</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Pendidikan dan Kebudayaan">Pendidikan dan Kebudayaan</option>
                            <option value="Riset, Teknologi dan Pendidikan Tinggi">Riset, Teknologi dan Pendidikan Tinggi</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Agama">Agama</option>
                            <option value="Komunikasi dan Informatika">Komunikasi dan Informatika</option>
                            <option value="Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi">Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi</option>
                            <option value="Agraria dan Tata Ruang">Agraria dan Tata Ruang</option>
                        </select>
                        <input type="submit" value="LIHAT" style="padding: 1px 5px;">
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</html>