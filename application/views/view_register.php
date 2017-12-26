
<?php include 'includes/header.php'; ?>

<body id="registerForm">

		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>assets/images/bogor.jpg">

            <?php echo form_open("register/add_data"); ?>

            <div class="card-2 card-container">
                <p id="profile-name" class="profile-name-card">REGISTRASI</p>
                <form class="form-signin">
                    <input type="text" id="inputUsername" name="addUsername" class="form-control" placeholder="Username" required autofocus>

                    <input type="password" id="inputPassword" name="addPassword" class="form-control" placeholder="Password" required>
                    
                    <input type="number" id="inputNIK" name="addNik" class="form-control" placeholder="NIK" required>
                    
                    <input type="text" id="inputName" name="addName" class="form-control" placeholder="Nama" required>
                    
                    <input type="email" id="inputEmail" name="addEmail" class="form-control" placeholder="Email" required>
                    
                    <input type="text" id="inputNumber" name="addNumber" class="form-control" placeholder="Nomor Telepon" required>
                    
                    <input type="text" id="inputAddress" name="addAddress" class="form-control" placeholder="Alamat" required>
                    
                    

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">registrasi</button>

                    <span id="reauth-email" class="reauth-email">
                        <a href="" class="forgot-password">
                            sudah punya akun
                        </a>
                    </span>

                </form><!-- /form -->

                
            </div>    


		</div>

		

        <?php echo form_close(); ?>

</body>

<?php include 'includes/footer.php'; ?>