<?php include 'includes/header.php'; ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Instansi Bogor Censing</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url('admin/adminController'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Laporan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Berita">
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Berita</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('admin/adminController/page_kategori'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Kategori</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="admin panel">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Admin Panel</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="<?php echo base_url('admin/adminController/page_register_admin'); ?>">Tambah admin</a>
            </li>
          </ul>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="admin panel">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collaps-2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Instansi Panel</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collaps-2">
            <li>
              <a href="<?php echo base_url('admin/adminController/page_register_instansi'); ?>">Tambah instansi</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      	<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#">
          		Hai <?= $username?>
          </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="<?php echo base_url('adminController/logout'); ?>">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  	<div class="content-wrapper">
	    <div class="container-fluid">
	      <!-- Breadcrumbs-->
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item">
	          <a href="#">Instansi</a>
	        </li>
	        <li class="breadcrumb-item active">Registrasi</li>
	      </ol>

<!--         <div class="row">

              <?php echo form_open("admin/adminController/register_instansi"); ?>

              <form class="form-signin">
                    <input type="text" id="inputUsername" name="addUsername" class="form-control" placeholder="Username" required autofocus>

                    <input type="password" id="inputPassword" name="addPassword" class="form-control" placeholder="Password" required>
                    
                    <input type="text" id="inputName" name="addName" class="form-control" placeholder="Nama" required>
                    
                    <input type="email" id="inputEmail" name="addEmail" class="form-control" placeholder="Email" required>
                    
                    <input type="text" id="inputNumber" name="addNumber" class="form-control" placeholder="Nomor Telepon" required>
                    
                    <input type="text" id="inputAddress" name="addAddress" class="form-control" placeholder="Alamat" required>
                    

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">registrasi</button>

                </form>

                <?php echo form_close(); ?>
        </div> -->
			<!-- --------------------------------------------------------- -->


      <div class="row wrap-section">
          <div class="col-md-6 form-add-kategori">

              <?php echo form_open("admin/adminController/register_instansi"); ?>

                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" id="inputUsername" name="addUsername" class="form-control" placeholder="Username" required autofocus>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" id="inputPassword" name="addPassword" class="form-control" placeholder="Password" required>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" id="inputName" name="addName" class="form-control" placeholder="Nama" required>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" id="inputEmail" name="addEmail" class="form-control" placeholder="Email" required>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon</label>
                    <input type="text" id="inputNumber" name="addNumber" class="form-control" placeholder="Nomor Telepon" required>
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" id="inputAddress" name="addAddress" class="form-control" placeholder="Alamat" required>
                   
                  </div>
                  

                  <button type="submit" class="btn btn-primary">Tambah</button>
              </form>

                <?php echo form_close(); ?>
        </div>
	     
	    </div>

       <div class="row wrap-section">
          <div class="col-md-11 form-add-kategori">
              <table class="table table-bordered">


                  <thead>
                      <tr>
                          <th>No</th>
                          <th>username</th>
                          <th>Nama Instansi</th>
                          <th>Email</th>
                          <th width="200px">Aksi</th>
                      </tr>
                  </thead>


                  <tbody>
                    <?php 

                    $i = 1;

                    foreach($data_dinas as $di) { ?>
                        <tr>
                          <th class="col1"><?= $i; ?></th>
                          <th><?= $di->username; ?></th>
                          <th><?= $di->nama;?></th>
                          <th><?= $di->email;?></th>
                          <th class="colbtn" width="200px">

                              <button type='button' class='btn btn-danger' data-toggle="modal" data-target="#<?= $di->id_instansi;?>-m-hapus"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                              <button type='button' class='btn btn-primary' data-toggle="modal" data-target="#<?= $di->id_instansi;?>-m-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>


                          </th>
                        </tr>

                    <?php $i++; }?>
                  </tbody>
              </table>

          </div>
       </div>


   	</div>
  
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <?php foreach($data_dinas as $di) { ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $kat->id_kategori;?>-m-hapus">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>Hapus Data</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>
              <p>Apakah anda yakin untuk menghapus Instansi <?= $di->nama;?></p>
          </div>
          <div class='modal-footer'>
            
            <a href='<?php echo base_url('admin/adminController/update_kategori')?>/<?= $kat->id_kategori;?>'>
                <button type='button' class='btn btn-primary'>Ya</button>
            </a>

            <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
            
          </div>
        </div>
      </div>
    </div>

    <?php }?>

    <?php foreach($data_dinas as $di) { ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $kat->id_kategori;?>-m-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>Edit Data</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>
            <?php echo form_open("admin/adminController/update_kategori/$kat->id_kategori"); ?>

              <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Nama Kategori" name="addName" value="<?= $kat->nama_kategori?>">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleSelect1">Kategori</label>
                    <select class="form-control" name="addKategori">
                          <option  value="<?= $kat->id_instansi;?>"><?= $kat->nama;?></option>                    
                          <?php foreach($data_instansi->result() as $row) { ?>
                              <option value="<?php echo $row->id_instansi;?>"><?php echo $row->nama;?></option>
                          <?php } ?>
                    </select>
                     <small id="fileHelp" class="form-text text-muted">Pilih kategori sesuai pelanggaran</small>
                  </div>

                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type='button' class='btn btn-primary' data-dismiss='modal'>Keluar</button>
              </form>

            <?php echo form_close(); ?>

          </div>
          <div class='modal-footer'>

          </div>
        </div>
      </div>
    </div>

    <?php }?>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Anda akan dikembalikan ke halaman login.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('login/logout')?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include 'includes/footer.php'; ?>