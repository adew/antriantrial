<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{

	public function index()
	{
		$data['data_slider'] = $this->db->where(array('status' => 'Enable'))->order_by('sort_order', 'DESC')->get('slider')->result_array();
		$this->load->view('view_monitor', $data);
	}

	public function get_data()
	{

		$array_monitor = array();
		$tanggal = date('Y-m-d');
		$data['nomor1'] = $this->get_last(1, $tanggal);
		$data['nomor2'] = $this->get_last(2, $tanggal);
		$data['nomor3'] = $this->get_last(3, $tanggal);
		$data['nomor4'] = $this->get_last(4, $tanggal);
		$data['nomor5'] = $this->get_last(5, $tanggal);


		array_push($array_monitor, $data);
		echo json_encode($data);
	}

	public function get_last($noloket, $tanggal)
	{

		$query = $this->db->query('SELECT max(nomor) as nomor FROM antrian WHERE status = "servicing" AND no_loket = "' . $noloket . '" AND tanggal = "' . $tanggal . '"');
		if (is_null($query->row()->nomor)) {
			return '00';
		} else {
			return str_pad($query->row()->nomor, 2, '0', STR_PAD_LEFT);
		}
	}

	// public function get_data()
	// {

	// 	$array_monitor = array();
	// 	$tanggal = date('Y-m-d');
	// 	$data_user = $this->db->where(array('status' => 'on'))->get('user')->result_array();
	// 	foreach ($data_user as $data) {
	// 		$query = $this->db->query('SELECT max(nomor) as nomor,antrian.status as status, antrian.user_id as user_id, nama, loket_temp FROM antrian LEFT JOIN user ON antrian.user_id = user.user_id WHERE tanggal = "' . $tanggal . '" AND antrian.status = "servicing" AND antrian.user_id = ' . $data['user_id']);

	// 		if (in_array('null', $query->result_array())) {
	// 		} else {
	// 			array_push($array_monitor, $query->row());
	// 		}
	// 	}
	// 	echo json_encode($array_monitor);
	// }
}
