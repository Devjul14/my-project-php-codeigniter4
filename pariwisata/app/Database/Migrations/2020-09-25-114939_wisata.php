<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wisata extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_wisata'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'nama_wisata'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'id_lokasi'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				
			],
			'id_kategori'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				
			],
			'tiket' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'deskripsi' => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'photo' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
		]

			
	]);
	$this->forge->addKey('id_wisata', true);
	$this->forge->createTable('wisata');
	}
	public function down()
	{
		$this->forge->dropTable('wisata');
	}
}


	
