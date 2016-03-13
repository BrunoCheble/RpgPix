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
		$data['personagens'] = $this->personagem->find();

		$this->layouts->set_title('Personagens');
		$this->layouts->view('personagem/index',$data);
	}

	public function combate()
	{
		
		$ipersonagem = $this->personagem->find(array('raca'=>1),1,0,'RANDOM');
		$data['humano'] = !empty($ipersonagem) ? $ipersonagem[0] : '';

		$ipersonagem = $this->personagem->find(array('raca'=>2),1,0,'RANDOM');
		$data['orc'] = !empty($ipersonagem) ? $ipersonagem[0] : '';

		$this->layouts->set_title('Arena vazia');

		$view = empty($data['humano']) || empty($data['orc']) ? 'paz' : 'combate';

		$this->layouts->add_include('assets/js/combate.js');

		$this->layouts->view($view,$data);
	}

	public function cadastrar()
	{
		$this->layouts->set_title('Cadastrar personagem');

		$ipersonagem = new IPersonagem;

		if(!empty($_POST)){

			$personagem = new Personagem();

			$ipersonagem->setNome($_POST['nome']);
			$ipersonagem->setRaca((int)$_POST['raca']);
			$ipersonagem->setVida((int)$_POST['vida']);
			$ipersonagem->setArma($_POST['arma']);
			$ipersonagem->setDanoArma((int)$_POST['dano_arma']);
			$ipersonagem->setDefesa((int)$_POST['defesa']);
			$ipersonagem->setDado((int)$_POST['dado']);
			$ipersonagem->setForca((int)$_POST['forca']);
			$ipersonagem->setAgilidade((int)$_POST['agilidade']);
			$ipersonagem->valida();
			
			if($ipersonagem->valida()){
				$return = $personagem->save($ipersonagem);
				$this->index();
				return;
			}
		}
		
		$data['personagem'] = $ipersonagem;

		$data['racas'] = array(
			array('id'=>1,'nome'=>'Humanos'),
			array('id'=>2,'nome'=>'Orcs')
		);

		$this->layouts->add_include('assets/js/form.js');

		$this->layouts->view('personagem/save',$data);	
	}

	public function atualizar($id)
	{
		$this->layouts->set_title('Atualizar personagem');		
		

		$data['racas'] = array(
				array('id'=>1,'nome'=>'Humanos'),
				array('id'=>2,'nome'=>'Orcs'),
			);
		
		$personagem = new Personagem();

		if(!empty($_POST)){
			
			$ipersonagem = new IPersonagem;

			$ipersonagem->setId((int)$id);
			$ipersonagem->setNome($_POST['nome']);
			$ipersonagem->setRaca((int)$_POST['raca']);
			$ipersonagem->setVida((int)$_POST['vida']);
			$ipersonagem->setArma($_POST['arma']);
			$ipersonagem->setDanoArma((int)$_POST['dano_arma']);
			$ipersonagem->setDefesa((int)$_POST['defesa']);
			$ipersonagem->setDado((int)$_POST['dado']);
			$ipersonagem->setForca((int)$_POST['forca']);
			$ipersonagem->setAgilidade((int)$_POST['agilidade']);

			if($ipersonagem->valida()){
				$return = $personagem->save($ipersonagem);
				$this->index();
				return;
			}
		}
		else
			$ipersonagem = $this->personagem->find(array('id'=>$id));

		$data['personagem'] = !empty($ipersonagem) ? $ipersonagem[0] : new IPersonagem;

		$this->layouts->add_include('assets/js/form.js');
		
		$this->layouts->view('personagem/save',$data);
	}

	public function deletar($id)
	{
		$this->layouts->set_title('Personagens');
		
		$personagem = new Personagem();
		
		$personagem->delete(array('id'=>$id));

		$this->index();
	}
}
