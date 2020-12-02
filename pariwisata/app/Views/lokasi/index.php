 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Daftar Lokasi</h1>
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
                             <a href="lokasi/add" class="btn btn-icon icon-left btn-success"><i class="fa fa-plus"></i> Tambah</a>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-md">
                                     <tr>
                                         <th>No</th>
                                         <th>Lat</th>
                                         <th>Long</th>
                                         <th>Jalan</th>
                                         <th>Kota</th>
                                         <th>Negara</th>
                                         <!-- <th>Deskripsi</th> -->
                                         <th>Action</th>
                                     </tr>
                                     <tr>
                                         <?php
                                            $no = 1;
                                            foreach ($lokasi as $lok) { ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <td><?php echo $lok['lat'] ?></td>
                                         <td><?php echo $lok['long'] ?></td>
                                         <td><?php echo $lok['jalan'] ?></td>
                                         <td><?php echo $lok['kota'] ?></td>
                                         <td><?php echo $lok['negara'] ?></td>
                                         <td>
                                             <a href="/lokasi/detail/<?php echo $lok['id_lokasi'] ?>" class="btn btn-info">Maps</a>
                                             <a href="/lokasi/edit/<?php echo $lok['id_lokasi'] ?>" class="btn btn-warning">Edit</a>
                                             <a href="/lokasi/delete/<?php echo $lok['id_lokasi'] ?>" class="btn btn-danger">Hapus</a>
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