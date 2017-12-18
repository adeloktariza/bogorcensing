
<?php include 'includes/header.php'; ?>

<body>

<?php echo form_open("login/cek_login"); ?>
		<p>Username : <br>
		<input type="text" name="username">
		</p>
		<p>Password : <br>
		<input type="password" name="password"></p>
		<p><button type="submit">Submit</button></p>
		<?php echo form_close(); ?>

</body>

<?php include 'includes/footer.php'; ?>