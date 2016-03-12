<?php
defined('BASEPATH') OR exit('No director script acess allowed');

class Personagem extends CI_Model
{
	private $table = 'personagem';

	public function __construct(){
		parent::__construct();
		$this->load->model('ipersonagem');
	}

	public function save($data)
	{
		return $this->db->insert($this->table,$data);
	}


	public function find($criteria = array(),$limit = 100,$offset = 0)
	{
		$query = $this->db->get_where($this->table, $criteria, $limit, $offset);

		$objs = array();

		$results = $query->result();
		
		foreach ($results as $result)
		{			
			$obj = new IPersonagem;

			$obj->setId($result->id);
			$obj->setNome($result->nome);
			$obj->setRaca($result->raca);
			$obj->setVida($result->vida);
			$obj->setArma($result->arma);
			$obj->setDanoArma($result->dano_arma);
			$obj->setDefesa($result->defesa);
			$obj->setDado($result->dado);
			$obj->setForca($result->forca);
			$obj->setAgilidade($result->agilidade);

			$objs[] = $obj;
			
		}

		return $objs;
	}

	public function delete($criteria)
	{
		$this->db->delete($this->table, $criteria);
	}
}