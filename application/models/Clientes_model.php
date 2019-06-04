<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {
	public function getClientes(){
	$this->db->where("Estado","1");
		$resultados = $this->db->get("clientes");
		return $resultados->result();
	}

	public function getCliente($id){
		$this->db->where("IdCliente",$id);
		$resultado = $this->db->get("clientes");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("clientes",$data);
	}
	public function update($id,$data){
		$this->db->where("IdCliente",$id);
		return $this->db->update("clientes",$data);
	}

	
	}
