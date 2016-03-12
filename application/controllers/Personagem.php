<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personagem extends CI_Controller {

	public function index()
	{
		$this->load->view('personagem/index');
	}

	public function cadastrar()
	{
		$this->load->view('personagem/save');		
	}

	public function atualizar($id)
	{
		$this->load->view('personagem/save');
	}

	public function deletar()
	{
		$this->load->view('personagem/index',array('deletado'=>true));
	}

	public function atacar()
	{
		// JogarDado(20) + AGI
		$agilidade = 0;
		
		extract($_POST);

		return $this->jogarDado(20) + $agilidade;
	}
	
	public function calculaAtaque()
	{
		// JogarDado(20) + AGI + ATK DA ARMA
		$agilidade = 0;
		$atk_arma = 0;
		
		extract($_POST);

		return $this->jogarDado(20) + $agilidade + $atk_arma;
	}

	public function calculaDefesa()
	{
		// JogarDado(20) + AGI + DEF
		$agilidade = 0;
		$defesa = 0;
		
		extract($_POST);

		return $this->jogarDado(20) + $agilidade + $defesa;

	}

	public function calculaDano()
	{
		// JogarDado(DADO) + FORÇA - VIDA
		$forca = 0;
		$vida = 0;
		$dado = 0;
		
		extract($_POST);

		return $this->jogarDado($dado) + $forca - $vida;

	}
	
	private function jogarDado($lados)
	{
		return mt_rand(1,$lados);
	}
}
