
<?php include 'includes/header.php'; ?>

<body>

	<div class="col-md-12 image-background">
		<div class="col-md-4 form-login">
			<?php echo form_open("login/cek_login"); ?>
			<p>Username : <br>
			<input type="text" name="username">
			</p>
			<p>Password : <br>
			<input type="password" name="password"></p>
			<p><button type="submit">Submit</button></p>
			<?php echo form_close(); ?>
		</div>
		
	</div>
</body>

<?php include 'includes/footer.php'; ?>