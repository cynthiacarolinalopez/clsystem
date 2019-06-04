<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function getProductos(){
		$this->db->where("Estado","1");
		$resultados = $this->db->get("productos");
		return $resultados->result();
	}

	public function getProducto($id){
		$this->db->where("IdProducto",$id);
		$resultado = $this->db->get("productos");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("productos",$data);
	}

	public function update($id,$data){
		$this->db->where("IdProducto",$id);
		return $this->db->update("productos",$data);
	}

}