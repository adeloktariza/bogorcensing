<?php include 'includes/header.php'; ?>

<body class="index">
    
    <!-- Start Off=Canvas Navigation Section -->

    <div class="navigation-bar">
             
        <ul class="nav">  
            <li><a href="#">Beranda</a></li>
            <li class="dropdown"><a href="#">Laporan</a>         
              <div class="fulldrop">              
                <div class="column">
                  <ul>
                    <li><a href="#list-laporan">Daftar Laporan</a></li>
                    <li><a href="#laporan">Tambah Laporan</a></li>
                  </ul>
                </div> 
              </div>
            </li>
            <li><a href="#berita">Berita</a></li>

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
                <p>wadah bagi masyarakat kota Bogor untuk melaporkan<br>suatu pelanggaran secara cepat dan mudah</p>
                <a href="#laporan" class="">
                    <button class="btn btn-user">Buat Laporan </button>
                </a>
            </div>
        </div>
    </section>
    <!-- End Header Section -->
 
 <!-- Start Client Section -->
    <section id="laporan" class="client-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Ayo laporkan pelanggaran yang anda lihat</h2>
                        <p>Dengan melaporkan pelanggaran yang anda ketahui, anda dapat membantu pemerintah dalam<br>meningkatkan pelayanan serta kenyamanan fasilitas umum</p>
                    </div>
                </div>
            </div>
            <div class="row">
                 
                
                
                <div class="col-md-12 container-lapor">
                    <div class="col-md-6 form-lapor">
                            <?php echo form_open_multipart("pendudukController/add_laporan"); ?>
                            <form>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Media input</label>
                                    <input type="file" class="form-control-file" id="profile-img" aria-describedby="fileHelp" name="gambar" onchange="previewImage();" enctype="multipart/form-data" required>
                                    <small id="fileHelp" class="form-text text-muted">Ukuran maksimal gambar 1MB</small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleSelect1">Kategori</label>
                                    <select class="form-control" id="exampleSelect1" name="addKategori">

                                        <?php foreach($kategori as $kat) { ?>
                                            <option value="<?php echo $kat->id_kategori;?>"><?php echo $kat->nama_kategori;?></option>
                                        <?php } ?>
                                    </select>
                                     <small id="fileHelp" class="form-text text-muted">Pilih kategori sesuai pelanggaran</small>
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
                    <div class="col-md-6 form-lapor">
                            <div class="img-result">
                                <img id="profile-img-tag" width="549" height="310"/>
                            </div>
                    </div>
                    
                 
                </div>

                
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- End Client Section -->    
    
    
    <!-- Start About Us Section -->
    <section id="list-laporan" class="about-us-section-1">
        <div class="container">
            <div class="row">
                <?php
                    if($laporan){
                        foreach($laporan as $row) { ?>
                            <div class="col-md-12 col-sm-12" id="<?= $row->id_laporan;?>"  >
                                <div class="welcome-section text-center waves-effect">
                                    <img src="<?= $row->media;?>.jpg" class="img-responsive" alt="..">
                                    <h4 data-toggle="modal" data-target="#<?= $row->id_laporan;?>-modal"><?= $row->judul_laporan;?></h4>
                                    <span><?= $row->tgl_lapor;?></span>
                                    <p><?= $row->keterangan;?></p>
                                    <span class="edge">Status laporan :</span>

                                    <?php if($row->status_laporan == "terkirim"){?>
                                    
                                    <span class="terkirim-c">terkirim</span>
                                    <div class="footer-laporan">

                                    <button type='button' class='btn btn-danger' data-toggle="modal" data-target="#<?= $row->id_laporan;?>-modal-hapus">Hapus</button>
                                    
                                    <button type='button' class='btn btn-success' data-toggle="modal" data-target="#<?= $row->id_laporan;?>-modal-update">Edit</button>
                                   
                                    </div>
                                    
                                    <?php } else if($row->status_laporan == "validasi"){?>
                                        <span class="validasi-c"><?= $row->status_laporan;?></span>
                                    <?php } else if($row->status_laporan == "verifikasi"){?>
                                        <span class="verifikasi-c"><?= $row->status_laporan;?></span>
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
            </div><!-- /.row -->            
            
        </div><!-- /.container -->
    </section>
    <!-- End About Us Section -->
 
      <!-- Start Latest News Section -->
 <section id="berita" class="team-member-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center" >
                            <h2 style="color: #fff">Berita terkini</h2>
                            <p style="color: #fff">Pantau Keadaan disekitar anda</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php 
                    if($berita){
                    foreach($berita as $row) {
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="team-member">
                        <img src="<?= $row['media'];?>.jpg" class="img-responsive" alt="" height=300 >
                        <div class="team-details">
                            <h4><?= $row['judul_laporan'];?></h4>
                            <div class="designation"><?= $row['tgl_lapor'];?></div>
                            <p class="description"><?= $row['isi_berita'];?></p>
                        </div>
                    </div>
                </div>
                <?php }}?>
                
            </div>
                
        </div>
    </section>
    <!-- End Latest News Section -->
    <!-- Start Portfolio Modal Section -->
    <section id="modal" class="about-us-section-1">
    <?php
        if($laporan){
            foreach($laporan as $row) {
    ?>    
    <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' id='<?= $row->id_laporan;?>-modal'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'></h5><?= $row->judul_laporan; ?></h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>
            <div class='modal-img'>
                <img src='<?= $row->media;?>.jpg' class='img-responsive' alt='..''>
            </div>
            
            <span></span>
            <span>Tanggal Lapor   : <?= $row->tgl_lapor;?></span><br>
            <span>Lokasi Kejadian : <?= $row->lokasi_kejadian;?></span><br>
            <span>Satus Laporan :  <?= $row->status_laporan;?></span><br>
            <p><?= $row->keterangan;?></p>
          </div>
          <div class='modal-footer'>
            
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Keluar</button>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' id='<?= $row->id_laporan;?>-modal-hapus'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'></h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>
            <div class='modal-img'>
            </div>
            <p>Apakah anda yakin untuk menghapus laporan ini ?</p>
          </div>
          <div class='modal-footer'>
            <a href='pendudukController/delete_laporan/<?= $row->id_laporan;?>'>
                <button type='button' class='btn btn-secondary'>Ya</button>
            </a>

            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
            
          </div>
        </div>
      </div>
    </div>
    
    
    <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' id='<?= $row->id_laporan;?>-modal-update'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'></h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>X</span>
            </button>

          </div>
          <div class='modal-body'>";
                <?php echo form_open_multipart("pendudukController/update_laporan/$row->id_laporan");?>
                            <form>
                                  <div class='form-group'>
                                    <label for='exampleInputFile'>Media input</label>
                                    <input type='file' class='form-control-file' id='profile-img' aria-describedby='fileHelp' name='gambar' onchange='previewImage();' enctype='multipart/form-data'>
                                    <small id='fileHelp' class='form-text text-muted'>Ukuran maksimal gambar 1MB</small>
                                  </div>
                                  <div class='form-group'>
                                    <label for='exampleSelect1'>Kategori</label>
                                    <select class='form-control' id='exampleSelect1' name='addKategori'>
                                        <?php foreach($kategori as $kat) { ?>
                                            <option value='<?= $kat->id_kategori;?>'>

                                                <?php echo $kat->nama_kategori; ?>
                                                
                                            </option>
                                        
                                        <?php }?>
                                    </select>
                                     <small id='fileHelp' class='form-text text-muted'>Pilih kategori sesuai pelanggaran</small>
                                  </div>
                                  <div class='form-group'>
                                    <label for='exampleInputEmail1'>Judul Laporan</label>
                                    <input type='text' class='form-control' id='exampleInputJudul' placeholder='Masukkan Judul Laporan' name='judul' value='<?= $row->judul_laporan;?>'>
                                  </div>

                                  <div class='form-group'>
                                    <label for='exampleTextarea'>Lokasi Kejadian</label>
                                    <textarea class='form-control' id='exampleTextarea' rows='1' name='lokasi'><?= $row->lokasi_kejadian;?></textarea>
                                  </div>

                                  <div class='form-group'>
                                    <label for='exampleTextarea'>Keterangan</label>
                                    <textarea class='form-control' id='exampleTextarea' rows='4' name='keterangan' placeholder='Masukkan keterangan'><?= $row->keterangan;?></textarea>
                                  </div>

                                  
                                  
                                  <button type='submit' class='btn btn-primary'>Update</button>
                                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Keluar</button>
                            </form>";

                            <?php echo form_close(); ?>
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