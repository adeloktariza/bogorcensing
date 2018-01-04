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
          <a class="nav-link" href="<?php echo base_url('admin/adminController'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Dashboard</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link" href="<?php echo base_url('admin/adminController/page_laporan'); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">&nbsp;Laporan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Berita">
          <a class="nav-link" href="<?php echo base_url('admin/adminController/page_berita'); ?>">
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
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('admin/adminController/page_register_admin'); ?>">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Admin Panel</span>
          </a>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Kategori">
          <a class="nav-link" href="<?php echo base_url('admin/adminController/page_register_instansi'); ?>">
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
	        <li class="breadcrumb-item active">Instansi</li>
	      </ol>

       <div class="row wrap-section">
          <div class="col-md-11 form-add-kategori">
              <?php echo form_open_multipart("user/userController/add_berita"); ?>
                  <form>
                        <div class="form-group">
                          <label for="exampleSelect1">Pilih Berita</label>
                          <select class="form-control" id="exampleSelect1" name="addKategori">
                              <?php foreach($data_laporan_valid->result() as $ber) { ?>
                                  <option value="<?php echo $ber->id_laporan;?>"><?php echo $ber->judul_laporan;?></option>
                              <?php } ?>
                          </select>
                           <small id="fileHelp" class="form-text text-muted">Pilih Laporan</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul Laporan</label>
                          <input type="text" class="form-control" id="exampleInputJudul" placeholder="Masukkan Judul Laporan" name="judul">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                          <label for="exampleTextarea">Lokasi Kejadian</label>
                          <textarea class="form-control" id="exampleTextarea" rows="1" name="lokasi"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="exampleTextarea">Keterangan</label>
                          <textarea class="form-control" id="exampleTextarea" rows="4" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                        </div>

                        
                        
                        <button type="submit" class="btn btn-primary">Kirim</button>
                  </form>
              <?php echo form_close(); ?>

          </div>
       </div>


   	</div>
  
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

        <?php 
        if ($data_laporan != null){
          foreach($data_laporan as $la) { ?>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $la->id_laporan;?>-m-hapus">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Hapus Data</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>X</span>
                    </button>

                  </div>
                  <div class="modal-body">
                      <p>Apakah anda yakin untuk menghapus Laporan "<?= $la->judul_laporan;?>" ?</p>
                  </div>
                  <div class='modal-footer'>
                    
                    <a href="<?php echo base_url('admin/adminController/delete_laporan')?>/<?= $la->id_laporan;?>">
                        <button type='button' class='btn btn-primary'>Ya</button>
                    </a>

                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
                    
                  </div>
                </div>
              </div>
            </div>

        <?php }}?>

        <?php 
        if ($data_laporan != null){
          foreach($data_laporan as $la) { ?>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $la->id_laporan;?>-m-status">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Ubah status Laporan</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>X</span>
                    </button>

                  </div>
                  <div class='modal-body'>
                      <p>Apakah anda yakin untuk mengubah status Laporan <?= $la->status_laporan;?> menjadi verifikasi (data dianggap benar).</p>
                  </div>
                  <div class='modal-footer'>
                    
                    <a href="<?php echo base_url('admin/adminController/update_status')?>/<?= $la->id_laporan;?>">
                        <button type='button' class='btn btn-primary'>Ya</button>
                    </a>

                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $la->id_laporan;?>-m-tampil">
              <div class="modal-dialog modal-lg">
                 <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'><?= $la->judul_laporan?></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>X</span>
                    </button>

                  </div>
                  <div class='modal-body'>
                    <div class='modal-img'>
                        <img src="<?= $la->media;?>.jpg" class="img-responsive">
                    </div>
                    
                    <span></span>
                    <span>Tanggal Lapor   : <?= $la->tgl_lapor;?></span><br>
                    <span>Lokasi Kejadian : <?= $la->lokasi_kejadian;?></span><br>
                    <span>Satus Laporan : <?= $la->status_laporan;?></span><br>
                    <p><?= $la->keterangan;?></p>
                  </div>
                  <div class='modal-footer'>
                    <?php if($la->status_laporan == "terkirim") {?>
                              
                            <a href="<?php echo base_url('admin/adminController/update_status')?>/<?= $la->id_laporan;?>">
                              <button type='button' class='btn btn-success'>Verivikasi</button>
                            </a>

                    <?php } ?>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Keluar</button>
                    
                  </div>
                </div>
              </div>
            </div>

        <?php }

      }?>
        
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