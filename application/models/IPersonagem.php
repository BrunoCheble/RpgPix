<?php
defined('BASEPATH') OR exit('No director script acess allowed');

class IPersonagem extends CI_Model
{
	private $id;
	private $nome;
	private $raca;
	private $vida;
	private $arma;
	private $dano_arma;
	private $defesa;
	private $dado;
	private $forca;
	private $agilidade;


	public function valida() {
		
		$_id 		= !is_integer($this->id) && !empty($this->id);
		$_raca 		= !is_integer($this->raca);
		$_vida 		= !is_integer($this->raca);
		$_dano_arma = !is_integer($this->dano_arma);
		$_defesa 	= !is_integer($this->defesa);
		$_dado 		= !is_integer($this->dado);
		$_agilidade = !is_integer($this->agilidade);
		$_arma      = !empty($this->dano_arma) && empty($this->arma);
		$_nome		= empty($this->nome);

		if($_id || $_raca || $_vida || $_dano_arma || $_defesa || $_dado || $_agilidade || $_arma || $_nome)
			return false;

		return true;
	}

	/* ENCAPSULAMENTO DE DADOS */

	public function setId($id) { $this->id = $id; }
	public function getId() { return $this->id; }

	public function setNome($nome) { $this->nome = $nome; }
	public function getNome() { return $this->nome; }

	public function setRaca($raca) { $this->raca = $raca; }
	public function getRaca() { return $this->raca; }

	public function setVida($vida) { $this->vida = $vida; }
	public function getVida() { return $this->vida; }

	public function setArma($arma) { $this->arma = $arma; }
	public function getArma() { return $this->arma; }

	public function setDanoArma($dano_arma) { $this->dano_arma = $dano_arma; }
	public function getDanoArma() { return $this->dano_arma; }

	public function setDefesa($defesa) { $this->defesa = $defesa; }
	public function getDefesa() { return $this->defesa; }

	public function setDado($dado) { $this->dado = $dado; }
	public function getDado() { return $this->dado; }

	public function setForca($forca) { $this->forca = $forca; }
	public function getForca() { return $this->forca; }

	public function getNomeRaca(){ return $this->raca == 1 ? 'Humano' : 'Orc';}

	public function setAgilidade($agilidade) { $this->agilidade = $agilidade; }
	public function getAgilidade() { return $this->agilidade; }

	public function calculaDano($vida) { return $vida - ($this->jogarDado($this->dado) + $this->agilidade + $this->forca);}

	public function calculaDefesa() { return $this->jogarDado(20) + $this->agilidade + $this->defesa; }
	public function calculaAtaque() { return $this->jogarDado(20) + $this->agilidade + $this->dano_arma; }
	public function atacar(){ return $this->jogarDado(20) + $this->agilidade; }

	private function jogarDado($lados) { return mt_rand(1,$lados); }
}
