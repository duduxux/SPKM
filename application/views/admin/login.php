<html>
    <div class="container">
        <div class="register">
            <div class="register-top-grid">
                <h3>LOGIN</h3>
                <div class="mation">
                    <form method="post" action="<?php echo base_url()."ControllerLogin/validasi/admin"; ?>">
                        <span>Username</span>
                        <input type="text" name="username" required>

                        <span>Password</span>
                        <input type="Password" name="password" required>

                        <span></span>
                        <input type="submit" name="submit" value="Login">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</html>