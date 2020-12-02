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
                        <?= form_open_multipart('arsip/update/' . $arsip['id_arsip']);
                        helper('text');
                        $no_arsip = date('Y/m/d') . '-' . random_string('alnum', 2);
                        ?>

                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No Arsip</label>
                                    <input type="text" class="form-control" value="<?= $arsip['no_arsip']; ?>" name="no_arsip" readonly>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="id_kategori" class="form-control">
                                        <option value="<?= $arsip['id_kategori']; ?>"><?= $arsip['nama_kategori']; ?></option>
                                        <?php foreach ($kategori as $key => $value) { ?>
                                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Arsip</label>
                                    <input type="text" class="form-control" name="nama_arsip" value="<?= $arsip['nama_arsip']; ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="10"><?= $arsip['deskripsi']; ?></textarea>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Ganti File</label>
                                    <input type="file" class="form-control" name="file_arsip" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('arsip') ?>" class="btn btn-success">Kembali</a>
                            </div>
                        </form>
                        <?php echo form_close() ?>

                    </div>