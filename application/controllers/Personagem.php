<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personagem extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('layouts');
	}

	public function index()
	{
		$this->layouts->set_title('Personagens');
		$this->layouts->view('personagem/index');
	}

	public function combate()
	{
		$this->layouts->set_title('Você esta preparado para o combate?');
		$this->layouts->view('combate');
	}

	public function cadastrar()
	{
		$this->layouts->set_title('Cadastrar personagem');

		$data = array(
			'racas' => array(
				array('id'=>1,'nome'=>'Humanos'),
				array('id'=>2,'nome'=>'Orcs')
		));
		$this->layouts->view('personagem/save',$data);	
	}

	public function atualizar($id)
	{
		$this->layouts->set_title('Atualizar personagem');		
		
		$data = array(
			'racas' => array(
				array('id'=>1,'nome'=>'Humanos'),
				array('id'=>2,'nome'=>'Orcs'),
			),
			'personagem' => array(
				'nome'=>'Bruno',
				'forca' => '1',
				'vida' => '2',
				'agilidade' => '1',
				'raca' => '1',
				'defesa' => '2',
				'arma' => 'Espada longa',
				'dano_arma' => '3',
				'dado' => '6'
			)
		);
		$this->layouts->view('personagem/save',$data);
	}

	public function deletar($id)
	{
		$this->layouts->set_title('Personagens');
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
