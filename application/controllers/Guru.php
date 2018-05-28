<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('guru_model');
		if ( ! $this->session->userdata('logged_in') === TRUE && ! $this->session->userdata('rule') == 1) {
			redirect('/');
		}
	}

	public function index()
	{
		$this->load->view('guru/index');
	}

	public function profil()
	{
		if ($this->guru_model->get_data_pengalaman() === NULL) {
			$data['data_pengalaman'] = 0;
		}else{
			$data['data_pengalaman'] = $this->guru_model->get_data_pengalaman()->result();
		}
		if ($this->guru_model->get_data_kualifikasi() === NULL) {
			$data['data_kualifikasi'] = 0;
		}else{
			$data['data_kualifikasi'] = $this->guru_model->get_data_kualifikasi()->result();
		}
		if ($this->guru_model->get_data_pendidikan() === NULL) {
			$data['data_pendidikan'] = 0;
		}else{
			$data['data_pendidikan'] = $this->guru_model->get_data_pendidikan()->result();
		}

		$data['data_verifikasi'] = $this->guru_model->get_data_verifikasi()->row();
		$data['tingkat'] = $this->guru_model->get_tingkat()->result();
		$data['data_mapel'] = $this->guru_model->get_data_mapel()->result();
		$data['data_jam'] = $this->guru_model->get_data_jam()->result();
		$data['kecamatan_awal'] = $this->guru_model->get_kecamatan_detail($this->session->userdata('kecamatan'))->row();
		$data['kecamatan'] = $this->guru_model->get_kecamatan($this->session->userdata('kabupaten'))->result();
		$data['bank'] = $this->guru_model->get_bank()->result();
		$data['data_lokasi'] = $this->guru_model->get_data_lokasi()->result();
		$data['data_tambahan'] = $this->guru_model->get_data_tambahan();
		$data['data_publik'] = $this->guru_model->get_data_publik();
		$data['kabupaten'] = $this->guru_model->get_kabupaten()->result();
		$this->load->view('guru/profil', $data);
	}

	public function kecamatan($id = '')
	{
		echo json_encode($this->guru_model->get_kecamatan($id)->result_array());
	}

	public function update_users()
	{
		if ($this->guru_model->update_users() === TRUE) {
			$this->session->set_userdata($this->guru_model->get_user()->row_array());
			$this->session->set_flashdata('message_success', 'Update data awal berhasil!');
			$this->session->set_flashdata('tab', 'tab_2');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Update data awal gagal!');
			redirect('guru/profil');
		}
	}

	public function findteacher()
	{
		$data['hasil'] = "";
		$data['tingkat'] = $this->guru_model->get_tingkat()->result();
		$data['kabupaten'] = $this->guru_model->get_kabupaten()->result();
		$this->load->view('guru/findteacher', $data);
	}

	public function pesan($id_mapel, $id_user)
	{
		$data['mapel'] = $this->guru_model->get_mapel($id_mapel)->row();
		$data['user'] = $this->guru_model->get_data_user($id_user)->row();
		$data['jam_mengajar'] = $this->guru_model->get_jam_mengajar($id_user)->result();
		$data['lokasi_mengajar'] = $this->guru_model->get_lokasi_mengajar($id_user)->result();
		$this->load->view('guru/pesan', $data);
	}

	public function pendapatan()
	{
		if(isset($_GET['search'])){
	            $filter = '';
	
	            if(!empty($_GET['date_from']) && $_GET['date_from'] != ''){
	                $filter['DATE(k.updated_at) >='] = $_GET['date_from'];
	            }
	
	            if(!empty($_GET['date_end']) && $_GET['date_end'] != ''){
	                $filter['DATE(k.updated_at) <='] = $_GET['date_end'];
	            }
	            
	            $data['data_pendapatan'] = $this->guru_model->get_pendapatan($filter)->result();
	            //print_r($data);
	            //die();
		    $this->load->view('guru/pendapatan', $data);
	        }else{
		    $data['data_pendapatan'] = $this->guru_model->get_pendapatan()->result();
		    $this->load->view('guru/pendapatan', $data);
		}
	}

	public function search()
	{
		$data['kabupaten'] = $this->guru_model->get_kabupaten()->result();
		$data['tingkat'] = $this->guru_model->get_tingkat()->result();
		$data['hasil'] = $this->guru_model->search()->result();
		$this->load->view('guru/findteacher', $data);
	}

	public function detail_guru($id_user, $id_mapel)
	{
		$data['mapel'] = $this->guru_model->get_mapel($id_mapel)->row();
		$data['kabupaten'] = $this->guru_model->get_kabupaten()->result();
		$data['tingkat'] = $this->guru_model->get_tingkat()->result();
		$data['user'] = $this->guru_model->get_data_user($id_user)->row();
		$data['data_tambahan'] = $this->guru_model->get_tambahan($id_user)->row();
		$data['data_profil'] = $this->guru_model->get_profil($id_user)->row();
		$data['data_publik'] = $this->guru_model->get_publik($id_user)->row();
		$data['data_pelajaran'] = $this->guru_model->get_data_pelajaran($id_user)->result();
		$data['data_pendidikan'] = $this->guru_model->get_pendidikan($id_user)->result();
		$data['jam_mengajar'] = $this->guru_model->get_jam_mengajar($id_user)->result();
		$data['kualifikasi_sertifikat'] = $this->guru_model->get_kualifikasi_sertifikat($id_user)->result();
		$data['lokasi_mengajar'] = $this->guru_model->get_lokasi_mengajar($id_user)->result();
		$data['pengalaman_mengajar'] = $this->guru_model->get_pengalaman_mengajar($id_user)->result();
		$this->load->view('guru/detail_guru', $data);
	}

	public function set_pesan()
	{
		$kode = $this->input->post('id_mapel').$this->input->post('guru').$this->session->userdata('id_user');
		$hasil = $this->guru_model->check_kode($kode)->num_rows()+$this->guru_model->check_kode2($kode)->num_rows();
		if ($hasil == 1) {
			$this->session->set_flashdata('message_error', 'Anda sudah memesan kursus dengan guru yang sama!');
			redirect('guru/findteacher');
		} else {
			$id = $this->guru_model->set_data_kursus();
			$this->guru_model->set_waktu_kursus($id);
			$msg = "Pesanan terbaru kursus ".$this->input->post('nama_mapel')." dari ".$this->input->post('pemesan').".\nSilahkan cek pada halaman kursus di http://findingteacher.win/\n\nttd\nAdmin Finding Teacher";
			$msg = wordwrap($msg,70);
			$rcpt = $this->input->post('email');
			$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
			mail($rcpt,"Pesanan Kursus Baru",$msg,$header);
			$this->session->set_flashdata('message_success', 'Pemesanan kursus berhasil!');
			redirect('guru/kursus');
		}
	}

	public function data_tambahan()
	{
		if ($this->guru_model->update_data_tambahan() == TRUE) {
			$this->session->set_flashdata('message_success', 'Update data tambahan berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_2');
			redirect('guru/profil');
		}
	}

	public function data_publik()
	{
		if ($this->guru_model->update_data_publik() == TRUE) {
			$this->session->set_flashdata('message_success', 'Update data publik berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function data_pendidikan()
	{
		$this->guru_model->set_data_pendidikan();
		$this->session->set_flashdata('message_success', 'Update data pendidikan berhasil!');
		$this->session->set_flashdata('tab', 'tab_3');
		redirect('guru/profil');
	}

	public function data_pengalaman()
	{
		$this->guru_model->set_data_pengalaman();
		$this->session->set_flashdata('message_success', 'Update data publik berhasil!');
		$this->session->set_flashdata('tab', 'tab_3');
		redirect('guru/profil');
	}

	public function data_profil()
	{
		// echo "<pre>";
		// print_r($this->input->post());
		// die();
		if ($this->guru_model->update_data_profil() == TRUE) {
			$this->session->set_userdata($this->guru_model->get_user()->row_array());
			$this->session->set_flashdata('message_success', 'Update data profil berhasil dan silahkan klik POST!');
			$this->session->set_flashdata('tab', 'tab_5');
			redirect('guru/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_5');
			redirect('guru/profil');
		}
	}

	public function delete_pengalaman($id_pengalaman)
	{
		if ($this->guru_model->delete_pengalaman($id_pengalaman) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function data_kualifikasi()
	{
		if ($this->guru_model->set_data_kualifikasi() == TRUE) {
			$this->session->set_flashdata('message_success', 'Update data publik berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		} else {
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, cek data kembali!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function data_lokasi()
	{
		$this->guru_model->set_data_lokasi();
		$this->session->set_flashdata('message_success', 'Update data publik berhasil!');
		$this->session->set_flashdata('tab', 'tab_3');
		redirect('guru/profil');
	}

	public function data_mapel()
	{
		$this->guru_model->set_data_mapel();
		$this->session->set_flashdata('message_success', 'Update data kursus berhasil!');
		$this->session->set_flashdata('tab', 'tab_4');
		redirect('guru/profil');
	}

	public function data_jam()
	{
		$this->guru_model->set_data_jam();
		$this->session->set_flashdata('message_success', 'Update data jam mengajar berhasil!');
		$this->session->set_flashdata('tab', 'tab_4');
		redirect('guru/profil');
	}

	public function add_pembayaran()
	{
		$this->guru_model->set_pembayaran();
		$this->session->set_flashdata('message_success', 'Bukti pembayaran berhasil diupload!');
		redirect('guru/tagihan');
	}

	public function terima_pesanan($id_kursus)
	{
		$cek = $this->guru_model->get_all_kursus($id_kursus)->result();
		//echo "<pre>";
		//print_r($cek);
		$hasil = $this->guru_model->cek_kursus($cek[0]->hari_kursus, $cek[0]->jam_kursus)->num_rows();
		//echo $hasil;
		//die();
		if ($hasil == 0) {
			$rating = $this->session->userdata('rating')+1;
			$this->guru_model->update_rating($rating);
			$this->session->set_userdata('rating', $rating);
			$this->guru_model->update_kursus($id_kursus, 1);
			$this->session->set_flashdata('message_success', 'Kursus diterima!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('guru/kursus');
		} else {
			$this->session->set_flashdata('message_error', 'Maaf, anda sudah memiliki kursus lain yang berjalan pada jam dan hari yang sama!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('guru/kursus');
		}
	}

	public function tolak_pesanan($id_kursus)
	{
		$this->guru_model->update_kursus($id_kursus, 2);
		$this->session->set_flashdata('message_success', 'Kursus ditolak!');
		$this->session->set_flashdata('tab', 'tab_1');
		redirect('guru/kursus');
	}

	public function verifikasi($id_user)
	{
		$this->guru_model->set_verifikasi($id_user);
		$this->session->set_flashdata('message_success', 'Silahkan tunggu hingga data diverifikasi admin!');
		$this->session->set_flashdata('tab', 'tab_1');
		redirect('guru/profil');
	}

	public function verifikasi_update()
	{
		$this->guru_model->update_verifikasi();
		$this->session->set_flashdata('message_success', 'Silahkan tunggu hingga data diverifikasi admin!');
		$this->session->set_flashdata('tab', 'tab_1');
		redirect('guru/profil');
	}

	public function akhiri_pesanan($id_kursus)
	{
		$this->guru_model->update_kursus($id_kursus, 3);
		$data = $this->guru_model->get_kursus($id_kursus)->row();
		$tagihan = $data->harga*5/100;
		$this->guru_model->set_tagihan($id_kursus, $tagihan);
		$total = $tagihan + $this->guru_model->get_total_tagihan($this->session->userdata('id_user'))->row()->total;
		$this->guru_model->update_total_tagihan($this->session->userdata('id_user'), $total);
		$msg = "Tagihan terbaru kursus ".$data->nama_pelajaran." ditambahkan menjadi sebesar sebesar Rp. ".$total." ,-\nSilahkan untuk membayar tagihan pada tanggal 5 awal bulan depan ke nomor rekening,\nNo. Rek : 002901123241509\nBank : BRI\nAtas nama : Hidayat Nor Amin\n\nttd\nAdmin Finding Teacher";
		$msg = wordwrap($msg,70);
		$rcpt = $this->session->userdata('email');
		$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
		mail($rcpt,"Tagihan Kursus Findingteacher",$msg,$header);
		$this->session->set_flashdata('message_success', 'Kursus diakhiri!');
		$this->session->set_flashdata('tab', 'tab_3');
		redirect('guru/kursus');
	}

	public function delete_kualifikasi($id_kualifikasi, $nama_file)
	{
		if ($this->guru_model->delete_kualifikasi($id_kualifikasi, $nama_file) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function delete_kursus($id_kursus)
	{
		if ($this->guru_model->delete_kursus($id_kursus) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_4');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_4');
			redirect('guru/profil');
		}
	}

	public function delete_lokasi($id_lokasi)
	{
		if ($this->guru_model->delete_lokasi($id_lokasi) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function delete_pendidikan($id_pendidikan)
	{
		if ($this->guru_model->delete_pendidikan($id_pendidikan) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_3');
			redirect('guru/profil');
		}
	}

	public function delete_jam($id_jam)
	{
		if ($this->guru_model->delete_jam($id_jam) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_4');
			redirect('guru/profil');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_4');
			redirect('guru/profil');
		}
	}

	public function pelajaran($id_tingkat = '')
	{
		echo json_encode($this->guru_model->get_pelajaran($id_tingkat));
	}

	public function jam_kursus($id_jam = '')
	{
		echo json_encode($this->guru_model->get_jam_kursus($id_jam));
	}

	public function kursus()
	{
		$data['data_kursus'] = $this->guru_model->get_data_kursus()->result();
		$data['data_kursus2'] = $this->guru_model->get_data_kursus2()->result();
		$this->load->view('guru/kursus', $data);
	}

	public function detail_kursus($id_kursus)
	{
		$data['data_kursus'] = $this->guru_model->get_kursus($id_kursus)->row();
		$data['guru'] = $this->guru_model->get_data_user($data['data_kursus']->guru)->row();
		$data['murid'] = $this->guru_model->get_data_user($data['data_kursus']->pemesan)->row();
		$data['waktu_kursus'] = $this->guru_model->get_waktu_kursus($id_kursus)->result();
		$this->load->view('guru/detail_kursus', $data);
	}

	public function tagihan()
	{
		$data['total_tagihan'] = $this->guru_model->get_total_tagihan($this->session->userdata('id_user'))->row();
		$data['data_tagihan'] = $this->guru_model->get_tagihan()->result();
		$this->load->view('guru/tagihan', $data);
	}

	public function reset_password()
	{
		if (sha1($this->input->post('old_password')) == $this->guru_model->get_user()->row()->password) {
			if (sha1($this->input->post('new_password')) == $this->guru_model->get_user()->row()->password) {
				$this->session->set_flashdata('message_error', 'Password baru yang dimasukkan sama dengan password lama!');
				$this->session->set_flashdata('tab', 'tab_6');
				redirect('guru/profil');
			} else {
				$this->guru_model->update_password();
				$this->session->set_flashdata('message_success', 'Update password berhasil!');
				$this->session->set_flashdata('tab', 'tab_6');
				redirect('guru/profil');
			}
			
		}else{
			$this->session->set_flashdata('message_error', 'Password lama yang dimasukkan salah!');
			$this->session->set_flashdata('tab', 'tab_6');
			redirect('guru/profil');
		}
	}

	public function check_notif()
	{
		echo json_encode($this->guru_model->get_notif()->result());
	}

	public function check_notif2()
	{
		echo json_encode($this->guru_model->get_notif2()->result());
	}

	public function check_notif3()
	{
		echo json_encode($this->guru_model->get_notif3()->result());
	}

	public function check_notif4()
	{
		echo json_encode($this->guru_model->get_notif4()->result());
	}

	public function check_notif5()
	{
		echo json_encode($this->guru_model->get_notif5()->result());
	}

	public function delete_pesanan_kursus($id_kursus)
	{
		if ($this->guru_model->delete_pesanan_kursus($id_kursus) === TRUE) 
		{
			$this->session->set_flashdata('message_success', 'Hapus data berhasil!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('guru/kursus');
		}
		else
		{
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan!');
			$this->session->set_flashdata('tab', 'tab_1');
			redirect('guru/kursus');
		}
	}
}
