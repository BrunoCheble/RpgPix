<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('layouts');
		$this->load->model('personagem');
	}

	public function index()
	{
		$this->layouts->set_title('Personagens');
		$this->layouts->view('personagem/index');
	}

	public function combate()
	{
		

		$ipersonagem = $this->personagem->find(array('raca'=>1));
		$data['humano'] = !empty($ipersonagem) ? $ipersonagem[0] : '';

		$ipersonagem = $this->personagem->find(array('raca'=>2));
		$data['orc'] = !empty($ipersonagem) ? $ipersonagem[0] : '';

		$this->layouts->set_title('Arena vazia');

		$view = empty($data['humano']) || empty($data['orc']) ? 'paz' : 'combate';

		$this->layouts->view($view,$data);
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
}
