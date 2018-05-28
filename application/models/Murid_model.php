<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid_model extends CI_Model {

	public function get_kabupaten()
	{
		$this->db->where('province_id', 34);
		return $this->db->get('regencies');
	}

	public function get_tingkat()
	{
		return $this->db->get('tingkat');
	}

	public function get_all_kecamatan()
	{
		return $this->db->get('districts');
	}

	public function get_kecamatan($id = '')
	{
		$this->db->where('regency_id', $id);
		return $this->db->get('districts');
	}

	public function get_kecamatan_detail($id = '')
	{
		$this->db->where('id', $id);
		return $this->db->get('districts');
	}

	public function get_pelajaran($id_tingkat = '')
	{
		$this->db->where('id_tingkat', $id_tingkat);
		return $this->db->get('pelajaran')->result_array();
	}

	public function get_user($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('districts d', 'd.id = u.kecamatan');
		$this->db->join('regencies r', 'r.id = u.kabupaten');
		return $this->db->get('users u');
	}

	function get_users()
	{
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$this->db->where('e.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_profil d', 'd.user_id = e.id_user', 'left');
		return $this->db->get_where('users e', array('email' => $email, 'password' => $password));
	}

	function update_users()
	{
		$data_user = array(
			'nama_user' => $this->input->post('nama_user'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'kabupaten' => $this->input->post('kabupaten'),
			'kecamatan' => $this->input->post('kecamatan'),
			'no_ponsel' => $this->input->post('no_ponsel'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('users', $data_user);
	}

	function update_data_tambahan()
	{
		$data_tambahan = array(
			'no_ktp' => $this->input->post('no_ktp'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tahun_lahir').'-'.$this->input->post('bulan_lahir').'-'.$this->input->post('tanggal_lahir'),
			'telp_lain' => $this->input->post('telp_lain'),
			'telp_rumah' => $this->input->post('telp_rumah'),
			'telp_kantor' => $this->input->post('telp_kantor'),
			'domisili' => $this->input->post('domisili'),
			'nama_bank' => 23,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('data_tambahan', $data_tambahan);
	}

	function update_data_profil()
	{
		$this->load->library('upload');
		$photo_profil = $this->input->post('file_photo_profil');

		$this->upload->initialize(array(
	        "file_name"     => "profil".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/murid/profil",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("photo_profil")) {
	    	if ($this->input->post('file_photo_profil') != '') {
	    		unlink(FCPATH.'uploads/murid/profil/'.$this->input->post('file_photo_profil'));
	    	}
            $photo_profil = $this->upload->data()['file_name'];
        }

		$data_profil = array(
			'photo_profil' => $photo_profil,
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'instagram' => $this->input->post('instagram'),
			'bbm' => $this->input->post('bbm'),
			'line' => $this->input->post('line'),
			'wa' => $this->input->post('wa'),
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('user_id', $this->session->userdata('id_user'));
		return $this->db->update('data_profil', $data_profil);
	}

	function get_tambahan()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('data_tambahan')->row();
	}

	public function get_mapel($id_mapel = '')
	{
		$this->db->where('p.id_mapel', $id_mapel);
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		return $this->db->get('data_pelajaran p');
	}

	public function get_data_tambahan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('data_tambahan');
	}

	public function get_data_pendidikan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('sejarah_pendidikan');
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

	function search()
	{
		$this->db->order_by('rating', 'DESC');
		if ($this->input->get('kabupaten') != "*") {
			$this->db->where('z.kabupaten_mengajar', $this->input->get('kabupaten'));
		}
		if ($this->input->get('kecamatan') != "*") {
			$this->db->where('z.kecamatan_mengajar', $this->input->get('kecamatan'));
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
		$this->db->join('lokasi_mengajar z', 'u.id_user = z.id_user');
		$this->db->join('data_profil l', 'u.id_user = l.user_id');
		$this->db->join('districts d', 'd.id = z.kecamatan_mengajar');
		$this->db->join('regencies r', 'r.id = z.kabupaten_mengajar');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('data_publik k', 'k.id_user = u.id_user');
		$this->db->join('data_tambahan m', 'm.id_user = u.id_user');
		$this->db->join('jam_mengajar j', 'j.id_user = u.id_user');
		//$this->db->get('data_pelajaran p');
		//echo $this->db->last_query();
		//die;
		return $this->db->get('data_pelajaran p');
	}

	public function check_kode($kode)
	{
		$this->db->where('kode', $kode);
		$this->db->where('status', 0);
		return $this->db->get('data_kursus');
	}

	public function check_kode2($kode)
	{
		$this->db->where('kode', $kode);
		$this->db->where('status', 1);
		return $this->db->get('data_kursus');
	}

	public function set_data_kursus()
	{
		$data_kursus = array(
			'id_mapel' => $this->input->post('id_mapel'),
			'pemesan' => $this->session->userdata('id_user'),
			'guru' => $this->input->post('guru'),
			'lokasi_kursus' => $this->input->post('lokasi_kursus'),
			'harga' => $this->input->post('harga')*$this->input->post('pertemuan'),
			'pertemuan' => $this->input->post('pertemuan'),
			'pesan_booking' => $this->input->post('pesan_booking'),
			'kode' => $this->input->post('id_mapel').$this->input->post('guru').$this->session->userdata('id_user'),
			'status' => 0,
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('data_kursus', $data_kursus);
		return $this->db->insert_id();
	}

	public function set_waktu_kursus($id_kursus)
	{
		for ($i=0; $i < count($this->input->post('hari_kursus')) ; $i++) { 
			$waktu_kursus = array(
				'id_kursus' => $id_kursus,
				'hari_kursus' => $this->input->post('hari_kursus')[$i],
				'jam_kursus' => $this->input->post('jam_kursus')[$i],
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->db->insert('waktu_kursus', $waktu_kursus);
		}
		
		return TRUE;
	}

	public function get_data_kursus()
	{
		$this->db->where('pemesan', $this->session->userdata('id_user'));
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = p.id_user');
		return $this->db->get('data_kursus k');
	}

	public function get_kursus($id_kursus)
	{
		$this->db->where('id_kursus', $id_kursus);
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('districts d', 'd.id = k.lokasi_kursus');
		return $this->db->get('data_kursus k');
	}

	public function get_waktu_kursus($id_kursus)
	{
		$this->db->where('id_kursus', $id_kursus);
		return $this->db->get('waktu_kursus');
	}

	function delete_kursus($id_kursus)
	{
		return $this->db->delete('data_kursus', array('id_kursus' => $id_kursus));
	}

	function update_password()
	{
		$password = sha1($this->input->post('new_password'));
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('users', array('password' => $password));
	}

	function get_notif()
	{
		$this->db->where('k.status', 1);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('k.pemesan', $this->session->userdata('id_user'));
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.guru');
		return $this->db->get('data_kursus k');
	}

	function get_notif2()
	{
		$this->db->where('k.status', 2);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('k.pemesan', $this->session->userdata('id_user'));
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.guru');
		return $this->db->get('data_kursus k');
	}

	public function get_jam_kursus($id_jam = '')
	{
		$this->db->where('id_jam', $id_jam);
		return $this->db->get('jam_mengajar')->result_array();
	}
}