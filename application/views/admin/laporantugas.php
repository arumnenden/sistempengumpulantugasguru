<!-- ADMIN (Data tugas)-->
<!-- Tampilan Laporan tugas -->
<div class="content-wrapper">
    <!-- header -->
    <section class="content-header">
        <!-- judul halaman body -->
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <?php
    date_default_timezone_set('Asia/Jakarta');
    ?>
   <!--  isi body halaman -->
    <section class="content">
        <div class="box">
            <!-- <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                    <div class="fa fa-plus"></div> Tambah Data
                </button>
            </div> -->
            <div class="box-body"> <!-- table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <!-- bagian aas table -->
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Tipe Tugas</th>
                                <th>Nama Guru</th>
                                <th>Judul</th>
                                <th>Kelas</th>
                                <th>Tanggal Upload</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                       <!--  bagian body table -->
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tugasjurnal->result_array() as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['tipe_tugas'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['judul'] ?></td>
                                    <td><?= $row['kelas'] ?></td>
                                    <td><?= $row['tanggal_upload'] ?></td>
                                    <td>
                                        <!-- untuk lihat tugas -->
                                        <a href="<?= $row['tugas_jurnal'] ?>" target='_blank' class="btn btn-warning">
                                            <div class="fa fa-eye"></div> Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <!-- untuk download 1 -->
                                        <!-- <a href="<?= $row['tugas_jurnal'] ?>" target='_blank' class="btn btn-success">
                                            <div class="fa fa-download"> </div>
                                        </a> -->
                                        <!-- untuk download 2 -->
                                        <!-- <a href="<?= base_url('index.php/admin/laporantugas/download/') . $row['id'] ?>" target='_blank' class="btn btn-success">
                                            <div class="fa fa-download"> </div>
                                        </a> -->
                                        <!-- untuk hapus -->
                                        <a href="<?= base_url('index.php/admin/laporantugas/delete/') . $row['id'] ?>" class="btn btn-danger btn-sm tombol-yakin" data-isidata="Data yang berhubungan akan terhapus juga!">
                                            <div class="fa fa-close"></div>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Tampilan untuk jika mau tambah data untuk guru -->
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah <?= $title ?></h4>
            </div>
            <form action="<?= base_url('index.php/admin/tugasjurnal/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipe Tugas</label> <!-- untuk pilih tipe tugas -->
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <select name="tipe_tugas" class="form-control" required>
                                    <option value="" disabled selected> -- Pilih Tipe Tugas -- </option>
                                    <option value="Tugas Jurnal Harian">Tugas Jurnal Harian</option>
                                    <option value="Tugas RPP">Tugas RPP</option>
                                    <option value="Tugas Program Semester">Tugas Program Semester</option>
                                    <option value="Tugas Program Tahunan">Tugas Program Tahunan</option>
                                     <option value="Tugas Program Tahunan">Tugas Silabus</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <input type="text" name="nama" class="form-control" placeholder="isikan Nama" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Isikan Judul" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Isikan Kelas" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Link Tugas</label>
                                <input type="text" name="tugas_jurnal" class="form-control" placeholder="Tugas Jurnal" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-trash"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Tampilan untuk edit data -->
<!-- Modal Edit Data -->
<?php foreach ($tugasjurnal->result() as $th) { ?>
    <div class="modal fade" id="editData<?= $th->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $title ?></h4>
                </div>
                <form action="<?= base_url('index.php/admin/tugasjurnal/update/') . $th->id ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipe Tugas</label><!--  pilihan tipe tugas -->
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <select name="tipe_tugas" class="form-control" required>
                                        <option value="" disabled selected> -- Pilih Tipe Tugas -- </option>
                                        <option value="Tugas Jurnal Harian" <?= ($th->tipe_tugas == 'Tugas Jurnal Harian') ? 'selected' : '' ?>>Tugas Jurnal Harian</option>
                                        <option value="Tugas RPP" <?= ($th->tipe_tugas == 'Tugas RPP') ? 'selected' : '' ?>>Tugas RPP</option>
                                        <option value="Tugas Program Semester" <?= ($th->tipe_tugas == 'Tugas Program Semester') ? 'selected' : '' ?>>Tugas Program Semester</option>
                                        <option value="Tugas Program Tahunan" <?= ($th->tipe_tugas == 'Tugas Program Tahunan') ? 'selected' : '' ?>>Tugas Program Tahunan</option>
                                        <option value="Tugas Silabus" <?= ($th->tipe_tugas == 'Tugas Silabus') ? 'selected' : '' ?>>Tugas Silabus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $th->nama ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $th->judul ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?= $th->kelas ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link Tugas</label>
                                    <input type="text" name="tugas_jurnal" class="form-control" placeholder="Tugas Jurnal" value="<?= $th->tugas_jurnal ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">
                            <div class="fa fa-trash"></div> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <div class="fa fa-save"></div> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>