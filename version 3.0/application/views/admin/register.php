<html>
    <div class="container">
        <div class="register">
            <div class="register-top-grid">
                <h3>DAFTAR KE SPKM sebagai ADMIN</h3>
                <div class="mation">
                    <form action="<?php echo base_url()."ControllerSignUp/register/admin" ?>" method="post" enctype="multipart/form-data">
                        <span>Nama</span>
                        <input type="text" name="nama" required>

                        <span>No. KTP</span>
                        <input type="text" name="noktp" minlength="16" maxlength="16" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>

                        <span>Alamat</span>
                        <input type="text" name="alamat" required>

                        <span>No Telepon</span>
                        <input type="tel" name="no_hp" minlength="7" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>

                        <span>Email</span>
                        <input type="email" name="email" required>

                        <span>Username</span>
                        <input type="text" name="username" required>

                        <span>Password</span>
                        <input type="Password" name="password" required>

                        <span>Foto</span>
                        <input type="file" name="gambar" accept="image/*">
                        
                        <br>
                        <input type="submit" name="submit" value="Register">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</html>