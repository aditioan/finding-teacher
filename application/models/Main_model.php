<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function get_kabupaten()
	{
		$this->db->where('province_id', 34);
		return $this->db->get('regencies');
	}

	public function get_tingkat()
	{
		return $this->db->get('tingkat');
	}

	public function get_kecamatan($id = '')
	{
		$this->db->where('regency_id', $id);
		return $this->db->get('districts')->result_array();
	}

	public function get_pelajaran($id_tingkat = '')
	{
		$this->db->where('id_tingkat', $id_tingkat);
		return $this->db->get('pelajaran')->result_array();
	}

	public function get_mapel($id_mapel = '')
	{
		$this->db->where('p.id_mapel', $id_mapel);
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		return $this->db->get('data_pelajaran p');
	}

	function set_user()
	{
		$data_user = array(
			'nama_user' => $this->input->post('nama_user'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'kabupaten' => $this->input->post('kabupaten'),
			'kecamatan' => $this->input->post('kecamatan'),
			'no_ponsel' => $this->input->post('no_ponsel'),
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
			'rule' => $this->input->post('rule'),
			'created_at' => date('Y-m-d H:i:s')
		);
		if ($this->db->insert('users', $data_user) === TRUE)
		{
			$id = $this->db->insert_id();
			$this->db->insert('data_profil', array('user_id' => $id));
			if ($this->input->post('rule') == 1) {
				$this->db->insert('data_publik', array('id_user' => $id));
			}
			$this->db->insert('data_tambahan', array('id_user' => $id, 'nama_bank' => 23));
			return $id;
		}
		else
		{
			return FALSE;
		}
	}

	function set_kontak()
	{
		$data_kontak = array(
			'nama' => $this->input->post('nama'),
			'pesan' => $this->input->post('pesan'),
			'kategori' => $this->input->post('kategori'),
			'subjek' => $this->input->post('subjek'),
			'no_ponsel' => $this->input->post('no_ponsel'),
			'email' => $this->input->post('email'),
			'created_at' => date('Y-m-d H:i:s')
		);
		return $this->db->insert('kontak', $data_kontak);
	}

	function user_check()
	{
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$this->db->where('e.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_profil d', 'd.user_id = e.id_user', 'left');
		return $this->db->get_where('users e', array('email' => $email, 'password' => $password));
	}

	function get_user($id)
	{
		$this->db->where('e.id_user', $id);
		$this->db->where('e.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_profil d', 'd.user_id = e.id_user');
		return $this->db->get('users e');
	}

	function check_email()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('deleted_at', '0000-00-00 00:00:00');
		return $this->db->get('users');
	}

	function search()
	{
		$this->db->order_by('rating', 'DESC');
		if ($this->input->get('kabupaten') != "*") {
			$this->db->where('m.kabupaten_mengajar', $this->input->get('kabupaten'));
		}
		if ($this->input->get('kecamatan') != "*") {
			$this->db->where('m.kecamatan_mengajar', $this->input->get('kecamatan'));
		}
		if ($this->input->get('tingkat') != "*") {
			$this->db->where('t.id_tingkat', $this->input->get('tingkat'));
		}
		if ($this->input->get('pelajaran') != "*") {
			$this->db->where('n.id_pelajaran', $this->input->get('pelajaran'));
		}
		if ($this->input->get('hari') != "*" && $this->input->get('hari') != "") {
			$this->db->where('j.hari', $this->input->get('hari'));
		}
		if ($this->input->get('jam') != "*" && $this->input->get('jam') != "") {
			$this->db->where('j.jam_mulai', $this->input->get('jam'));
		}

		$this->db->where('u.rule', 1);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('v.status_verifikasi', 1);
		$this->db->join('users u', 'u.id_user = p.id_user');
		$this->db->join('user_verifikasi v', 'u.id_user = v.user');
		$this->db->join('lokasi_mengajar m', 'u.id_user = m.id_user');
		$this->db->join('data_profil l', 'u.id_user = l.user_id');
		$this->db->join('districts d', 'd.id = m.kecamatan_mengajar');
		$this->db->join('regencies r', 'r.id = m.kabupaten_mengajar');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('data_publik k', 'k.id_user = u.id_user');
		$this->db->join('jam_mengajar j', 'j.id_user = u.id_user');
		return $this->db->get('data_pelajaran p');
	}

	public function get_user_detail($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('districts d', 'd.id = u.kecamatan');
		$this->db->join('regencies r', 'r.id = u.kabupaten');
		return $this->db->get('users u');
	}

	public function get_data_tambahan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('data_tambahan');
	}

	public function get_data_profil($id_user = '')
	{
		$this->db->where('user_id', $id_user);
		return $this->db->get('data_profil');
	}

	public function get_data_publik($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('data_publik');
	}

	public function get_data_pelajaran($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('data_pelajaran');
	}

	public function get_data_pendidikan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('sejarah_pendidikan');
	}

	public function get_jam_mengajar($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('jam_mengajar');
	}

	public function get_kualifikasi_sertifikat($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('kualifikasi_sertifikat');
	}

	public function get_lokasi_mengajar($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		$this->db->join('districts d', 'd.id = u.kecamatan_mengajar');
		$this->db->join('regencies r', 'r.id = u.kabupaten_mengajar');
		return $this->db->get('lokasi_mengajar u');
	}

	public function get_pengalaman_mengajar($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('pengalaman_mengajar');
	}

	function reset_password()
	{
		$password = sha1($this->input->post('password'));
		$this->db->where('id_user', $this->input->post('id_user'));
		return $this->db->update('users', array('password' => $password));
	}
}