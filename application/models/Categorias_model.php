<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public function getCategorias(){
		$this->db->where("Estado","1");
		$resultados = $this->db->get("categorias");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("categorias",$data);
	}
	public function getCategoria($id){
		$this->db->where("IdCategoria",$id);
		$resultado = $this->db->get("categorias");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("IdCategoria",$id);
		//echo $this->db->get_compiled_select();
		return $this->db->update("categorias",$data);
	}
}
