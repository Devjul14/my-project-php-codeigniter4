<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariwisata</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Harga Tiket</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($wisata as $wst) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><img src="<?php echo base_url('upload/' . $wst['photo']) ?>" alt="photo wisata" width="50px" height="50px"></td>
                    <td><?php echo $wst['nama_wisata'] ?></td>
                    <td><?php echo $wst['kota'] ?></td>
                    <td><?php echo $wst['nama_kategori'] ?></td>
                    <td><?php echo $wst['tiket'] ?></td>
                    <td><?php echo $wst['deskripsi'] ?></td>
                    <td><a href="/wisata/edit/<?php echo $wst['id_wisata'] ?>">Edit</a>
                        |
                        <a href="/wisata/detail/<?php echo $wst['id_wisata'] ?>">Detail</a>
                        |
                        <a href="/wisata/delete/<?php echo $wst['id_wisata'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <a href="/wisata/add">Add</a>
</body>

</html>