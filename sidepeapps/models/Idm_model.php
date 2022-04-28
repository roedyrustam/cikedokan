<?php class Idm_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get($kode, $tahun)
	{

		$this->db->where('tahun', $tahun);
		$this->db->where('kode', $kode);

		if ($data = $this->db->get('idm')->row_array()) {

			return $data['data'];
		}

		if ($data = $this->fetch($kode, $tahun)) {

			$this->db->insert('idm', ['tahun' => $tahun, 'kode' => $kode, 'data' => $data]);

			return $data;
		}

		return null;
	}

	public function decode($kode, $tahun)
	{

		if ($data = $this->get($kode, $tahun)) {

			return json_decode($data, true);
		}

		return null;
	}

	public function fetch($kode, $tahun)
	{

		$json = $this->httpPost(sprintf("https://idm.kemendesa.go.id/open/api/desa/rumusan/3216082011/2021", $kode, $tahun));

		$data = json_decode($json);

		if ($data->status == 200) {

			return $json;
		}

		return null;
	}

	public function httpPost($url)
	{
		if (!extension_loaded('curl') or isset($_SESSION['no_curl'])) {
			show_error('Curl tidak bisa dijalankan, mohon diaktifkan terlebih dahulu. 1.' . $_SESSION['no_curl'] . ' 2.' . extension_loaded('curl'));
			return;
		}

		try {
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$output = curl_exec($ch);

			if ($output === false) {
				//echo 'Curl error: ' . curl_error($ch);
				return;
			}
			curl_close($ch);

			return $output;
		} catch (Exception $e) {
			return $e;
		}
	}
}