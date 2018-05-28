<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru_model extends CI_Model {

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

	public function get_jam_kursus($id_jam = '')
	{
		$this->db->where('id_jam', $id_jam);
		return $this->db->get('jam_mengajar')->result_array();
	}

	public function get_total_tagihan($id_guru = '')
	{
		$this->db->where('id_guru', $id_guru);
		return $this->db->get('total_tagihan');
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

	function get_user()
	{
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$this->db->where('e.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_profil d', 'd.user_id = e.id_user', 'left');
		return $this->db->get_where('users e', array('email' => $email, 'password' => $password));
	}

	function get_data_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('districts d', 'd.id = u.kecamatan');
		$this->db->join('regencies r', 'r.id = u.kabupaten');
		return $this->db->get('users u');
	}

	function get_data_tambahan()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('data_tambahan')->row();
	}

	function get_data_publik()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('data_publik')->row();
	}

	function get_data_pendidikan()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('sejarah_pendidikan');
	}

	function set_data_tambahan()
	{
		$this->load->library('upload');
		$ktp = '';

		$this->upload->initialize(array(
	        "file_name"     => "ktp".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/data_tambahan",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("ktp")) {
	            $ktp = $this->upload->data()['file_name'];
	        }

		$data_tambahan = array(
			'id_user' => $this->session->userdata('id_user'),
			'no_ktp' => $this->input->post('no_ktp'),
			'ktp' => $ktp,
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tahun_lahir').'-'.$this->input->post('bulan_lahir').'-'.$this->input->post('tanggal_lahir'),
			'telp_lain' => $this->input->post('telp_lain'),
			'telp_rumah' => $this->input->post('telp_rumah'),
			'telp_kantor' => $this->input->post('telp_kantor'),
			'domisili' => $this->input->post('domisili'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rek' => $this->input->post('no_rek'),
			'pemilik_rek' => $this->input->post('pemilik_rek'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('data_tambahan', $data_tambahan);
	}

	function update_data_tambahan()
	{
		//echo "<pre>";
		//print_r($this->input->post());
		//die();
		$this->load->library('upload');
		$ktp = '';

		$this->upload->initialize(array(
	        "file_name"     => "ktp".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/data_tambahan",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("ktp")) {
	    	if ($this->input->post('file_ktp') != '') {
				unlink(FCPATH.'uploads/guru/data_tambahan/'.$this->input->post('file_ktp'));
	    	}
            $ktp = $this->upload->data()['file_name'];
        }

		$data_tambahan = array(
			'no_ktp' => $this->input->post('no_ktp'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tahun_lahir').'-'.$this->input->post('bulan_lahir').'-'.$this->input->post('tanggal_lahir'),
			'telp_lain' => $this->input->post('telp_lain'),
			'telp_rumah' => $this->input->post('telp_rumah'),
			'telp_kantor' => $this->input->post('telp_kantor'),
			'domisili' => $this->input->post('domisili'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rek' => $this->input->post('no_rek'),
			'pemilik_rek' => $this->input->post('pemilik_rek'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		$ktp == ''? '' : $data_tambahan['ktp'] = $ktp;

		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('data_tambahan', $data_tambahan);
	}

	function set_pembayaran()
	{
		$this->load->library('upload');
		$bukti_pembayaran = '';

		$this->upload->initialize(array(
	        "file_name"     => "bukti_pembayaran".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/bukti_pembayaran",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("bukti_pembayaran")) {
	    	if ($this->input->post('file_bukti_pembayaran') != '') {
				unlink(FCPATH.'uploads/guru/bukti_pembayaran/'.$this->input->post('file_bukti_pembayaran'));
	    	}
            $bukti_pembayaran = $this->upload->data()['file_name'];
        }else{
        	return FALSE;
        }

		$data_pembayaran = array();
		$bukti_pembayaran == ''? '' : $data_pembayaran['bukti_pembayaran'] = $bukti_pembayaran;

		$this->db->where('id_guru', $this->session->userdata('id_user'));
		return $this->db->update('total_tagihan', $data_pembayaran);
	}

	function set_data_publik()
	{
		$data_publik = array(
			'id_user' => $this->session->userdata('id_user'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'instansi_pendidikan' => $this->input->post('instansi_pendidikan'),
			'jurusan_pendidikan' => $this->input->post('jurusan_pendidikan'),
			'biodata' => $this->input->post('biodata'),//substr($this->input->post('biodata'), 8),
			'tentang' => $this->input->post('tentang'),//substr($this->input->post('tentang'), 8),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('data_publik', $data_publik);
	}

	function update_data_publik()
	{
		$data_publik = array(
			'biodata' => $this->input->post('biodata'),//substr($this->input->post('biodata'), 8),
			'tentang' => $this->input->post('tentang'),//substr($this->input->post('tentang'), 8),
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('data_publik', $data_publik);
	}

	function update_kursus($id_kursus, $status)
	{
		$data_kursus = array(
			'status' => $status,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id_kursus', $id_kursus);
		return $this->db->update('data_kursus', $data_kursus);
	}

	function update_rating($rating)
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('users', array('rating' => $rating));
	}

	function update_total_tagihan($id_guru, $total)
	{
		$data_tagihan = array(
			'total' => $total,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id_guru', $id_guru);
		return $this->db->update('total_tagihan', $data_tagihan);
	}

	function set_data_pengalaman()
	{
		$data_pengalaman = array(
			'id_user' => $this->session->userdata('id_user'),
			'pengalaman' => $this->input->post('pengalaman'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('pengalaman_mengajar', $data_pengalaman);
	}

	function set_data_pendidikan()
	{
		$this->load->library('upload');

		$this->upload->initialize(array(
	        "file_name"     => "ijazah".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/ijazah",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("bukti_ijazah")) {
            $bukti_ijazah = $this->upload->data()['file_name'];

			$data_pendidikan = array(
				'id_user' => $this->session->userdata('id_user'),
				'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
				'instansi_pendidikan' => $this->input->post('instansi_pendidikan'),
				'jurusan_pendidikan' => $this->input->post('jurusan_pendidikan'),
				'nilai_pendidikan' => $this->input->post('nilai_pendidikan'),
				'bukti_ijazah' => $bukti_ijazah,
				'created_at' => date('Y-m-d H:i:s')
			);

			return $this->db->insert('sejarah_pendidikan', $data_pendidikan);
        }else{
        	//echo $this->upload->display_errors();
			//die();
			return FALSE;
        }
	}

	function set_data_mapel()
	{
		$data_mapel = array(
			'id_user' => $this->session->userdata('id_user'),
			'id_pelajaran' => $this->input->post('pelajaran'),
			'jam_pertemuan' => $this->input->post('jam_pertemuan'),
			'tarif_pertemuan' => $this->input->post('tarif_pertemuan'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('data_pelajaran', $data_mapel);
	}

	function set_data_jam()
	{
		$data_jam = array(
			'id_user' => $this->session->userdata('id_user'),
			'hari' => $this->input->post('hari'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('jam_mengajar', $data_jam);
	}

	function set_verifikasi($id_user)
	{
		$data_verifikasi = array(
			'user' => $id_user,
			'pesan' => '',
			'status_verifikasi' => 0,
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('user_verifikasi', $data_verifikasi);
	}

	function get_data_pengalaman()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('pengalaman_mengajar');
	}

	function get_data_kualifikasi()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('kualifikasi_sertifikat');
	}

	function get_data_verifikasi()
	{
		$this->db->where('user', $this->session->userdata('id_user'));
		return $this->db->get('user_verifikasi');
	}

	function set_data_kualifikasi()
	{
		$this->load->library('upload');

		$this->upload->initialize(array(
	        "file_name"     => "kualifikasi".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/kualifikasi",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("bukti_kualifikasi")) {
            $bukti_kualifikasi = $this->upload->data()['file_name'];

			$data_kualifikasi = array(
				'id_user' => $this->session->userdata('id_user'),
				'kualifikasi' => $this->input->post('kualifikasi'),
				'bukti_kualifikasi' => $bukti_kualifikasi,
				'created_at' => date('Y-m-d H:i:s')
			);

			return $this->db->insert('kualifikasi_sertifikat', $data_kualifikasi);
        }else{
        	//echo $this->upload->display_errors();
			//die();
			return FALSE;
        }
	}

	function set_data_lokasi()
	{
		$data_lokasi = array(
			'id_user' => $this->session->userdata('id_user'),
			'kabupaten_mengajar' => $this->input->post('kabupaten_mengajar'),
			'kecamatan_mengajar' => $this->input->post('kecamatan_mengajar'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('lokasi_mengajar', $data_lokasi);
	}

	function update_data_profil()
	{
		$this->load->library('upload');
		$photo_profil = $this->input->post('file_photo_profil');

		$this->upload->initialize(array(
	        "file_name"     => "profil".$this->session->userdata('id_user'),
	        "upload_path"   => FCPATH."uploads/guru/profil",
	        "allowed_types" => "jpg|png",
	        "max_size" => 2048
	    ));

	    if($this->upload->do_upload("photo_profil")) {
	    	if ($photo_profil != '') {
	    		unlink(FCPATH.'uploads/guru/profil/'.$photo_profil);
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

	function update_password()
	{
		$password = sha1($this->input->post('new_password'));
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('users', array('password' => $password));
	}

	function update_verifikasi()
	{
		$this->db->where('user', $this->session->userdata('id_user'));
		return $this->db->update('user_verifikasi', array('pesan' => ''));
	}

	function get_bank()
	{
		return $this->db->get('bank');
	}

	function delete_pengalaman($id_pengalaman)
	{
		return $this->db->delete('pengalaman_mengajar', array('id_pengalaman' => $id_pengalaman));
	}

	function delete_pendidikan($id_pendidikan)
	{
		return $this->db->delete('sejarah_pendidikan', array('id_pendidikan' => $id_pendidikan));
	}

	function delete_kualifikasi($id_kualifikasi, $nama_file)
	{
		unlink(FCPATH.'uploads/guru/kualifikasi/'.$nama_file);
		return $this->db->delete('kualifikasi_sertifikat', array('id_kualifikasi' => $id_kualifikasi));
	}

	function get_data_mapel()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->join('pelajaran p', 'p.id_pelajaran = d.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = p.id_tingkat');
		return $this->db->get('data_pelajaran d');
	}

	function get_data_lokasi()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->join('regencies r', 'r.id = l.kabupaten_mengajar');
		$this->db->join('districts d', 'd.id = l.kecamatan_mengajar');
		return $this->db->get('lokasi_mengajar l');
	}

	function get_data_jam()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('jam_mengajar');
	}

	function get_data_profil()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('profil');
	}

	function delete_kursus($id_kursus)
	{
		return $this->db->delete('data_pelajaran', array('id_mapel' => $id_kursus));
	}

	function delete_lokasi($id_lokasi)
	{
		return $this->db->delete('lokasi_mengajar', array('id_lokasi' => $id_lokasi));
	}

	function delete_jam($id_jam)
	{
		return $this->db->delete('jam_mengajar', array('id_jam' => $id_jam));
	}

	function get_notif()
	{
		$this->db->where('status', 0);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('guru', $this->session->userdata('id_user'));
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		return $this->db->get('data_kursus k');
	}

	function get_notif2()
	{
		$this->db->where('d.status_tagihan', 0);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('d.guru', $this->session->userdata('id_user'));
		$this->db->join('data_kursus k', 'k.id_kursus = d.id_kursus');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		return $this->db->get('data_tagihan d');
	}

	function get_notif3()
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

	function get_notif4()
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

	function get_notif5()
	{
		$this->db->where('user', $this->session->userdata('id_user'));
		$this->db->where('status_verifikasi', 1);
		$this->db->or_where('pesan !=', '');
		return $this->db->get('user_verifikasi');
	}

	public function get_data_kursus()
	{
		$this->db->where('guru', $this->session->userdata('id_user'));
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		$this->db->join('data_tambahan m', 'm.id_user = u.id_user');
		return $this->db->get('data_kursus k');
	}

	public function get_data_kursus2()
	{
		$this->db->where('k.pemesan', $this->session->userdata('id_user'));
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

	public function get_all_kursus($id_kursus)
	{
		$this->db->where('k.id_kursus', $id_kursus);
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('districts d', 'd.id = k.lokasi_kursus');
		$this->db->join('waktu_kursus w', 'w.id_kursus = k.id_kursus');
		return $this->db->get('data_kursus k');
	}

	public function cek_kursus($hari, $jam)
	{
		$this->db->where('k.guru', $this->session->userdata('id_user'));
		$this->db->where('k.status', '1');
		$this->db->where('w.hari_kursus', $hari);
		$this->db->where('w.jam_kursus', $jam);
		$this->db->join('waktu_kursus w', 'w.id_kursus = k.id_kursus');
		return $this->db->get('data_kursus k');
	}

	public function get_waktu_kursus($id_kursus)
	{
		$this->db->where('id_kursus', $id_kursus);
		return $this->db->get('waktu_kursus');
	}

	public function get_pendapatan($filter = '')
	{
		$this->db->select('*, k.updated_at AS updated_at');
		$this->db->where('k.guru', $this->session->userdata('id_user'));
		$this->db->where('k.status', 3);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		if(!empty($filter)){
	            $this->db->where($filter);
	        }
		$this->db->join('users u', 'u.id_user = k.pemesan');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		//$this->db->get('data_kursus k');
		//echo $this->db->last_query();
		//die();
		return $this->db->get('data_kursus k');
	}

	function set_tagihan($id_kursus, $tagihan)
	{
		$data_tagihan = array(
			'id_kursus' => $id_kursus,
			'guru' => $this->session->userdata('id_user'),
			'besar_tagihan' => $tagihan,
			'status_tagihan' => 0,
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('data_tagihan', $data_tagihan);
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

		$this->db->where('p.id_user !=', $this->session->userdata('id_user'));
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
		return $this->db->get('data_pelajaran p');
	}

	function get_tagihan()
	{
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->where('d.guru', $this->session->userdata('id_user'));
		$this->db->join('data_kursus k', 'k.id_kursus = d.id_kursus');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		return $this->db->get('data_tagihan d');
	}

	public function get_mapel($id_mapel = '')
	{
		$this->db->where('p.id_mapel', $id_mapel);
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		return $this->db->get('data_pelajaran p');
	}

	public function get_tambahan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('data_tambahan');
	}

	public function get_pendidikan($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('sejarah_pendidikan');
	}

	public function get_profil($id_user = '')
	{
		$this->db->where('user_id', $id_user);
		return $this->db->get('data_profil');
	}

	public function get_publik($id_user = '')
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

	public function check_kode($kode)
	{
		$this->db->where('status', 0);
		$this->db->where('kode', $kode);
		return $this->db->get('data_kursus');
	}

	public function check_kode2($kode)
	{
		$this->db->where('status', 1);
		$this->db->where('kode', $kode);
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

	function delete_pesanan_kursus($id_kursus)
	{
		return $this->db->delete('data_kursus', array('id_kursus' => $id_kursus));
	}
}