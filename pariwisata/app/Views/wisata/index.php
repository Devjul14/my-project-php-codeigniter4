 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Daftar Wisata</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                 <div class="breadcrumb-item">Table</div>
             </div>
         </div>

         <div class="section-body">
             <div class="row">
                 <div class="col-10 col-md-12 col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <a href="wisata/add/" class="btn btn-icon icon-left btn-success"><i class="fa fa-plus"></i> Tambah</a>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-md">
                                     <tr>
                                         <th>No</th>
                                         <!-- <th>Gambar</th> -->
                                         <th>Nama</th>
                                         <th>Lokasi</th>
                                         <th>Kategori</th>
                                         <th>Harga Tiket</th>
                                         <!-- <th>Deskripsi</th> -->
                                         <th>Action</th>
                                     </tr>
                                     <tr>
                                         <?php
                                            $no = 1;
                                            foreach ($wisata as $wst) { ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <!-- <td><img src="<?php echo base_url('upload/' . $wst['photo']) ?>" alt="photo wisata" width="50px" height="50px"></td> -->
                                         <td><?php echo $wst['nama_wisata'] ?></td>
                                         <td><?php echo $wst['kota'] ?></td>
                                         <td><?php echo $wst['nama_kategori'] ?></td>
                                         <td><?php echo $wst['tiket'] ?></td>
                                         <!-- <td><?php echo $wst['deskripsi'] ?></td> -->
                                         <td>
                                             <a href="/wisata/detail/<?php echo $wst['id_wisata'] ?>" class="btn btn-info">Detail</a>
                                             <a href="/wisata/edit/<?php echo $wst['id_wisata'] ?>" class="btn btn-warning">Edit</a>
                                             <a href="/wisata/delete/<?php echo $wst['id_wisata'] ?>" class="btn btn-danger">Hapus</a>
                                         </td>

                                     </tr>
                                 <?php } ?>

                                 </tr>

                                 </table>
                             </div>
                         </div>
                         <div class="card-footer text-right">
                             <nav class="d-inline-block">
                                 <ul class="pagination mb-0">
                                     <li class="page-item disabled">
                                         <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                     <li class="page-item">
                                         <a class="page-link" href="#">2</a>
                                     </li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                         <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                     </li>
                                 </ul>
                             </nav>
                         </div>
                     </div>
                 </div>