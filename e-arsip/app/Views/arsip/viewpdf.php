<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>View File</h1>
        </div>
        <div class="row">
            <div class="col sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th>No_Arsip: <?php echo $arsip['no_arsip']  ?></th>
                        <th>Nama_Arsip: <?php echo $arsip['nama_arsip']  ?></th>
                        <th>Tgl_Upload: <?php echo $arsip['tgl_upload']  ?></th>
                        <th>User: <?php echo $arsip['nama_user']  ?></th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col sm-12">
            <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" width="100%" height="300" style="border:1px solid blue;">
            </iframe>

        </div>
</div>


</div>
</section>
</div>