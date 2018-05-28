<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin_model extends CI_Model {

	public function get_kabupaten()
	{
		$this->db->where('province_id', 34);
		return $this->db->get('regencies');
	}

	public function get_data_kecamatan($id = '')
	{
		$this->db->where('regency_id', $id);
		return $this->db->get('districts')->result_array();
	}

	public function get_kecamatan()
	{
		$this->db->where('province_id', 34);
		$this->db->join('regencies r', 'r.id = d.regency_id');
		return $this->db->get('districts d');
	}

	public function get_bank()
	{
		return $this->db->get('bank');
	}

	function get_guru()
	{
		$this->db->select('*, e.deleted_at AS deleted_at');
		$this->db->where('rule', 1);
		$this->db->join('user_verifikasi v', 'v.user = e.id_user', 'left');
		$this->db->join('regencies r', 'r.id = e.kabupaten');
		$this->db->join('districts d', 'd.id = e.kecamatan');
		return $this->db->get('users e');
	}

	function get_guru_verifikasi()
	{
		$this->db->where('rule', 1);
		$this->db->where('status_verifikasi', 0);
		$this->db->where('pesan', '');
		$this->db->join('user_verifikasi v', 'v.user = e.id_user');
		return $this->db->get('users e');
	}

	function get_murid()
	{
		$this->db->select('*, e.deleted_at AS deleted_at');
		$this->db->where('rule', 0);
		$this->db->join('regencies r', 'r.id = e.kabupaten');
		$this->db->join('districts d', 'd.id = e.kecamatan');
		return $this->db->get('users e');
	}

	function get_mail_user()
	{
		$this->db->where('rule !=', 2);
		$this->db->select('email');
		return $this->db->get('users');
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
		return $this->db->insert('users', $data_user);
	}

	function update_kabupaten($pk, $name, $value)
	{
		$data[$name] = $value;

		$this->db->where('id', $pk);
		$this->db->update('regencies', $data);

		return TRUE;
	}

	function update_kecamatan($pk, $name, $value)
	{
		$data[$name] = $value;

		$this->db->where('id', $pk);
		$this->db->update('districts', $data);

		return TRUE;
	}

	function set_kecamatan()
	{
		$data_kecamatan = array(
			'id' => $this->session->userdata('kabupaten').mt_rand(100, 999),
			'regency_id' => $this->session->userdata('kabupaten'),
			'district_name' => $this->input->post('kecamatan')
		);

		return $this->db->insert('districts', $data_kecamatan);
	}

	function set_total_tagihan($id_user)
	{
		return $this->db->insert('total_tagihan', array('id_guru' => $id_user));
	}

	function delete_kecamatan($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('districts');
	}

	function update_bank($pk, $name, $value)
	{
		$data[$name] = $value;

		$this->db->where('id_bank', $pk);
		$this->db->update('bank', $data);

		return TRUE;
	}

	function set_bank()
	{
		$data_bank = array(
			'nama_bank' => $this->input->post('bank'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('bank', $data_bank);
	}

	function delete_bank($id)
	{
		$this->db->where('id_bank', $id);
		return $this->db->delete('bank');
	}

	function delete_kontak($id)
	{
		$this->db->where('id_kontak', $id);
		return $this->db->delete('kontak');
	}

	function delete_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('users');
	}

	function blok_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('users', array('deleted_at' => date('Y-m-d H:i:s')));
	}

	function unblok_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('users', array('deleted_at' => '0000-00-00 00:00:00'));
	}

	function reset_password($id, $email)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('users', array('password' => sha1($email)));
	}

	function lunas_tagihan($id)
	{
		$this->db->where('guru', $id);
		$this->db->update('data_tagihan', array('status_tagihan' => 1));
		$this->db->where('id_guru', $id);
		$this->db->update('total_tagihan', array('total' => 0, 'bukti_pembayaran' => ''));

		return TRUE;
	}

	public function get_data_tambahan($id_user = '')
	{
		$this->db->where('n.id_user', $id_user);
		$this->db->join('bank b', 'b.id_bank = n.nama_bank');
		return $this->db->get('data_tambahan n');
	}

	public function get_pendapatan($id_guru)
	{
		$this->db->select('*, k.updated_at AS updated_at');
		$this->db->where('k.guru', $id_guru);
		$this->db->where('k.status', 3);
		$this->db->where('u.deleted_at', '0000-00-00 00:00:00');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		return $this->db->get('data_kursus k');
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
		$this->db->where('n.id_user', $id_user);
		$this->db->join('pelajaran p', 'p.id_pelajaran = n.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = p.id_tingkat');
		return $this->db->get('data_pelajaran n');
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

	public function get_user($id_user = '')
	{
		$this->db->where('id_user', $id_user);
		$this->db->join('districts d', 'd.id = u.kecamatan');
		$this->db->join('regencies r', 'r.id = u.kabupaten');
		return $this->db->get('users u');
	}

	public function get_superadmin()
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('users');
	}

	public function get_kontak()
	{
		return $this->db->get('kontak');
	}

	function get_tagihan($id_guru)
	{
		$this->db->where('d.guru', $id_guru);
		$this->db->join('data_kursus k', 'k.id_kursus = d.id_kursus');
		$this->db->join('data_pelajaran p', 'p.id_mapel = k.id_mapel');
		$this->db->join('pelajaran n', 'n.id_pelajaran = p.id_pelajaran');
		$this->db->join('tingkat t', 't.id_tingkat = n.id_tingkat');
		$this->db->join('users u', 'u.id_user = k.pemesan');
		return $this->db->get('data_tagihan d');
	}

	function get_data_tagihan()
	{
		$this->db->where('n.total !=', 0);
		$this->db->join('users u', 'u.id_user = n.id_guru');
		$this->db->join('districts d', 'd.id = u.kecamatan');
		$this->db->join('regencies r', 'r.id = u.kabupaten');
		return $this->db->get('total_tagihan n');
	}

	function get_guru_tagihan()
	{
		$this->db->where('d.status_tagihan', 0);
		$this->db->join('data_kursus k', 'k.id_kursus = d.id_kursus');
		$this->db->join('users u', 'u.id_user = k.guru');
		return $this->db->get('data_tagihan d');
	}

	function get_pembayaran_tagihan()
	{
		$this->db->where('bukti_pembayaran !=', '');
		$this->db->join('users u', 'u.id_user = n.id_guru');
		return $this->db->get('total_tagihan n');
	}

	public function get_total_tagihan($id_guru = '')
	{
		$this->db->where('id_guru', $id_guru);
		return $this->db->get('total_tagihan');
	}

	function add_pesan()
	{
		$this->db->where('id_verifikasi', $this->input->post('id_verifikasi'));
		return $this->db->update('user_verifikasi', array('pesan' => $this->input->post('pesan')));
	}

	function verifikasi_user($id_verifikasi)
	{
		$this->db->where('id_verifikasi', $id_verifikasi);
		return $this->db->update('user_verifikasi', array('status_verifikasi' => 1, 'pesan' => ''));
	}

	function update_password()
	{
		$password = sha1($this->input->post('new_password'));
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('users', array('password' => $password));
	}
}