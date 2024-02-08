<!-- Admin (manajeen user)-->
<div class="content-wrapper">
   <!--  untuk judul body halaman -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small><?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>
   <!--  untuk isi body -->
    <section class="content">
        <div class="box">
            <!-- untuk nambah data user -->
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">
                    <div class="fa fa-plus"></div> Tambah Data
                </button>
            </div>
            <!-- isi form -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable">
                        <!-- judul judul table -->
                        <thead>
                            <tr>
                                <th width="10px">#</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Sebagai</th>
                                <th>Terdaftar</th>
                               <!--  <th>Foto</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- untuk isi table -->
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($user->result_array() as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['telp'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['level'] ?></td>
                                    <td><?= date('d F Y H:i:s', strtotime($row['terdaftar'])) ?></td>
                                    <!-- <td><img class="img-circle" src="<?= base_url('assets') ?>/profil/" > <?= $row['foto']?> </td>  -->
                                   
                                    <td>
                                        <?php if($this->session->userdata('id') == $row['id']) { ?>
                                            <a href="<?= base_url('index.php/admin/profil') ?>" class="btn btn-info btn-xs">
                                                <div class="fa fa-user"></div> My Profil <!-- untuk admin utama -->
                                            </a>
                                        <?php } else { ?>
                                            <!-- untuk reset pass -->
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#resetPassword<?= $row['id'] ?>">
                                                <div class="fa fa-lock"></div> Reset Password
                                            </button>
                                            <!-- untuk delete -->
                                            <a href="<?= base_url('index.php/admin/user/delete/').$row['id'] ?>" class="btn btn-danger btn-xs tombol-yakin" data-isidata="Account tidak bisa dipulihkan setelah dihapus">
                                                <div class="fa fa-trash"></div> Delete
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
                 <a href="<?= base_url(); ?>admin/dataguru/index"><button class="button button1">Data Guru</button></a>
            </div>
        </div>
    </section>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- udul form tambah data user -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
            </div>
           <!--  isi form tambah data -->
            <form action="<?= base_url('index.php/admin/user/insert') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Lengkap</label> <!-- untuk nama -->
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <label>Telp</label> <!-- no tlfn -->
                        <input type="number" name="telp" class="form-control" placeholder="Telp" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label> <!-- email -->
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label><!--  username -->
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label> <!-- password -->
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label>Sebagai</label><!--  level -->
                        <select name="level" class="form-control" required>
                            <option value="" disabled selected> -- Pilih Sebagai -- </option>
                            <option value="Administrator">Administrator</option>
                            <option value="Guru">Guru</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                    <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Modal Reset Password -->
<?php foreach ($user->result() as $reset) { ?>
    <div class="modal fade" id="resetPassword<?= $reset->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reset Password : <?= $reset->nama ?></h4>
                </div>

                <form action="<?= base_url('index.php/admin/user/resetpassword/').$reset->id ?>" method="POST">
                  <!--   masukin password baru -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                            <input type="password" name="password" class="form-control" placeholder="New Password" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
                        <button type="submit" class="btn btn-primary"><div class="fa fa-lock"></div> Reset Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php } ?>