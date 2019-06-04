<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

	public function getVentas(){
		$this->db->select("v.*, c.RazonSocial, tc.Descripcion as tipo_comprobantes");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.ClienteId = c.IdCliente");
		$this->db->join("tipo_comprobantes tc", "v.TipoComprobanteId = tc.IdTipoComprobante");
    
		$resultados = $this->db->get();

		if($resultados->num_rows()){
			return $resultados->result();
		}else{
			return false;
		}
	}
    

    public function getVentasbyDate($fechainicio, $fechafin){
    	$this->db->select("v.*, c.RazonSocial, tc.Descripcion as tipo_comprobantes");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.ClienteId = c.IdCliente");
		$this->db->join("tipo_comprobantes tc", "v.TipoComprobanteId = tc.IdTipoComprobante");
		$this->db->where("v.fecha >=", $fechainicio);
		$this->db->where("v.fecha <=", $fechafin);
		$resultados = $this->db->get();

		if($resultados->num_rows() > 0){
			return $resultados->result();
		}else{
			return false;
		}
    }

	public function getVenta($id){

		$this->db->select("v.*, c.RazonSocial, c.Direccion, c.Telefono, c.NroDocumento as documento, tc.Descripcion as tipo_comprobantes");
		$this->db->from("ventas v");
		$this->db->join("clientes c", "v.ClienteId = c.IdCliente");
		$this->db->join("tipo_comprobantes tc", "v.TipoComprobanteId = tc.IdTipoComprobante"); 
		$this->db->where("v.IdVenta", $id);
		$resultado = $this->db->get();
		return $resultado->row();

	}

	public function getDetalle($id){

		$this->db->select("dt.*, p.CodBarra, p.StockMinimo as Stock, p.Detalle");
		$this->db->from("detalle_ventas dt");
		$this->db->join("productos p", "dt.ProductoId = p.IdProducto");
		$this->db->where("dt.VentaId", $id);
	  	$resultados = $this->db->get();
	  	return $resultados->result();

	}

    public function getComprobantes(){
        $resultados = $this->db->get("tipo_comprobantes");
        return $resultados->result();
    }

    

    public function getComprobante($idcomprobante){

    	$this->db->where("IdTipoComprobante", $idcomprobante);
    	$resultado = $this->db->get("tipo_comprobantes");
    	return $resultado->row();

    }

    public function getproductos($valor){
        $this->db->select("IdProducto, CodBarra, Detalle as label, PrecioVenta, Stock");
        $this->db->from("productos");
        $this->db->like("Detalle", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data){
    	return $this->db->insert("ventas", $data);
    }

    public function lastID(){
    	return $this->db->insert_id();
    }


    public function updateComprobante($idcomprobante, $data){
    	$this->db->where("IdTipoComprobante", $idcomprobante);
    	$this->db->update("tipo_comprobantes", $data);
    }

    public function save_detalle($data){
    	$this->db->insert("detalle_ventas", $data);

    }

    public function years(){

    	$this->db->select("YEAR(fecha) as year");
    	$this->db->from("ventas");
    	$this->db->group_by("year");
    	$this->db->order_by("year", "desc");
    	$resultados = $this->db->get();
    	return $resultados->result();

    }

    public function montos($year){
    	
    	$this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
    	$this->db->from("ventas");
    	$this->db->where("fecha >=", $year."-01-01");
    	$this->db->where("fecha <=", $year."-12-31");
    	$this->db->group_by("mes");
    	$resultados = $this->db->get();
    	return $resultados->result();
    }
    
}
