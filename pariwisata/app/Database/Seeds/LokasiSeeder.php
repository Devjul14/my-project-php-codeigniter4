<?php

namespace App\Database\Seeds;

class LokasiSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'id_lokasi' => '',
                'lat'    => '-8.5830695',
                'long' => '116.3202515',
                'jalan' => 'kartini',
                'kota' => 'cirebon',
                'negara' => 'Indonesia'

            ],
            [
                'id_lokasi' => '',
                'lat'    => '-8.5830695',
                'long' => '116.3202515',
                'jalan' => 'sartika',
                'kota' => 'cirebon',
                'negara' => 'Indonesia'
            ],
            [
                'id_lokasi' => '',
                'lat'    => '-6.859524',
                'long' => '108.647080',
                'jalan' => 'Tarjan RT03 RW04',
                'kota' => 'cirebon',
                'negara' => 'Indonesia'
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //         $data
        // );

        // Using Query Builder
        // $this->db->table('wisata')->insert($data);
        $this->db->table('lokasi')->insertBatch($data);
    }
}
