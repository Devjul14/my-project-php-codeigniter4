<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Wisata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Form Validation</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card">
                        <form action="wisata/save/" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Wisata</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi" id="lokasi">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" name="kategori" id="kategori">
                                </div>
                                <div class="form-group">
                                    <label>Harga Tiket</label>
                                    <input type="text" class="form-control" name="tiket" id="tiket">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group mb-0">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="/wisata/save" class="btn btn-primary">Submit</a>
                            </div>
                        </form>
                    </div>