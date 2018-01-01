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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
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
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collaps-1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">&nbsp;Admin Panel</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collaps-1">
            <li>
              <a href="<?php echo base_url('admin/adminController/page_register_admin'); ?>">Tambah admin</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="admin panel">
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
	          <a href="#">Admin Panel</a>
	        </li>
	        <li class="breadcrumb-item active">Dashboard</li>
	      </ol>

		    <div class="row">
			  <div id="" class="box-wrap">
	
				    <div class="col-md-4 respon">
				      <div class="bignotepad bignotepad- bignotepad-medium">
				          <div class="bignotepad-inner">
				              <div class="img-notepad">
				                <img src="<?php echo base_url()?>assets/images/speaker.png" alt="eAZy Payment" />               
				              </div>
				              <div class="img-desc">
				                <h3>LAPORAN</h3>
				                <div class="bignotepad-copy text-desc">
				                   Laporan dari seluruh user terhadap pelanggaran.
				                </div> 
				              </div>  
				                              
				              <div class="bignotepad-footer btn-position" >
				                 <a href="/layanan/eazy-payment" class="btn btn-direct" target="_blank">
				                    <span>Panel Laporan</span>
				                 </a>
				              </div>     
				          </div>
				      </div>
				    </div>
					<div class="col-md-4 respon">
				      <div class="bignotepad bignotepad- bignotepad-medium">
				          <div class="bignotepad-inner">
				              <div class="img-notepad">
				                <img src="<?php echo base_url()?>assets/images/news.png" alt="eAZy Payment" />               
				              </div>
				              <div class="img-desc">
				                <h3>BERITA</h3>
				                <div class="bignotepad-copy text-desc">
				                   Berita tentang laporan yang telah ditindak lanjuti oleh instansi.
				                </div> 
				              </div>  
				                              
				              <div class="bignotepad-footer btn-position" >
				                 <a href="/layanan/eazy-payment" class="btn btn-direct" target="_blank">
				                    <span>Panel Berita</span>
				                 </a>
				              </div>     
				          </div>
				      </div>
				    </div>	 	 
					<div class="col-md-4 respon">
				      <div class="bignotepad bignotepad- bignotepad-medium">
				          <div class="bignotepad-inner">
				              <div class="img-notepad">
				                <img src="<?php echo base_url()?>assets/images/category.png" alt="eAZy Payment" />               
				              </div>
				              <div class="img-desc">
				                <h3>KATEGORI</h3>
				                <div class="bignotepad-copy text-desc">
				                   kategori dari setiap laporan beserta instansi terkait.
				                </div> 
				              </div>  
				                              
				              <div class="bignotepad-footer btn-position" >
				                 <a href="<?php echo base_url('admin/adminController/page_kategori'); ?>" class="btn btn-direct" target="">
				                    <span>Panel Kategori</span>
				                 </a>
				              </div>     
				          </div>
				      </div>
				    </div>	 
			  </div>
		    </div>
			<!-- --------------------------------------------------------- -->
	     
	    </div>


   	</div>
  
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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

