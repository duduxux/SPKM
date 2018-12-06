<html>
    <div class="container">
        <div class="register">
            <div class="register-top-grid">
                <h3>UPLOAD PROKER</h3>
                <div class="mation">
                    <form method="post" action="<?php echo base_url()."ControllerProkerAdmin/upload"; ?>"  enctype="multipart/form-data">
                        <table width="700px" height="350px">
                            <tr>
                                <td><span>Judul Proker</span></td>
                                <td><input type="text" name="judul" required></td>
                            </tr>
                            <tr>
                                <td><span>Kementrian</span></td>
                                <td>
                                    <select name="kementrian" required>
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
                                </td>    
                            </tr>
                            <tr>
                                <td><span>Gambar Proker</span></td>
                                <td><input type="file" name="gambar" accept="image/*" required></td>
                            </tr>
                            <tr>
                                <td><span>Isi Proker</span></td>
                                <td><textarea id="styled" rows="10" cols="51" name="isi_proker" required></textarea></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit" value="Upload"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</html>