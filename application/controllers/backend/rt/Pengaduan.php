<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends Backend {

	public function __construct()
	{
		parent::__construct();
		$this->is_rt();
		$this->load->model('Laporan_pengaduan_model');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi($rt['id_rj']);

		$data = [
			'sidebar' => 3,
			'tittle' => 'Daftar Pengaduan Baru',
			'pengaduan' => $pengaduan,
			'header' => 'daftar pengaduan baru',
			'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Baru','link'=>'admin/rt/pengaduan'],
											],
		];

		$this->layout->load_backend('backend/rt/pengaduan/baru/daftar', $data);
	}

	public function valid()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_valid($rt['id_rj']);

		$data = [
			'sidebar' => 4,
			'tittle' => 'Daftar Pengaduan',
			'pengaduan' => $pengaduan,
			'header' => 'daftar pengaduan',
			'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Valid','link'=>'admin/rt/pengaduan/valid'],
											],

		];

		$this->layout->load_backend('backend/rt/pengaduan/valid/daftar', $data);
	}

	public function spam()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($rt['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_spam($rt['id_rj']);

		$data = [
			'sidebar' => 6,
			'tittle' => 'Daftar Spam',
			'pengaduan' => $pengaduan,
			'header' => 'daftar spam',
			'small' => 'Wilayah RT-'.$alamat['nama_rt'].' / RW-'.ucwords(strtolower($alamat['nama_rw'])).', '.ucwords(strtolower($alamat['nama_kel'])).', '.ucwords(strtolower($alamat['nama_kec'])),
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Spam','link'=>'admin/rt/pengaduan/spam'],
											],
		];

		$this->layout->load_backend('backend/rt/pengaduan/spam/daftar', $data);
	}

	public function detail($id_pengaduan)
	{
		$pengaduan = $this->Laporan_pengaduan_model->detail($id_pengaduan);

		$this->load->model('Gambar_pengaduan_model');
		$gambar = $this->Gambar_pengaduan_model->get_gambar($pengaduan['id_pengaduan']);

		$this->load->model('Komentar_pengaduan_model');
		$komentar = $this->Komentar_pengaduan_model->getKomentar($pengaduan['id_pengaduan']);
		$jumlah = $this->Komentar_pengaduan_model->getTotalKomentar($pengaduan['id_pengaduan']);

		$this->load->model('Riwayat_alamat_model');
		$alamat = $this->Riwayat_alamat_model->get_alamat($pengaduan['id_pdk']);

		$data = [
			'sidebar' => 3,
			'tittle' => 'Detail Pengaduan',
			'crumb' => [
												['label'=>'Ketua RT','link'=>'admin/rt'],
												['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
												['label'=>'Detail Pengaduan','link'=>'admin/rt/pengaduan/detail/'.$id_pengaduan]


									],
			'header' => 'detail pengaduan',
			'small' => ucwords(strtolower($pengaduan['nama_kategori'])),
			'pengaduan' => $pengaduan,
			'alamat' => $alamat,
			'gambar' => $gambar,
			'komentar' => $komentar,
			'jumlah' => $jumlah['total'],
			'fungsi' => 'http://viralpatel.net/blogs/demo/jquery/jquery.shorten.1.0.js',
		];

		$this->layout->load_backend('backend/rt/pengaduan/detail', $data);
	}

	public function disposisi()
	{
		$rt = $this->session->userdata('admin');

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_disposisi($rt['id_rj']);
		$data = [
      'sidebar' => 5,
      'header' => 'Disposisi',
      'crumb' =>  [
                    ['label'=>'Ketua RT','link'=>'admin/rt'],
										['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
                    ['label'=>'Disposisi','link'=>'admin/rt/pengaduan/disposisi'],
                      ],
      'small' => 'Daftar Pengaduan Yang Telah Didisposisikan',
			'disposisi' => $pengaduan,
    ];

		$this->layout->load_backend('backend/rt/pengaduan/disposisi/daftar', $data);
	}

	public function daftar()
	{
		$admin = $this->session->userdata('admin');

		// $this->load->model('Riwayat_alamat_model');
		// $alamat = $this->Riwayat_alamat_model->get_alamat($admin['id_pdk']);

		$this->load->model('Disposisi_pengaduan_model');
		$pengaduan = $this->Disposisi_pengaduan_model->get_disposisi_ok($admin['id_rj']);
		$data = [
      'sidebar' => 7,
      'header' => 'Disposisi',
      'crumb' =>  [
                    ['label'=>'Ketua RT','link'=>'admin/rt'],
										['label'=>'Pengaduan','link'=>'admin/rt/pengaduan'],
                    ['label'=>'Daftar Pengaduan','link'=>'admin/rt/pengaduan/daftar'],
                      ],
      'small' => 'Daftar Pengaduan Yang Telah Ditanggapi',
			'pengaduan' => $pengaduan,
    ];

		$this->layout->load_backend('backend/rt/pengaduan/ok/daftar', $data);
	}



}
