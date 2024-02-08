<!-- ADMIN & GURU  -->
<div class="content-wrapper" >
    <!-- header body halaman -->
    <section class="content-header">
        <!-- judul halaaman -->
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </section>

    <?php
    date_default_timezone_set('Asia/Jakarta');
    ?>

    <!-- body halaman -->
    <section class="content">
        <div class="row">
            <!-- untuk tugas RPP -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red"> <!-- untuk warna box -->
                    <div class="inner">
                        <h3>
                            <?php
                            echo $this->db->query('SELECT id FROM tb_tugas_jurnal WHERE tipe_tugas="Tugas RPP"')->num_rows();
                            ?>
                        </h3>

                        <p>Total Tugas RPP</p>
                    </div>
                    <div class="icon"> <!-- untuk icon kotak -->
                        <div class="fa fa-book"></div>
                    </div>
                    <a href="<?= base_url('index.php/admin/laporantugas') ?>" class="small-box-footer"> <!-- di arahin ke halaman laporan tugas -->
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ========================================================================================= -->
            <!-- untuk tugas jurnal harian -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>
                            <?php
                            echo $this->db->query('SELECT id FROM tb_tugas_jurnal WHERE tipe_tugas="Tugas Jurnal Harian"')->num_rows();
                            ?>
                        </h3>

                        <p>Total Tugas Jurnal Harian</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-calendar"></div>
                    </div>
                    <a href="<?= base_url('index.php/admin/laporantugas') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ========================================================================================= -->
             <!-- untuk tugas Program Semester -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php
                            echo $this->db->query('SELECT id FROM tb_tugas_jurnal WHERE tipe_tugas="Tugas Program Semester"')->num_rows();
                            ?>
                        </h3>


                        <p>Total Tugas Program Semester</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-tasks"></div>
                    </div>
                    <a href="<?= base_url('index.php/admin/laporantugas') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ========================================================================================= -->
             <!-- untuk tugas Program Tahunan -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?php
                            echo $this->db->query('SELECT id FROM tb_tugas_jurnal WHERE tipe_tugas="Tugas Program Tahunan"')->num_rows();
                            ?>
                        </h3>

                        <p>Total Tugas Program Tahunan</p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-file-text"></div>
                    </div>
                    <a href="<?= base_url('index.php/admin/laporantugas') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ========================================================================================= -->
             <!-- untuk tugas Silabus -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>
                            <?php
                            echo $this->db->query('SELECT id FROM tb_tugas_jurnal WHERE tipe_tugas="Tugas Silabus"')->num_rows();
                            ?>
                        </h3>

                        <p>Total Tugas Silabus
                        </p>
                    </div>
                    <div class="icon">
                        <div class="fa fa-bookmark"></div>
                    </div>
                    <a href="<?= base_url('index.php/admin/laporantugas') ?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ========================================================================================= -->
        </div>
    </section>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- <section class="content-header">
        <h1>
            Data Guru
        </h1>
    </section>
    <section class="content">
        <div class="box">

            <div class="box-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover" id="dataTable">

                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Sebagai</th>
                                <th>Terdaftar</th>
                            </tr>
                        </thead>

                        <tbody>
                          
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </section> -->
<!-- ==================================================================================================== -->


<!-- ==================================================================================================== -->
  <div class="content">
    <div class="">
        
    <!-- ======= Features Section ======= -->
    <section id="" class="">
      <div class="box" style="background-color: white;">
        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
            <ul class="nav nav-tabs flex-column">
                <!-- penjelasan tugas rpp -->
              <li class="nav-item" data-aos="fade-up">
                <a class="nav-link active show" data-bs-toggle="tab">
                  <h4>RPP</h4>
                  <p>Rencana pelaksanaan pembelajaran, atau disingkat RPP, adalah pegangan seorang guru dalam mengajar di dalam kelas. RPP dibuat oleh guru untuk membantunya dalam mengajar agar sesuai dengan Standar Kompetensi dan Kompetensi Dasar pada hari tersebut.</p>
                </a>
              </li>
               <!--  penjelasan tugas jurnal -->
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-bs-toggle="tab" >
                  <h4>Tugas Jurnal</h4>
                  <p>Jurnal Harian Guru adalah Sebuah catatan rekam kegiatan setiap kegiatan pembelajaran dilaksanakan. Agenda Harian Guru ini dapat digunakan sebagai alat untuk mencatat perkembangan kegiatan mengajar, penilaian dan pengembangan kompetensi peserta didik.</p>
                </a>
              </li>
             <!--  penjelasan tugas Program semester -->
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-bs-toggle="tab">
                  <h4>Program Semester</h4>
                  <p>Program semester adalah program pengajaran yang harus dicapai selama satu semester, selama periode ini diharapkan para siswa menguasai pengetahuan, sikap dan keterampilan sebagai satu kesatuan utuh.</p>
                </a>
              </li>
            </ul>
          </div>
         <!--  untuk yg di sampingnya -->
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
            <div class="tab-content nav nav-tabs flex-column">
              <!--  pernjelasan tugas Program tahunan -->
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-bs-toggle="tab" >
                  <h4>Program Tahunan</h4>
                  <p>Program tahunan merupakan ancangan penentuan alokasi waktu selama satu  tahun untuk mencapai kompetensi- kompetensi dasar yang ada dalam kurikulum.</p>
                </a>
              </li>

             <!--  penjelasan silabus -->
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                <a class="nav-link" data-bs-toggle="tab" >
                  <h4>Silabus</h4>
                  <p>Silabus merupakan rencana pembelajaran pada suatu dan/atau kelompok mata pelajaran atau tema tertentu yang mencakup Standar Kompetensi, Kompetensi Dasar, materi pokok/pembelajaran, kegiatan pembelajaran, indikator, pencapaian kompetensi untuk penilaian, alokasi waktu, dan sumber belajar</p>
                </a>
              </li>
              <!-- <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="<?php echo base_url('assets/gambar/features-1.png') ?>" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="<?php echo base_url('assets/gambar/features-2.png') ?>" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="<?php echo base_url('assets/gambar/features-3.png') ?>" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-4">
                <figure>
                  <img src="<?php echo base_url('assets/gambar/features-4.png') ?>" alt="" class="img-fluid">
                </figure>
              </div> -->
            </div>
          </div> 
        </div> 

      </div>
    </section><!-- End Features Section -->
    </div>
  </div>
<br>
<br>
</div>