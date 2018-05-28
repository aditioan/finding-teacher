<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin_model');
		if ( ! $this->session->userdata('logged_in') === TRUE && ! $this->session->userdata('rule') == 2) {
			redirect('/');
		}
	}

	public function index()
	{
		$this->load->view('superadmin/index');
	}

	public function reset()
	{
		$this->load->view('superadmin/reset');
	}

	public function reset_password_superadmin()
	{
		if (sha1($this->input->post('old_password')) == $this->superadmin_model->get_superadmin()->row()->password) {
			if (sha1($this->input->post('new_password')) == $this->superadmin_model->get_superadmin()->row()->password) {
				$this->session->set_flashdata('message_error', 'Password baru yang dimasukkan sama dengan password lama!');
				redirect('superadmin/reset');
			} else {
				$this->superadmin_model->update_password();
				$this->session->set_flashdata('message_success', 'Update password berhasil!');
				redirect('superadmin/reset');
			}
			
		}else{
			$this->session->set_flashdata('message_error', 'Password lama yang dimasukkan salah!');
			$this->session->set_flashdata('tab', 'tab_6');
			redirect('superadmin/reset');
		}
	}

	public function data_kabupaten()
	{
		$data['data_kabupaten'] = $this->superadmin_model->get_kabupaten()->result();
		$this->load->view('superadmin/data_kabupaten', $data);
	}

	public function data_kecamatan()
	{
		$data['data_kabupaten'] = $this->superadmin_model->get_kabupaten()->result();
		$data['data_kecamatan'] = $this->superadmin_model->get_kecamatan()->result();
		$this->load->view('superadmin/data_kecamatan', $data);
	}

	public function data_guru()
	{
		$data['data_kabupaten'] = $this->superadmin_model->get_kabupaten()->result();
		$data['data_guru'] = $this->superadmin_model->get_guru()->result();
		$this->load->view('superadmin/data_guru', $data);
	}

	public function verifikasi()
	{
		$data['data_guru'] = $this->superadmin_model->get_guru_verifikasi()->result();
		$this->load->view('superadmin/verifikasi', $data);
	}

	public function broadcast()
	{
		$this->load->view('superadmin/broadcast');
	}

	public function balas_kontak($email = '')
	{
		$data['email'] = urldecode($email);
		$this->load->view('superadmin/email', $data);
	}

	public function send_email()
	{
		$msg = $this->input->post('pesan');
		$rcpt = $this->input->post('email');
		$sbjct = $this->input->post('subjek');
		$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
		mail($rcpt, $sbjct, $msg, $header);
		$this->session->set_flashdata('message_success', 'Pesan berhasil di balas!');
		redirect('superadmin/kontak');
	}

	public function send_broadcast()
	{
		$mail_user = $this->superadmin_model->get_mail_user()->result();
		foreach ($mail_user as $key => $value) {
			$msg = $this->input->post('pesan');
			$rcpt = $value->email;
			$sbjct = $this->input->post('subjek');
			$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
			mail($rcpt, $sbjct, $msg, $header);
		}
		$this->session->set_flashdata('message_success', 'Email berhasil di broadcast!');
		redirect('superadmin/broadcast');
	}

	public function tagihan_guru()
	{
		$data['data_tagihan'] = $this->superadmin_model->get_data_tagihan()->result();
		$this->load->view('superadmin/tagihan_guru', $data);
	}

	public function kontak()
	{
		$data['data_kontak'] = $this->superadmin_model->get_kontak()->result();
		$this->load->view('superadmin/kontak', $data);
	}

	public function data_murid()
	{
		$data['data_kabupaten'] = $this->superadmin_model->get_kabupaten()->result();
		$data['data_murid'] = $this->superadmin_model->get_murid()->result();
		$this->load->view('superadmin/data_murid', $data);
	}

	public function tagihan($id_guru)
	{
		$data['data_pendapatan'] = $this->superadmin_model->get_pendapatan($id_guru)->result();
		$data['guru'] = $this->superadmin_model->get_user($id_guru)->row();
		$data['total_tagihan'] = $this->superadmin_model->get_total_tagihan($id_guru)->row();
		$data['data_tagihan'] = $this->superadmin_model->get_tagihan($id_guru)->result();
		$this->load->view('superadmin/tagihan', $data);
	}

	public function kecamatan($id = '')
	{
		echo json_encode($this->superadmin_model->get_data_kecamatan($id));
	}

	public function data_bank()
	{
		$data['data_bank'] = $this->superadmin_model->get_bank()->result();
		$this->load->view('superadmin/data_bank', $data);
	}

	public function update_kabupaten()
	{
		$pk = $this->input->post('pk');
		$name = $this->input->post('name');
		$value = $this->input->post('value');

		$retval = $this->superadmin_model->update_kabupaten($pk, $name, $value);
		echo $retval;
	}

	public function update_kecamatan()
	{
		$pk = $this->input->post('pk');
		$name = $this->input->post('name');
		$value = $this->input->post('value');

		$retval = $this->superadmin_model->update_kecamatan($pk, $name, $value);
		echo $retval;
	}

	public function update_bank()
	{
		$pk = $this->input->post('pk');
		$name = $this->input->post('name');
		$value = $this->input->post('value');

		$retval = $this->superadmin_model->update_bank($pk, $name, $value);
		echo $retval;
	}

	public function set_kecamatan()
	{
		$this->superadmin_model->set_kecamatan();
		$this->session->set_flashdata('message_success', 'Tambah data kecamatan berhasil!');
		redirect('superadmin/data-kecamatan');
	}

	public function set_bank()
	{
		$this->superadmin_model->set_bank();
		$this->session->set_flashdata('message_success', 'Tambah data bank berhasil!');
		redirect('superadmin/data-bank');
	}

	public function delete_kecamatan($id)
	{
		$this->superadmin_model->delete_kecamatan($id);
		$this->session->set_flashdata('message_success', 'Delete data kecamatan berhasil!');
		redirect('superadmin/data-kecamatan');
	}

	public function delete_bank($id)
	{
		$this->superadmin_model->delete_bank($id);
		$this->session->set_flashdata('message_success', 'Delete data bank berhasil!');
		redirect('superadmin/data-bank');
	}

	public function delete_kontak($id)
	{
		$this->superadmin_model->delete_kontak($id);
		$this->session->set_flashdata('message_success', 'Delete data pesan berhasil!');
		redirect('superadmin/kontak');
	}

	public function blok_user($id, $rule)
	{
		$this->superadmin_model->blok_user($id);
		$this->session->set_flashdata('message_success', 'User berhasil di blok!');
		if ($rule == 1) {
			redirect('superadmin/data-guru');
		} else {
			redirect('superadmin/data-murid');
		}
	}

	public function unblok_user($id, $rule)
	{
		$this->superadmin_model->unblok_user($id);
		$this->session->set_flashdata('message_success', 'User berhasil di unblok!');
		if ($rule == 1) {
			redirect('superadmin/data-guru');
		} else {
			redirect('superadmin/data-murid');
		}
	}

	public function detail_guru($id_user)
	{
		$data['user'] = $this->superadmin_model->get_user($id_user)->row();
		$data['data_tambahan'] = $this->superadmin_model->get_data_tambahan($id_user)->row();
		$data['data_profil'] = $this->superadmin_model->get_data_profil($id_user)->row();
		$data['data_publik'] = $this->superadmin_model->get_data_publik($id_user)->row();
		$data['data_pelajaran'] = $this->superadmin_model->get_data_pelajaran($id_user)->result();
		$data['data_pendidikan'] = $this->superadmin_model->get_data_pendidikan($id_user)->result();
		$data['jam_mengajar'] = $this->superadmin_model->get_jam_mengajar($id_user)->result();
		$data['kualifikasi_sertifikat'] = $this->superadmin_model->get_kualifikasi_sertifikat($id_user)->result();
		$data['lokasi_mengajar'] = $this->superadmin_model->get_lokasi_mengajar($id_user)->result();
		$data['pengalaman_mengajar'] = $this->superadmin_model->get_pengalaman_mengajar($id_user)->result();
		$this->load->view('superadmin/detail_guru', $data);
	}

	public function detail_murid($id_user)
	{
		$data['user'] = $this->superadmin_model->get_user($id_user)->row();
		$data['data_tambahan'] = $this->superadmin_model->get_data_tambahan($id_user)->row();
		$data['data_profil'] = $this->superadmin_model->get_data_profil($id_user)->row();
		$this->load->view('superadmin/detail_murid', $data);
	}

	public function add_user()
	{
		$this->superadmin_model->set_user();
		if ($this->input->post('rule') == 1) {
			$this->session->set_flashdata('message_success', 'Tambah data guru berhasil!');
			redirect('superadmin/data-guru');
		}
		else
		{
			$this->session->set_flashdata('message_success', 'Tambah data murid berhasil!');
			redirect('superadmin/data-murid');
		}
	}

	public function delete_user($id, $rule)
	{
		$this->superadmin_model->delete_user($id);
		if ($rule == 1) {
			$this->session->set_flashdata('message_success', 'Hapus data guru berhasil!');
			redirect('superadmin/data-guru');
		}
		else
		{
			$this->session->set_flashdata('message_success', 'Hapus data murid berhasil!');
			redirect('superadmin/data-murid');
		}
	}

	public function reset_password($id, $email, $rule)
	{
		$this->superadmin_model->reset_password($id, urldecode($email));
		if ($rule == 1) {
			$this->session->set_flashdata('message_success', 'Password user berhasil direset menjadi sama dengan email!');
			redirect('superadmin/data-guru');
		}
		else
		{
			$this->session->set_flashdata('message_success', 'Password user berhasil direset menjadi sama dengan email!');
			redirect('superadmin/data-murid');
		}
	}

	public function lunas_tagihan($id)
	{
		$this->superadmin_model->lunas_tagihan($id);
		$this->session->set_flashdata('message_success', 'Data tagihan berhasil diubah!');
		redirect('superadmin/tagihan/'.$id);
	}

	public function verifikasi_user($id_verifikasi, $id_user)
	{
		$this->superadmin_model->verifikasi_user($id_verifikasi);
		$this->superadmin_model->set_total_tagihan($id_user);
		$this->session->set_flashdata('message_success', 'User berhasil diverifikasi!');
		redirect('superadmin/verifikasi');
	}

	public function add_pesan()
	{
		$this->superadmin_model->add_pesan();
		$this->session->set_flashdata('message_success', 'Pesan berhasil ditambahkan!');
		redirect('superadmin/verifikasi');
	}

	public function check_notif()
	{
		echo json_encode($this->superadmin_model->get_guru_verifikasi()->result());
	}

	public function check_notif2()
	{
		echo json_encode($this->superadmin_model->get_data_tagihan()->result());
	}

	public function check_notif3()
	{
		echo json_encode($this->superadmin_model->get_pembayaran_tagihan()->result());
	}
}