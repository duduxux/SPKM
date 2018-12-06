 <html>
    <div class="container">
        <div class="register">
            <?php foreach ($contents as $content) { ?>
                 <div class="register-top-grid">
                    <h3>EDIT PROFIL</h3>
                    <div class="mation">
                        <form action="<?php echo base_url()."ControllerPengguna/editProfil/".$content['username'];?>" method="post" enctype="multipart/form-data">

                            <span>Nama</span>
							<input type="text" name="nama" value="<?php echo $content['nama']; ?>" required>
						
							<span>Alamat</span>
							<input type="text" name="alamat" value="<?php echo $content['alamat']; ?>" required>

							<span>No Telepon</span>
							<input type="tel" name="no_hp" minlength="7" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $content['no_tel']; ?>" required>
						
							<span>Email</span>
							<input type="email" name="email" value="<?php echo $content['email']; ?>" required>
                            
                            <span>Username</span>
							<input type="text" name="username" readonly value="<?php echo $content['username']; ?>">
						
							<span>Foto</span>
							<input type="file" name="gambar" accept="image/*">
                            
                            <input type="text" name="gambar_awal" value="<?php echo $content['gambar']; ?>" hidden>
                            
                            <input type="submit" value="EDIT PROFIL" name="submit" onclick="return confirm('Apakah Anda yakin ingin mengedit profil Anda?')">
 
                        </form>
                        <div class="clearfix"></div>
                     </div>
                <div class="clearfix"></div>
            </div>
            <?php } ?>     
        </div>
    </div>
</html>