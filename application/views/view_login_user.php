
<?php include 'includes/header.php'; ?>

<body>

	<div class="image-frame">
		<div class="image-background">
		</div>

		<?php echo form_open("login/cek_login"); ?>

		<div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
            <a href="<?php echo base_url('register')?>" class="forgot-password">
                Buat akun
            </a>
        </div>

        <?php echo form_close(); ?>

	</div>
</body>

<?php include 'includes/footer.php'; ?>