<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $kategori = [
		'nama_kategori' => 'required',

	];

	public $kategori_errors = [
		'nama_kategori' => [
			'required' => 'Nama wajib diisi.'
		],

	];

	public $wisata = [
		'nama_wisata' => 'required',
		'id_lokasi' => 'required',
		'id_kategori' => 'required',
		'tiket' => 'required',
		'deskripsi' => 'required',
	];

	public $wisata_errors = [
		'nama_wisata' => [
			'required' => 'Nama Produk wajib diisi.'
		],
		'kota' => [
			'required' => 'lokasi Produk wajib diisi.'
		],
		'nama_kategori' => [
			'required' => 'kategori Produk wajib diisi.'
		],
		'tiket' => [
			'required' => 'tiket Produk wajib diisi.'
		],
		'deskripsi' => [
			'required' => 'deskripsi Produk wajib diisi.'
		],
	];

	public $lokasi = [
		'id_lokasi' => 'required',
		'lat' => 'required',
		'long' => 'required',
		'jalan' => 'required',
		'kota' => 'required',
		'negara' => 'required',
	];

	public $lokasi_errors = [
		'id_lokasi' => [
			'required' => 'id Produk wajib diisi.'
		],
		'lat' => [
			'required' => 'lat Produk wajib diisi.'
		],
		'long' => [
			'required' => 'long Produk wajib diisi.'
		],
		'jalan' => [
			'required' => 'jalan Produk wajib diisi.'
		],
		'kota' => [
			'required' => 'kota Produk wajib diisi.'
		],
		'negara' => [
			'required' => 'negara Produk wajib diisi.'
		],
	];
}
