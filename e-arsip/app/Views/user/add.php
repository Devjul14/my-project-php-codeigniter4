<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Add</h1>
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
                        <?php echo form_open_multipart('user/insert') ?>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" name="nama_user" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">Pilih Level</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="id_dep" class="form-control">
                                        <option value="">Pilih Department</option>
                                        <?php foreach ($dep as $key => $value) { ?>
                                            <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Foto</label>
                                </div>
                                <input type="file" class="form-control" name="foto" </div> </div> <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('user') ?>" class="btn btn-success">Kembali</a>
                            </div>
                        </form>
                        <?php echo form_close() ?>

                    </div>