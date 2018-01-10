<?php include 'includes/header.php'; ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Admin Bogor Censing</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url('adminController'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Dashboard</span>
          </a>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link" href="<?php echo base_url('adminController/page_laporan'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Laporan</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Berita">
          <a class="nav-link" href="<?php echo base_url('adminController/page_berita'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Berita</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('adminController/page_kategori'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Kategori</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('adminController/page_register_admin'); ?>">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Admin Panel</span>
          </a>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('adminController/page_register_instansi'); ?>">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Instansi Panel</span>
          </a>
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
	          <a href="#">Admin Panel</a>
	        </li>
	        <li class="breadcrumb-item active">Berita</li>
	      </ol>

       <div class="row wrap-section">
          <div class="col-md-11 form-add-kategori">
              <?php echo form_open_multipart("adminController/add_berita"); ?>
                  <form>
                        <div class="form-group">
                          <label for="exampleSelect1">Pilih Berita</label>
                          <select class="form-control" id="exampleSelect1" name="addlaporan">
                              <?php foreach($laporan as $ber) { ?>
                                  <option value="<?= $ber->id_laporan;?>"><?= $ber->judul_laporan;?></option>
                              <?php } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleTextarea">Isi Berita</label>
                          <textarea class="form-control" id="exampleTextarea" rows="4" name="keterangan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
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
                          <th>Judul Berita</th>
                          <th>Lokasi</th>
                          <th>Admin</th>
                          <th width="200px">Aksi</th>
                      </tr>
                  </thead>


                  <tbody>
                    <?php 

                    if ($berita != null){

                      $i=1;

                    foreach($berita as $la) { ?>
                        <tr>
                          <th class="center"><?= $i;?></th>
                          <th><p data-toggle="modal" data-target="#<?= $la['id_laporan'];?>-m-tampil">
                                  <?= $la['judul_laporan']; ?>
                              </p>
                          </th>
                          <th><?= $la['lokasi_kejadian'];?></th>
                          <th class="center"><?= $la['nama'];?></th>
                          <th class="colbtn" width="200px">

                            <button type='button' class='btn btn-danger' data-toggle="modal" data-target="#<?= $la['id_berita'];?>-m-hapus"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                            <button type='button' class='btn btn-primary' data-toggle="modal" data-target="#<?= $la['id_berita'];?>-m-edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>


                          </th>
                        </tr>

                    <?php } $i++;
                  }?>

                  </tbody>
              </table>

          </div>
       </div>


   	</div>
  
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

    <?php 

    if ($berita != null){

    foreach($berita as $kat) { ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $kat['id_berita'];?>-m-hapus">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>Hapus Data</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>
              <p>Apakah anda yakin untuk menghapus Berita <?= $kat['judul_laporan'];?></p>
          </div>
          <div class='modal-footer'>
            
            <a href="<?php echo base_url('adminController/delete_berita')?>/<?= $kat['id_berita'];?>">
                <button type='button' class='btn btn-primary'>Ya</button>
            </a>

            <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
            
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $kat['id_berita'];?>-m-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>Edit Data</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>

          <?php echo form_open("adminController/update_berita/".$kat['id_berita']); ?>
                  <form>
                        <div class="form-group">
                          <label for="exampleSelect1">Pilih Berita</label>
                          <select class="form-control" id="exampleSelect1" name="addlaporan">

                              <option value="<?= $ber->id_laporan;?>"><?= $ber->judul_laporan;?></option>

                              <?php foreach($laporan as $ber) { ?>
                                  <option value="<?= $ber->id_laporan;?>"><?= $ber->judul_laporan;?></option>
                              <?php } ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleTextarea">Isi Berita</label>
                          <textarea class="form-control" id="exampleTextarea" rows="4" name="keterangan"><?= $kat['isi_berita'];?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
                  </form>
              <?php echo form_close(); ?>

          </div>
          <div class='modal-footer'>

          </div>
        </div>
      </div>
    </div>

    <?php }}?>

  </div>
</body>

<?php include 'includes/footer.php'; ?>