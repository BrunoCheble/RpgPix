<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('layouts');
		$this->load->model('personagem');
	}

	public function atacar($id)
	{
		$ipersonagem = $this->personagem->find(array('id'=>$id));
		echo $ipersonagem[0]->atacar();
	}
	
	public function calculaAtaque($id)
	{
		$ipersonagem = $this->personagem->find(array('id'=>$id));
		echo $ipersonagem[0]->calculaAtaque();
	}

	public function calculaDefesa($id)
	{
		$ipersonagem = $this->personagem->find(array('id'=>$id));
		echo $ipersonagem[0]->calculaDefesa();
	}

	public function calculaDano()
	{
		$vida = 0;
		$id = 0;

		extract($_POST);

		$ipersonagem = $this->personagem->find(array('id'=>$id));

		$total_vida  = $ipersonagem[0]->calculaDano($vida);
		$total_dano  = $vida - $total_vida;

		echo json_encode(array(
			'vida' => $total_vida > 0 ? $total_vida : 0,
			'dano' => $total_dano
		));
	}
}
