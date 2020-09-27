<?php namespace App\Database\Seeds;

class WisataSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                    [
                        'id_wisata' => '',
                        'nama_wisata'    => 'Pantai Kejawanan',
                        'id_lokasi' => '1',
                        'id_kategori' => '1',
                        'tiket' => '3000',
                        'deskripsi' => 'Pantai paling dekat dari kota cirebon',
                        'photo' => ''
                    ],
                    [
                        'id_wisata' => '',
                        'nama_wisata'    => 'Setu Sedong',
                        'id_lokasi' => '1',
                        'id_kategori' => '1',
                        'tiket' => '200',
                        'deskripsi' => 'Setu yang ada di kota cirebon',
                        'photo' => ''
                    ],
                    [
                        'id_wisata' => '',
                        'nama_wisata'    => 'Kasepuhan',
                        'id_lokasi' => '1',
                        'id_kategori' => '1',
                        'tiket' => '3000',
                        'deskripsi' => 'Wisata sejarah dekat dari kota cirebon',
                        'photo' => ''
                    ]
                ];

                // Simple Queries
                // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
                //         $data
                // );

                // Using Query Builder
                // $this->db->table('wisata')->insert($data);
                $this->db->table('wisata')->insertBatch($data);
        }
}