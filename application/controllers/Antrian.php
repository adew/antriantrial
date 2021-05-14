<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
{

	public function index()
	{

		$tanggal = date('Y-m-d');
		$data['nomor1'] = $this->get_last(1, $tanggal);
		$data['nomor2'] = $this->get_last(2, $tanggal);
		$data['nomor3'] = $this->get_last(3, $tanggal);
		$data['nomor4'] = $this->get_last(4, $tanggal);
		$data['nomor5'] = $this->get_last(5, $tanggal);
		$this->load->view('view_antrian', $data);
	}

	public function antrian_baru()
	{
		$this->load->view('welcome_message');
	}


	public function print_antrian()
	{
		$noloket = $this->uri->segment(3);

		$tanggal_sekarang = date('Y-m-d');
		$nomor = $this->generate_antrian($noloket, $tanggal_sekarang);
		echo $nomor;
	}

	public function generate_antrian($noloket, $tanggal)
	{

		$query = $this->db->query('SELECT max(nomor) as nomor FROM antrian WHERE no_loket = "' . $noloket . '" AND  tanggal = "' . $tanggal . '"');

		if ($query->num_rows() > 0) {

			$nomor_lama = $query->row()->nomor;
			$nomor_baru = $nomor_lama + 1;
			$nomor 		= $nomor_baru;

			$data = array(
				'tanggal' => $tanggal,
				'nomor' => $nomor_baru,
				'no_loket' => $noloket,
				'status' => 'waiting'
			);
			$this->db->insert('antrian', $data);
		} else {

			$nomor = 1;
			$data = array(
				'tanggal' => $tanggal,
				'nomor' => $nomor,
				'no_loket' => $noloket,
				'status' => 'waiting'
			);
			$this->db->insert('antrian', $data);
		}

		return $nomor;
	}

	public function get_last($noloket, $tanggal)
	{

		$query = $this->db->query('SELECT max(nomor) as nomor FROM antrian WHERE no_loket = "' . $noloket . '" AND tanggal = "' . $tanggal . '"');
		return $query->row()->nomor;
	}
}
