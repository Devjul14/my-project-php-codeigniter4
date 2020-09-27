<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lokasi extends Migration
{
	public function up()
	{
		{
			$this->forge->addField([
				'id_lokasi'          => [
						'type'           => 'INT',
						'constraint'     => 11,
						'unsigned'       => true,
						'auto_increment' => true,
				],
				'lat'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
				],
				'long'          => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
					
				],
				'jalan' => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
				],
				'kota' => [
						'type'           => 'VARCHAR',
						'constraint'     => '255',
				],
				'negara' => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			]
	
				
		]);
		$this->forge->addKey('id_lokasi', true);
		$this->forge->createTable('lokasi');
		}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('lokasi');
	}
}
