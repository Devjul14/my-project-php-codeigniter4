 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1><?php echo $title ?></h1>
             <div class="section-header-breadcrumb">

             </div>
         </div>
         <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                              <div class="alert-title">Success !</div>';
                echo session()->getFlashdata('pesan');
                echo '</div>
                            </div>';
            } ?>

         <div class="section-body">
             <div class="row">
                 <div class="col-12 col-md-12 col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <a href="<?= base_url('arsip/add') ?>" class="btn btn-icon icon-left btn-warning">
                                 <i class="fa fa-plus"></i> Tambah </a>
                         </div>

                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-md">
                                     <tr>
                                         <th>No</th>
                                         <th>No Arsip</th>
                                         <th>Nama Arsip</th>
                                         <th>Kategori</th>
                                         <th>Upload</th>
                                         <th>Update</th>
                                         <th>Department</th>
                                         <th>User</th>
                                         <th>File</th>
                                         <th>Action</th>
                                     </tr>
                                     <tr>
                                         <?php
                                            $no = 1;
                                            foreach ($arsip as $row) { ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <td><?php echo $row['no_arsip'] ?></td>
                                         <td><?php echo $row['nama_arsip'] ?></td>
                                         <td><?php echo $row['nama_kategori'] ?></td>
                                         <td><?php echo $row['tgl_upload'] ?></td>
                                         <td><?php echo $row['tgl_update'] ?></td>
                                         <td><?php echo $row['nama_dep'] ?></td>
                                         <td><?php echo $row['nama_user'] ?></td>
                                         <td><a href="<?php echo base_url('arsip/viewpdf/' . $row['id_arsip']) ?>"><i class="fa fa-file-pdf fa-2x label-danger"></i></a></td>
                                         <td>
                                             <a href="<?php echo base_url('arsip/edit/' . $row['id_arsip']) ?>" class="btn btn-icon icon-left btn-success">Edit </a>
                                             <button type="button" class="btn btn-icon icon-left btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id_arsip']; ?>">Hapus </button>
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
                 <!-- Modal Delete User -->
                 <?php foreach ($arsip as $row) { ?>
                     <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="delete<?php echo $row['id_arsip']; ?>">
                         <div class="modal-dialog modal-sm">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Peringatan</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     Anda Yakin Hapus <b><?php echo $row['nama_arsip']; ?></b>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                     <a href="<?php echo base_url('arsip/delete/' . $row['id_arsip']) ?>" type="submit" class="btn btn-success">Ya</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php } ?>