<div class="content-wrapper">
   <!--  header -->
    <section class="content-header">
      <!-- judul body -->
        <h1>
            <?= $title ?>
            <small>Atur profil anda disini</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Profil</li>
        </ol>
    </section>
    <!-- isi body -->
    <section class="content">
      
        <div class="box">
            <form class="form-horizontal" action="<?= base_url('index.php/admin/profil/update/').$this->session->userdata('id') ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
              <div class="box-body">
                <!-- untuk nama lengkap -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>" placeholder="Nama Lengkap" required>
                  </div>
                </div>
               <!--  untui No. Telephone -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Telephone</label>
                  <div class="col-sm-10">
                    <input type="number" name="telp" class="form-control" value="<?= $this->session->userdata('telp'); ?>" placeholder="No. Telephone" required>
                  </div>
                </div>
               <!--  untuk email -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="<?= $this->session->userdata('email'); ?>" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" value="<?= $this->session->userdata('alamat'); ?>" placeholder="alamat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="ttl" class="form-control" value="<?= $this->session->userdata('ttl'); ?>" placeholder="ttl" required>
                  </div>
                </div>
                <!-- untuk username -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" value="<?= $this->session->userdata('username'); ?>" placeholder="Username" required>
                  </div>
                </div>
                <!-- untuk new password -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">New Password <font color="red">*)</font></label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="****" value="<?= $this->session->userdata('password') ?>" disabled>
                  </div>
                </div>
                <!-- untuk milih tema -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Skin</label>
                  <div class="col-sm-10">
                    <select name="skin" class="form-control" required>
                        <option value="<?= $this->session->userdata('skin') ?>" selected><?= $this->session->userdata('skin') ?></option>
                        <option value="" disabled> -- Pilih Skin Lain -- </option>
                        <option value="yellow">yellow</option>
                        <option value="red">red</option>
                        <option value="green">green</option>
                        <option value="purple">purple</option>
                        <option value="blue">blue</option>
                    </select>
                  </div>
                </div>
                <!-- untuk level jd guru/admin -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $this->session->userdata('level') ?>" disabled>
                  </div>
                </div>
               <!--  kapan dia terdaftar -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Terdaftar</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= date('d M Y H:i:s', strtotime($this->session->userdata('terdaftar'))) ?>" disabled>
                  </div>
                </div>
                <!-- untuk foto -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto <font color="red">*)</font></label>

                  <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control-file"> <br>
                    <img src="<?= base_url('assets/profil/').$this->session->userdata('foto') ?>" width="200px">
                  </div>
                </div>
              </div><!--  end box-body -->
              <div class="box-footer">
              <small><b><i><font color="red">*) Kosongkan jika tidak ingin ada yang diubah!</font></i></b></small>
                <div class="pull-right">
                  <!-- untuk reset -->
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-trash"></div> Reset
                    </button>
                  <!--   untuk update -->
                    <button type="submit" class="btn btn-primary">
                        <div class="fa fa-save"></div> Update
                    </button>
                </div>
              </div>
            </form>
        </div>
    </section>
</div>