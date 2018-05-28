<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('murid_model');
		if ( ! $this->session->userdata('logged_in') === TRUE && ! $this->session->userdata('rule') == 0) {
			redirect('/');
		}
	}

	public function index()
	{
		$this->load->view('murid/index');
	}

	public function findteacher()
	{
		$data['hasil'] = "";
		$data['tingkat'] = $this->murid_model->get_tingkat()->result();
		$data['kabupaten'] = $this->murid_model->get_kabupaten()->result();
		$data['kecamatan'] = $this->murid_model->get_kecamatan($this->session->userdata('kabupaten'))->result();
		$this->load->view('murid/findteacher', $data);
	}

	public function search()
	{
		$data['kabupaten'] = $this->murid_model->get_kabupaten()->result();
		$data['tingkat'] = $this->murid_model->get_tingkat()->result();
		$data['hasil'] = $this->murid_model->search()->result();
		$data['kecamatan'] = $this->murid_model->get_kecamatan($this->session->userdata('kabupaten'))->result();
		$data['kecamatan2'] = $this->input->get('kecamatan');
		$this->load->view('murid/findteacher', $data);
	}

	public function kursus()
	{
		$data['data_kursus'] = $this->murid_model->get_data_kursus()->result();
		$this->load->view('murid/kursus', $data);
	}

	public function detail_kursus($id_kursus)
	{
		$data['data_kursus'] = $this->murid_model->get_kursus($id_kursus)->row();
		$data['guru'] = $this->murid_model->get_user($data['data_kursus']->guru)->row();
		$data['murid'] = $this->murid_model->get_user($data['data_kursus']->pemesan)->row();
		$data['waktu_kursus'] = $this->murid_model->get_waktu_kursus($id_kursus)->result();
		$this->load->view('murid/detail_kursus', $data);
	}

	public function delete_kursus($id_kursus)
	{
		if ($this->murid_model->delete_kursus($id_kursus) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('murid/kursus');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('murid/kursus');
		}
	}

	public function profil()
	{
		$data['kecamatan_awal'] = $this->murid_model->get_kecamatan_detail($this->session->userdata('kecamatan'))->row();
		$data['kecamatan'] = $this->murid_model->get_kecamatan($this->session->userdata('kabupaten'))->result();
		$data['data_tambahan'] = $this->murid_model->get_tambahan();
		$data['kabupaten'] = $this->murid_model->get_kabupaten()->result();
		$this->load->view('murid/profil', $data);
	}

	public function detail_guru($id_user, $id_mapel)
	{
		$data['mapel'] = $this->murid_model->get_mapel($id_mapel)->row();
		$data['kabupaten'] = $this->murid_model->get_kabupaten()->result();
		$data['tingkat'] = $this->murid_model->get_tingkat()->result();
		$data['user'] = $this->murid_model->get_user($id_user)->row();
		$data['data_tambahan'] = $this->murid_model->get_data_tambahan($id_user)->row();
		$data['data_profil'] = $this->murid_model->get_data_profil($id_user)->row();
		$data['data_publik'] = $this->murid_model->get_data_publik($id_user)->row();
		$data['data_pelajaran'] = $this->murid_model->get_data_pelajaran($id_user)->result();
		$data['data_pendidikan'] = $this->murid_model->get_data_pendidikan($id_user)->result();
		$data['jam_mengajar'] = $this->murid_model->get_jam_mengajar($id_user)->result();
		$data['kualifikasi_sertifikat'] = $this->murid_model->get_kualifikasi_sertifikat($id_user)->result();
		$data['lokasi_mengajar'] = $this->murid_model->get_lokasi_mengajar($id_user)->result();
		$data['pengalaman_mengajar'] = $this->murid_model->get_pengalaman_mengajar($id_user)->result();
		$this->load->view('murid/detail-guru', $data);
	}

	public function update_users()
	{
		if ($this->murid_model->update_users() === TRUE) {
			$this->session->set_userdata($this->murid_model->get_users()->row_array());
			$this->session->set_flashdata('message_success', 'Update data awal berhasil!');
			$this->session->set_flashdata('tab', 'tab_2');
			redirect('murid/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Update data awal gagal!');
			redirect('murid/profil');
		}
	}

	public function data_tambahan()
	{
		if ($this->murid_model->update_data_tambahan() == TRUE) {
			$this->session->set_flashdata('message_success', 'Update data tambahan berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('murid/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_2');
			redirect('murid/profil');
		}
	}

	public function data_profil()
	{
		if ($this->murid_model->update_data_profil() == TRUE) {
			$this->session->set_userdata($this->murid_model->get_users()->row_array());
			$this->session->set_flashdata('message_success', 'Update data profil berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('murid/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('murid/profil');
		}
	}

	public function kecamatan($id = '')
	{
		echo json_encode($this->murid_model->get_kecamatan($id)->result_array());
	}

	public function pelajaran($id_tingkat = '')
	{
		echo json_encode($this->murid_model->get_pelajaran($id_tingkat));
	}

	public function pesan($id_mapel, $id_user, $id_vilages)
	{
		$data['mapel'] = $this->murid_model->get_mapel($id_mapel)->row();
		$data['user'] = $this->murid_model->get_user($id_user)->row();
		$data['jam_mengajar'] = $this->murid_model->get_jam_mengajar($id_user)->result();
		$data['lokasi_mengajar'] = $this->murid_model->get_lokasi_mengajar($id_user)->result();
		$data['kecamatan'] = $id_vilages;
		$this->load->view('murid/pesan', $data);
	}

	public function set_pesan()
	{
		$kode = $this->input->post('id_mapel').$this->input->post('guru').$this->session->userdata('id_user');
		$hasil = $this->murid_model->check_kode($kode)->num_rows()+$this->murid_model->check_kode2($kode)->num_rows();
		if ($hasil == 1) {
			$this->session->set_flashdata('message_error', 'Anda sudah memesan kursus dengan guru yang sama!');
			redirect('murid/findteacher');
		} else {
			$id = $this->murid_model->set_data_kursus();
			$this->murid_model->set_waktu_kursus($id);
			$msg = "Pesanan terbaru kursus ".$this->input->post('nama_mapel')." dari ".$this->input->post('pemesan')."\nSilahkan cek pada halaman kursus di http://findingteacher.win/\n\nttd\nAdmin Finding Teacher";
			$msg = wordwrap($msg,70);
			$rcpt = $this->input->post('email');
			$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
			mail($rcpt,"Pesanan Kursus Baru",$msg,$header);
			$this->session->set_flashdata('message_success', 'Pemesanan kursus berhasil!');
			redirect('murid/kursus');
		}
	}

	public function reset_password()
	{
		if (sha1($this->input->post('old_password')) == $this->murid_model->get_users()->row()->password) {
			if (sha1($this->input->post('new_password')) == $this->murid_model->get_users()->row()->password) {
				$this->session->set_flashdata('message_error', 'Password baru yang dimasukkan sama dengan password lama!');
				$this->session->set_flashdata('tab', 'tab_4');
				redirect('murid/profil');
			} else {
				$this->murid_model->update_password();
				$this->session->set_flashdata('message_success', 'Update password berhasil!');
				$this->session->set_flashdata('tab', 'tab_4');
				redirect('murid/profil');
			}
			
		}else{
			$this->session->set_flashdata('message_error', 'Password lama yang dimasukkan salah!');
			$this->session->set_flashdata('tab', 'tab_4');
			redirect('murid/profil');
		}
	}

	public function check_notif()
	{
		echo json_encode($this->murid_model->get_notif()->result());
	}

	public function check_notif2()
	{
		echo json_encode($this->murid_model->get_notif2()->result());
	}

	public function jam_kursus($id_jam = '')
	{
		echo json_encode($this->murid_model->get_jam_kursus($id_jam));
	}
}
