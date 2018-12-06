<html>
    <div class="container">
        <div class="register">
            <?php foreach ($contents as $content) { ?>
            <div class="register-top-grid">
                <h3>UPLOAD PROKER</h3>
                <div class="mation">
                    <form method="post" action="<?php echo base_url()."ControllerProkerAdmin/editProker/".$content['id_proker']; ?>" enctype="multipart/form-data">
                        <span>Judul Proker</span>
                        <input type="text" name="judul" value="<?php echo $content["judul_proker"]; ?>" required>
                        <input type="text" name="judul_awal" value="<?php echo $content["judul_proker"]; ?>" hidden>
                        
                        <span>Kementrian</span>
                        <select name="kementrian" required>
                            <option value="Hukum dan Hak Asasi Manusia" <?php if($content['kementrian']=='Hukum dan Hak Asasi Manusia') { ?>selected<?php } ?>>Hukum dan Hak Asasi Manusia</option>
                            <option value="Keuangan" <?php if($content['kementrian']=='Keuangan') { ?>selected<?php } ?>>Keuangan</option>
                            <option value="Energi dan Sumber Daya Mineral" <?php if($content['kementrian']=='Energi dan Sumber Daya Mineral') { ?>selected<?php } ?>>Energi dan Sumber Daya Mineral</option>
                            <option value="Perindustrian" <?php if($content['kementrian']=='Perindustrian') { ?>selected<?php } ?>>Perindustrian</option>
                            <option value="Perdagangan" <?php if($content['kementrian']=='Perdagangan') { ?>selected<?php } ?>>Perdagangan</option>
                            <option value="Pertanian" <?php if($content['kementrian']=='Pertanian') { ?>selected<?php } ?>>Pertanian</option>
                            <option value="Lingkungan Hidup dan Kehutanan" <?php if($content['kementrian']=='Lingkungan Hidup dan Kehutanan') { ?>selected<?php } ?>>Lingkungan Hidup dan Kehutanan</option>
                            <option value="Perhubungan" <?php if($content['kementrian']=='Perhubungan') { ?>selected<?php } ?>>Perhubungan</option>
                            <option value="Kelautan dan Perikanan" <?php if($content['kementrian']=='Kelautan dan Perikanan') { ?>selected<?php } ?>>Kelautan dan Perikanan</option>
                            <option value="Ketenagakerjaan" <?php if($content['kementrian']=='Ketenagakerjaan') { ?>selected<?php } ?>>Ketenagakerjaan</option>
                            <option value="Pekerjaan Umum dan Perumahan Rakyat" <?php if($content['kementrian']=='Pekerjaan Umum dan Perumahan Rakyat') { ?>selected<?php } ?>>Pekerjaan Umum dan Perumahan Rakyat</option>
                            <option value="Kesehatan" <?php if($content['kementrian']=='Kesehatan') { ?>selected<?php } ?>>Kesehatan</option>
                            <option value="Pendidikan dan Kebudayaan" <?php if($content['kementrian']=='Pendidikan dan Kebudayaan') { ?>selected<?php } ?>>Pendidikan dan Kebudayaan</option>
                            <option value="Riset, Teknologi dan Pendidikan Tinggi" <?php if($content['kementrian']=='Riset, Teknologi dan Pendidikan Tinggi') { ?>selected<?php } ?>>Riset, Teknologi dan Pendidikan Tinggi</option>
                            <option value="Sosial" <?php if($content['kementrian']=='Sosial') { ?>selected<?php } ?>>Sosial</option>
                            <option value="Agama" <?php if($content['kementrian']=='Agama') { ?>selected<?php } ?>>Agama</option>
                            <option value="Komunikasi dan Informatika" <?php if($content['kementrian']=='Komunikasi dan Informatika') { ?>selected<?php } ?>>Komunikasi dan Informatika</option>
                            <option value="Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi" <?php if($content['kementrian']=='Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi') { ?>selected<?php } ?>>Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi</option>
                            <option value="Agraria dan Tata Ruang" <?php if($content['kementrian']=='Agraria dan Tata Ruang') { ?>selected<?php } ?>>Agraria dan Tata Ruang</option>
                        </select>
                        
                        <span>Gambar Proker</span>
                        <input type="file" name="gambar" accept="image/*">
                        <input type="text" name="gambar_awal" value="<?php echo $content['gambar_proker']; ?>" hidden>
                        
                        <span>Isi Proker</span>
                        <textarea id="styled" rows="10" cols="51" name="isi" required><?php echo $content['isi_proker']; ?></textarea>
                        
                        <br>
                        <input type="submit" name="submit" value="Simpan" onclick="return confirm('Apakah Anda yakin ingin mengedit program kerja \'<?php echo $content['judul_proker']; ?>\'?')">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</html>