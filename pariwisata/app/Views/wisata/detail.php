<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Wisata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="card mb-3">
            <img src="<?php echo base_url('upload/' . $wisata['photo']) ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $wisata['nama_wisata'] ?></h5>
                <p class="card-text"><?php echo $wisata['deskripsi'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>

        <a href="/wisata" class="btn btn-icon icon-left btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>