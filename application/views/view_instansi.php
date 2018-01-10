<?php include 'includes/header.php'; ?>

<body class="index">
    
    <!-- Start Off=Canvas Navigation Section -->

    <div class="navigation-bar">
             
        <ul class="nav">  
            <li><a href="<?php echo base_url('instansi/instansiController'); ?>">Beranda</a></li>
            <li><a href="#biodata">Biodata</a></li>
            <li><a href="#laporan">Laporan</a></li>
            <li class="f-right"><a href="<?php echo base_url('login/logout')?>">Keluar</a></li>
            <li class="f-right"><a href="#">Hai <?= $username?></a></li>    
        
        </ul> 
    </div>
    <!-- End Off-Canvas Navigation Section -->
    
    
    <!-- ***************************************************************** -->
    <!-- Start Header Section -->
    <!-- ***************************************************************** -->
    <section class="header call-to-action" id="home">
        <div class="container">
            <div class="intro-text">
                <h1>BOGOR <span>SENSING</span></h1>
                <p>SELAMAT DATANG <?= $username?></p>
                <a href="#laporan" class="">
                    <button class="btn btn-user">Laporan </button>
                </a>
                <a href="#laporan" class="">
                    <button class="btn btn-user">Biodata </button>
                </a>

            </div>
        </div>
    </section>
    <!-- End Header Section -->
    
 <!-- Start Client Section -->
    <section id="service" class="services-section">
        <div class="container">
            <div class="row">
                <?php
                    if($laporan){
                        foreach($laporan as $row) {
                ?>
                            <div class="col-md-12 col-sm-12" id="<?= $row['id_laporan'];?>"  >
                                <div class="welcome-section text-center waves-effect">
                                    <img src="<?= $row['media'];?>.jpg" class="img-responsive" alt="..">
                                    <h4 data-toggle="modal" data-target="#<?= $row['id_laporan'];?>-m-tampil"><?= $row['judul_laporan'];?></h4>
                                    <span><?= $row['tgl_lapor'];?></span>
                                    <p><?= $row['keterangan'];?></p>
                                    <span class="edge">Status laporan : </span>

                                    <?php  if($row['status_laporan'] == "validasi"){?>
                                        
                                        <span class="validasi-c"><?= $row['status_laporan'];?></span>
                                    
                                    <?php } else if($row['status_laporan'] == "verifikasi"){?>
                                        
                                        <span class="verifikasi-c"><?= $row['status_laporan'];?></span>
                                        <div class="footer-laporan">
                                            
                                            <button type='button' class='btn btn-success' data-toggle="modal" data-target="#<?= $row['id_laporan'];?>-m-status">Validasi</button>
                                   
                                        </div>
                                    
                                    <?php }?>

                                   
                                </div>
                            </div>
                <?php   }
                }else{ ?>
                            <div class="col-md-12 col-sm-12">
                                <div class="welcome-section text-center waves-effect">
                                    <h1>BELUM ADA LAPORAN</h1>
                                </div>
                            </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Client Section -->    
    

    <!-- Start About Us Section -->
   <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Terima <strong>Kasih</strong> Telah memberikan pelayanan terbaik <br>untuk warga kota Bogor</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->
 
    <!-- Start Portfolio Modal Section -->

 
    <section id="modal" class="about-us-section-1">
        <?php 
        if ($laporan != null){
          foreach($laporan as $la) { ?>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $la['id_laporan'];?>-m-status">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Ubah status Laporan</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>X</span>
                    </button>

                  </div>
                  <div class='modal-body'>
                      <p>Apakah anda yakin untuk mengubah status Laporan <?= $la['status_laporan'];?> menjadi validasi (pelanggaran dianggap telah diproses).</p>
                  </div>
                  <div class='modal-footer'>
                    
                    <a href="<?php echo base_url('instansiController/update_status')?>/<?= $la['id_laporan'];?>">
                        <button type='button' class='btn btn-primary'>Ya</button>
                    </a>

                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Tidak</button>
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $la['id_laporan'];?>-m-tampil">
              <div class="modal-dialog modal-lg">
                 <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'><?= $la['judul_laporan'];?></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>X</span>
                    </button>

                  </div>
                  <div class='modal-body'>
                    <div class='modal-img'>
                        <img src="<?= $la['media'];?>.jpg" class="img-responsive">
                    </div>
                    
                    <span></span>
                    <span>Tanggal Lapor   : <?= $la['tgl_lapor'];?></span><br>
                    <span>Lokasi Kejadian : <?= $la['lokasi_kejadian'];?></span><br>
                    <span>Satus Laporan : <?= $la['status_laporan'];?></span><br>
                    <p><?= $la['keterangan'];?></p>
                  </div>
                  <div class='modal-footer'>
                    <?php if($la['status_laporan'] == "verifikasi") {?>
                              
                            <a href="<?php echo base_url('instansi/instansiController/update_status')?>/<?= $la['id_laporan'];?>">
                              <button type='button' class='btn btn-success'>Verifikasi</button>
                            </a>

                    <?php } ?>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Keluar</button>
                    
                  </div>
                </div>
              </div>
            </div>

        <?php }

      }?>
    </section>
    
    <!-- Start Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <span class="copyright"> &copy; Navigator 2015. Designed by <a href="http://themefisher.com">Themefisher</a></span>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="footer-social text-center">
                        <ul>
                            <li class="waves-effect"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="waves-effect"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="waves-effect"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="waves-effect"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="waves-effect"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="footer-link">
                        <ul class="pull-right">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->
</body>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                $("#profile-img").css("display", "block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include 'includes/footer.php'; ?>