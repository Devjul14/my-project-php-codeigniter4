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
                             <a href="<?= base_url('user/add') ?>" class="btn btn-icon icon-left btn-warning">
                                 <i class="fa fa-plus"></i> Tambah </a>
                         </div>

                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-md">
                                     <tr>
                                         <th>No</th>
                                         <th>Nama User</th>
                                         <th>Email</th>
                                         <th>Level</th>
                                         <th>Department</th>
                                         <th>Foto</th>
                                         <th>Action</th>
                                     </tr>
                                     <tr>
                                         <?php
                                            $no = 1;
                                            foreach ($user as $row) { ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <td><?php echo $row['nama_user'] ?></td>
                                         <td><?php echo $row['email'] ?></td>
                                         <td><?php if ($row['level'] == 1) {
                                                    echo 'Admin';
                                                } else {
                                                    echo 'User';
                                                } ?></td>
                                         <td><?php echo $row['nama_dep'] ?></td>
                                         <td><img src="<?php echo base_url('foto/' . $row['foto']) ?>" width="60px"></td>

                                         <td>
                                             <a href="<?php echo base_url('user/edit/' . $row['id_user']) ?>" class="btn btn-icon icon-left btn-success">Edit </a>
                                             <button type="button" class="btn btn-icon icon-left btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id_user']; ?>">Hapus </button>
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
                 <?php foreach ($user as $row) { ?>
                     <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="delete<?php echo $row['id_user']; ?>">
                         <div class="modal-dialog modal-sm">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Peringatan</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     Anda Yakin Hapus <b><?php echo $row['nama_user']; ?></b>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                     <a href="<?php echo base_url('user/delete/' . $row['id_user']) ?>" type="submit" class="btn btn-success">Ya</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php } ?>