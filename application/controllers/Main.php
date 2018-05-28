<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	public function index()
	{
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$this->load->view('index', $data);
	}

	public function mastermind()
	{
		$this->load->view('login');
	}

	public function forget()
	{
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$this->load->view('forget', $data);
	}

	public function reset($token)
	{
		$data['token'] = $token;
		$data['id_user'] = substr($token, 5, -6);
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$this->load->view('reset', $data);
	}

	public function forget_password()
	{
		if ($this->main_model->check_email()->num_rows() > 0) {
			$first_token = substr(md5(microtime()), rand(0,26), 5);
			$last_token = substr(md5(microtime()), rand(0,26), 6);
			$token = $first_token.$this->main_model->check_email()->row()->id_user.$last_token;
			$msg = "Silahkan reset password akun anda melalui halaman berikut http://findingteacher.win/reset/".$token.".\n\nttd\nAdmin Finding Teacher";
			$msg = wordwrap($msg,70);
			$rcpt = $this->input->post('email');
			$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
			mail($rcpt,"Reset Password",$msg,$header);
			$this->session->set_flashdata('message_success', 'Silahkan cek email anda untuk melihat link reset password!');
			redirect('/');
		} else {
			$this->session->set_flashdata('message_error', 'Email yang anda masukkan tidak ada dalam sistem!');
			redirect('forget');
		}
		
	}

	public function reset_password()
	{
		if (sha1($this->input->post('password')) == $this->main_model->get_user($this->input->post('id_user'))->row()->password) {
			$this->session->set_flashdata('message_error', 'Password baru yang dimasukkan sama dengan password lama!');
			redirect('reset/'.$this->input->post('token'));
		} else {
			$this->main_model->reset_password();
			$this->session->set_flashdata('message_success', 'Reset password berhasil, silahkan mencoba login!');
			redirect('/');	
		}
	}

	public function search()
	{
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$data['hasil'] = $this->main_model->search()->result();
		$this->load->view('search', $data);
	}

	public function ketentuan()
	{
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$this->load->view('ketentuan', $data);
	}

	public function tentang()
	{
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$this->load->view('tentang', $data);
	}

	public function kecamatan($id = '')
	{
		echo json_encode($this->main_model->get_kecamatan($id));
	}

	public function pelajaran($id_tingkat = '')
	{
		echo json_encode($this->main_model->get_pelajaran($id_tingkat));
	}

	public function detail($id_user, $id_mapel)
	{
		$data['mapel'] = $this->main_model->get_mapel($id_mapel)->row();
		$data['kabupaten'] = $this->main_model->get_kabupaten()->result();
		$data['tingkat'] = $this->main_model->get_tingkat()->result();
		$data['user'] = $this->main_model->get_user_detail($id_user)->row();
		$data['data_tambahan'] = $this->main_model->get_data_tambahan($id_user)->row();
		$data['data_profil'] = $this->main_model->get_data_profil($id_user)->row();
		$data['data_publik'] = $this->main_model->get_data_publik($id_user)->row();
		$data['data_pelajaran'] = $this->main_model->get_data_pelajaran($id_user)->result();
		$data['data_pendidikan'] = $this->main_model->get_data_pendidikan($id_user)->result();
		$data['jam_mengajar'] = $this->main_model->get_jam_mengajar($id_user)->result();
		$data['kualifikasi_sertifikat'] = $this->main_model->get_kualifikasi_sertifikat($id_user)->result();
		$data['lokasi_mengajar'] = $this->main_model->get_lokasi_mengajar($id_user)->result();
		$data['pengalaman_mengajar'] = $this->main_model->get_pengalaman_mengajar($id_user)->result();
		$this->load->view('detail', $data);
	}

	public function register()
	{
		$input = $this->main_model->set_user();
		if ($input === FALSE) {
			$this->session->set_flashdata('message_error', 'An error ocurred, please tyr again!');
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata('message_success', 'Register success, please set your profile!');
			$msg = "";
			if ($this->input->post('rule') == 0) {
				$msg = "Terimkasih Anda telah bergabung dengan kami. Silahkan mulai pencarian dan pemilihan guru melalui akun Anda dalam Finding Teacher , Namun ada baiknya apabila Anda juga mengindahkan pedoman pemakaian dalam menu Pedoman Murid.\n\nttd\nAdmin Finding Teacher";
			} else {
				$msg = "Terima kasih Anda telah bergabung dengan kami. Jadilah Anda guru-guru yang baik dan bisa memberi manfaat lebih bagi bangsa ini melalui kami dengan kemampuan yang Anda miliki. Selamat mengajar !!\n\nttd\nAdmin Finding Teacher";
			}
			$msg = wordwrap($msg,70);
			$rcpt = $this->input->post('email');
			$header = 'From: Finding Teacher <admin@findingteacher.win>' . "\r\n";
			mail($rcpt,"Selamat Datang Di Findingteacher!",$msg,$header);
			$this->session->set_userdata($this->main_model->get_user($input)->row_array());
			$this->session->set_userdata('logged_in', TRUE);
			if ($this->main_model->get_user($input)->row()->rule == 1) {
				redirect('guru');
			} else {
				redirect('murid');
			}
		}
	}

	public function kontak()
	{
		$input = $this->main_model->set_kontak();
		$msg = "Pesan dari: ".$this->input->post('nama')."\nNo. Ponsel: ".$this->input->post('no_ponsel')."\n".$this->input->post('pesan');
		$msg = wordwrap($msg,70);
		$rcpt = 'admin@findingteacher.win';
		$header = 'From: '.$this->input->post('email'). "\r\n";
		$sbjct = $this->input->post('subjek');
		mail($rcpt,$sbjct,$msg,$header);
		$this->session->set_flashdata('message_success', 'Terimakasih, pesan sudah dikirim!');
		redirect('/');
	}

	public function login()
	{
		$user = $this->main_model->user_check();

		if ($user->num_rows() > 0) {
			if ($user->row()->rule == 1) {
				$this->session->set_userdata($user->row_array());
				$this->session->set_userdata('logged_in', TRUE);

				redirect('guru');
			} elseif ($user->row()->rule == 0) {
				$this->session->set_userdata($user->row_array());
				$this->session->set_userdata('logged_in', TRUE);

				redirect('murid');
			}
		} 
		else
		{
			$this->session->set_flashdata('message_error', 'Gagal! Email atau Password salah.');
			redirect('/');
		}
	}

	public function mastermind_login()
	{
		$user = $this->main_model->user_check();

		if ($user->num_rows() > 0 && $user->row()->rule == 2) {
			$this->session->set_userdata($user->row_array());
			$this->session->set_userdata('logged_in', TRUE);

			redirect('superadmin');
		} 
		else
		{
			$this->session->set_flashdata('message_error', 'Gagal! Email atau Password salah.');
			redirect('mastermind');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
