<!-- GURU (Data tugas) -->

<div class="content-wrapper">
    <!-- header -->
    <section class="content-header">
        <!-- judul body halaman -->
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
<!--- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- body -->
    <section class="content">
        <div class="box">
            <!-- untuk upload tugas -->
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                    <div class="fa fa-plus"></div> Upload Tugas
                </button>
            </div>
           <!--  table tugas -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <!-- judul table -->
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Tipe Tugas</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Kelas</th>
                                <th>Tugas Jurnal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                       <!--  body tbl di ambil dr database -->
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
                                    <td><?= $row['tugas_jurnal'] ?></td>

                                    <td>

                                        <!-- Detail
                                        <a href="<?= base_url('index.php/admin/tugasjurnal/detailrouter/') . $row['id'] ?>" class="btn btn-info btn-xs">
                                            <div class="fa fa-eye"></div> Detail
                                        </a>
                                        -->
                                        <!--  untuk edit -->
                                        <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editData<?= $row['id'] ?>">
                                            <div class="fa fa-edit"></div> Edit
                                        </button>
                                    <!--     untuk delete -->
                                        <a href="<?= base_url('index.php/admin/tugasjurnal/delete/') . $row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Data yang berhubungan akan terhapus juga!">
                                            <div class="fa fa-trash"></div> Delete
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
<!-- =================================================================================================== -->
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- judul pada form -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload <?= $title ?></h4>
            </div>
           <!--  isi form -->
            <form action="<?= base_url('index.php/admin/tugasjurnal/insert') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                           <!--  milih tipe tugas -->
                            <div class="form-group">
                                <label>Tipe Tugas</label>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <select name="tipe_tugas" class="form-control" required>
                                    <option value="" disabled selected> -- Pilih Tipe Tugas -- </option>
                                    <option value="Tugas Jurnal Harian">Tugas Jurnal Harian</option>
                                    <option value="Tugas RPP">Tugas RPP</option>
                                    <option value="Tugas Program Semester">Tugas Program Semester</option>
                                    <option value="Tugas Program Tahunan">Tugas Program Tahunan</option>
                                    <option value="Tugas Silabus">Tugas Silabus</option>
                                </select>
                            </div>
                        </div>
                        <!-- untuk nama tugas -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <input type="text" name="nama" class="form-control" placeholder="isikan nama pengumpul" required>
                            </div>
                        </div>
                       <!--  untuk judul tugas -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="isikan judul tugas" required>
                            </div>
                        </div>
                        <!-- untuk kelas berapa -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="isikan kelas" required>
                            </div>
                        </div>
                        <!-- untuk link tugas -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tugas</label>
                                <input type="text" name="tugas_jurnal" class="form-control" placeholder="isikan link document tugas" required>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- untuk reset -->
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-trash"></div> Reset
                    </button>
                    <!-- untuk reset -->
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Modal Edit Data -->
<?php foreach ($tugasjurnal->result() as $th) { ?> 
    <div class="modal fade" id="editData<?= $th->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- judul form edit -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit <?= $title ?></h4>
                </div>
               <!--  isi form edit -->
                <form action="<?= base_url('index.php/admin/tugasjurnal/update/') . $th->id ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- untuk tipe tugas -->
                                    <label>Tipe Tugas</label>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <select name="tipe_tugas" class="form-control" required>
                                        <option value="" disabled selected> -- Pilih Tipe Tugas -- </option>
                                        <option value="Tugas Jurnal Harian" <?= ($th->tipe_tugas == 'Tugas Jurnal Harian') ? 'selected' : '' ?>>Tugas Jurnal Harian</option>
                                        <option value="Tugas RPP" <?= ($th->tipe_tugas == 'Tugas RPP') ? 'selected' : '' ?>>Tugas RPP</option>
                                        <option value="Tugas Program Semester" <?= ($th->tipe_tugas == 'Tugas Program Semester') ? 'selected' : '' ?>>Tugas Program Semester   </option>
                                        <option value="Tugas Program Tahunan" <?= ($th->tipe_tugas == 'Tugas Program Tahunan') ? 'selected' : '' ?>>Tugas Program Tahunan</option>
                                        <option value="Tugas Silabus" <?= ($th->tipe_tugas == 'Tugas Silabus') ? 'selected' : '' ?>>Tugas Silabus</option>
                                    </select>
                                </div>
                            </div>
                           <!--  untuk nama -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $th->nama ?>" required>
                                </div>
                            </div>
                           <!--  untuk judul -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $th->judul ?>" required>
                                </div>
                            </div>
                            <!-- untuk kelas apa -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?= $th->kelas ?>" required>
                                </div>
                            </div>
                            <!-- untuk link tugas -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tugas</label>
                                    <input type="text" name="tugas_jurnal" class="form-control" placeholder="Tugas Jurnal" value="<?= $th->tugas_jurnal ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                       <!--  untuk reset -->
                        <button type="reset" class="btn btn-danger">
                            <div class="fa fa-trash"></div> Reset
                        </button>
                       <!--  untuk update -->
                        <button type="submit" class="btn btn-primary">
                            <div class="fa fa-save"></div> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>