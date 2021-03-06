<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras_model extends CI_Model {

	/*public function getCompras(){
		$this->db->select("c.*, p.RazonSocial as proveedor");
		$this->db->from("compras c");
		$this->db->join("tipo_comprobantes tc", "c.tipo = tc.IdTipoComprobante");
		$this->db->join("proveedores p", "c.ProveedorId = p.IdProveedor");
    
		$resultados = $this->db->get();

		if($resultados->num_rows()){
			return $resultados->result();
		}else{
			return false;
		}
	}*/
    public function getCompras(){
        $this->db->select("c.*,c.IdCompra, tc.Descripcion as tipo_comprobant, c.SerieComprobante, c.NroComprobante, c.Fecha, p.RazonSocial as proveedor, c.TotalCompra");
        $this->db->from("compras c");
        $this->db->join("tipo_comprobantes tc", "c.tipo = tc.IdTipoComprobante");
        $this->db->join("proveedores p", "c.ProveedorId = p.IdProveedor");
    
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

	public function getCompra($id){

        $this->db->select("c.IdCompra, tc.Descripcion as tipo_comprobantes, c.SerieComprobante, c.NroComprobante, c.Fecha, p.RazonSocial as proveedor,c.igv, c.descuento, c.subtotal, c.total");
        $this->db->from("compras c");
        $this->db->join("proveedor p", "c.proveedor_id = p.IdProveedor");
        $this->db->join("tipo_comprobantes tc", "c.TipoComprobanteId = tc.IdTipoComprobante");
		$this->db->where("c.id", $IdCompra);
		$resultado = $this->db->get();
		return $resultado->row();

	}

	public function getDetalle($id){

		$this->db->select("dt.*, p.CodBarra, p.Detalle, dt.PrecioUnitario, dt.Cantidad, dt.Importe");
		$this->db->from("detalle_compras dt");
		$this->db->join("productos p", "dt.producto_id = p.IdProducto");
		$this->db->where("dt.compras_id", $IdCompra);
	  	$resultados = $this->db->get();
	  	return $resultados->result();

	}

    public function getComprobantes(){
        $resultados = $this->db->get("tipo_comprobante");
        return $resultados->result();
    }

    public function getComprobante($IdTipoComprobante){

    	$this->db->where("IdTipoComprobante", $IdTipoComprobante);
    	$resultado = $this->db->get("tipo_comprobante");
    	return $resultado->row();

    }

    public function getproductos($valor){
        $this->db->select("IdProducto, CodBarra, Detalle as label, PrecioCompra, PrecioVenta, Stock");
        $this->db->from("productos");
        $this->db->like("Detalle", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data){
    	return $this->db->insert("compras", $data);
    }

    public function lastID(){
    	return $this->db->insert_id();
    }


    public function updateComprobante($IdTipoComprobante, $data){
    	$this->db->where("id", $IdTipoComprobante);
    	$this->db->update("tipo_comprobante", $data);
    }

    public function save_detalle($data){
    	$this->db->insert("detalle_compras", $data);
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
