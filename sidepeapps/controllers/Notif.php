<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notif_model');
	}

	public function artikel()
	{
		$j = $this->notif_model->artikel_baru();
		if ($j > 0)
		{
			echo $j;
		}
	}

	public function komentar()
	{
		$j = $this->notif_model->komentar_baru();
		if ($j > 0)
		{
			echo $j;
		}
	}

	public function lapor()
	{
		$j = $this->notif_model->lapor_baru();
		if ($j > 0)
		{
			echo $j;
		}
	}
}