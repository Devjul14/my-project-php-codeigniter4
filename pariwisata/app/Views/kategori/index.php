 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Daftar Kategori</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                 <div class="breadcrumb-item">Table</div>
             </div>
         </div>

         <div class="section-body">
             <div class="row">
                 <div class="col-6 col-md-6 col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             <a href="kategori/add" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-md">
                                     <tr>
                                         <th>No</th>
                                         <th>Nama Kategori</th>
                                         <th>Action</th>
                                     </tr>
                                     <tr>
                                         <?php
                                            $no = 1;
                                            foreach ($kategori as $row) { ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <td><?php echo $row['nama_kategori'] ?></td>
                                         <td>
                                             <a href="/kategori/edit/<?php echo $row['id_kategori'] ?>" class="btn btn-warning">Edit</a>
                                             <a href="/kategori/delete/<?php echo $row['id_kategori'] ?>" class="btn btn-danger">Hapus</a>
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