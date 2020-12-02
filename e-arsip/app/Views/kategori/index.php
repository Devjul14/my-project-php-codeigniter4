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
                 <div class="col-6 col-md-6 col-lg-6">
                     <div class="card">
                         <div class="card-header">
                             <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#add">
                                 <i class="fa fa-plus"></i> Tambah </button>
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
                                             <button type="button" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#edit<?php echo $row['id_kategori']; ?>">Edit </button>
                                             <button type="button" class="btn btn-icon icon-left btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id_kategori']; ?>">Hapus </button>
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


                 <!-- Modal Add Kategori-->
                 <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="add">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title">Form Add</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <?php echo form_open('kategori/add') ?>
                                 <div class="form-group">
                                     <label>Nama Kategori</label>
                                     <input name="nama_kategori" type="text" class="form-control" required>
                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                             </div>
                             <?php echo form_close() ?>
                         </div>
                     </div>
                 </div>

                 <!-- Modal Edit Kategori -->
                 <?php foreach ($kategori as $row) { ?>
                     <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="edit<?php echo $row['id_kategori']; ?>">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Form Edit</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <?php echo form_open('kategori/edit/' . $row['id_kategori']) ?>
                                     <div class="form-group">
                                         <label>Nama Kategori</label>
                                         <input name="nama_kategori" value="<?php echo $row['nama_kategori']; ?>" type="text" class="form-control" required>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary">Edit</button>
                                 </div>
                                 <?php echo form_close() ?>
                             </div>
                         </div>
                     </div>
                 <?php } ?>

                 <!-- Modal Delete Kategori -->
                 <?php foreach ($kategori as $row) { ?>
                     <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" id="delete<?php echo $row['id_kategori']; ?>">
                         <div class="modal-dialog modal-sm">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Peringatan</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     Anda Yakin Hapus <b> <?php echo $row['nama_kategori']; ?></b>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                     <a href="<?php echo base_url('kategori/delete/' . $row['id_kategori']) ?>" type="submit" class="btn btn-success">Ya</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php } ?>