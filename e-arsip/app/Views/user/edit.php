<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card">
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    Kesalahan !
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?php echo esc($value) ?></li>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?= form_open_multipart('user/update/' . $user['id_user']) ?>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" name="nama_user" value="<?php echo $user['nama_user'] ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" readonly>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" value="<?php echo $user['password'] ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="<?php echo $user['level'] ?>"><?php if ($user['level'] == 1) {
                                                                                            echo 'Admin';
                                                                                        } else {
                                                                                            echo 'User';
                                                                                        } ?></option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="id_dep" class="form-control">
                                        <option value="<?php echo $user['id_dep'] ?>"><?php echo $user['nama_dep'] ?></option>
                                        <?php foreach ($dep as $key => $value) { ?>
                                            <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="<?php echo base_url('foto/' . $user['foto']) ?>" width="160px">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Ganti Foto</label>
                                            <input type="file" class="form-control" name="foto" </div> </div> </div> </div> <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                            <a href="<?php echo base_url('user') ?>" class="btn btn-success">Kembali</a>
                                        </div>
                        </form>
                        <?php echo form_close() ?>

                    </div>