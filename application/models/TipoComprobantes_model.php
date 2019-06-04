<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoComprobantes_model extends CI_Model {

	public function getTipoComprobantes(){
		$this->db->where("Estado","1");
		$resultados = $this->db->get("tipo_comprobantes");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tipo_comprobantes",$data);
	}
	public function getTipoComprobante($id){
		$this->db->where("IdTipoComprobante",$id);
		$resultado = $this->db->get("tipo_comprobantes");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("IdTipoComprobante",$id);
		return $this->db->update("tipo_comprobantes",$data);
	}
}
