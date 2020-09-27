<?php namespace App\Database\Seeds;

class KategoriSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                    [
                        'id_kategori' => '',
                        'nama_kategori'    => 'Alam',
                    ],
                    [
                        'id_kategori' => '',
                        'nama_kategori'    => 'Sejarah',
                    ],
                    [
                        'id_kategori' => '',
                        'nama_kategori'    => 'Kuliner',
                    ],
                    [
                        'id_kategori' => '',
                        'nama_kategori'    => 'Belanja',
                    ]
                ];

                // Simple Queries
                // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
                //         $data
                // );

                // Using Query Builder
                // $this->db->table('wisata')->insert($data);
                $this->db->table('kategori')->insertBatch($data);
        }
}