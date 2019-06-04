<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'productos' => $this->Productos_model->getProductos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		//$data =array( 
 			//'productos' => $this->Productos_model->getProductos()
		//);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$CodBarra = $this->input->post("CodBarra");
		$Detalle = $this->input->post("Detalle");
		$PrecioCompra = $this->input->post("PrecioCompra");
		$PrecioVenta = $this->input->post("PrecioVenta");
		$Stock = $this->input->post("Stock");
		$StockMinimo = $this->input->post("StockMinimo");
		$categoria = $this->input->post("categoria");

		$this->form_validation->set_rules("CodBarra","CodBarra","required|is_unique[productos.CodBarra]");
		$this->form_validation->set_rules("Detalle","Detalle","required");
		$this->form_validation->set_rules("PrecioCompra","PrecioCompra","required");
		$this->form_validation->set_rules("PrecioVenta","PrecioVenta","required");
		$this->form_validation->set_rules("Stock","Stock","required");
		$this->form_validation->set_rules("StockMinimo","Stock Minimo","required");

		if ($this->form_validation->run()) {
			$data  = array(
				'Detalle' => $Detalle,
				'PrecioCompra' => $PrecioCompra,
				'PrecioVenta' => $PrecioVenta,
				'Stock' => $Stock,
				'StockMinimo' => $StockMinimo,
				'IdCategoria' => $categoria,
				'Estado' => "1"
			);

			if ($this->Productos_model->save($data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			
			"producto" => $this->Productos_model->getProducto($id),
			"categoria" => $this->Categorias_model->getCategorias(),

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		
		$idProducto = $this->input->post("idProducto");
		$CodBarra = $this->input->post("CodBarra");
		$Detalle = $this->input->post("Detalle");
		$PrecioCompra = $this->input->post("PrecioCompra");
		$PrecioVenta = $this->input->post("PrecioVenta");
		$Stock = $this->input->post("Stock");
		$StockMinimo = $this->input->post("StockMinimo");
		$categoria = $this->input->post("categoria");

		$this->form_validation->set_rules("CodBarra","CodBarra","required");
		$this->form_validation->set_rules("Detalle","Detalle","required");
		$this->form_validation->set_rules("PrecioCompra","PrecioCompra","required");
		$this->form_validation->set_rules("PrecioVenta","PrecioVenta","required");
		$this->form_validation->set_rules("Stock","Stock","required");
		$this->form_validation->set_rules("StockMinimo","Stock Minimo","required");


		//if ($this->form_validation->run()) {
			$data  = array(

				'CodBarra' => $CodBarra, 
				'Detalle' => $Detalle,
				'PrecioCompra' => $PrecioCompra,
				'PrecioVenta' => $PrecioVenta,
				'Stock' => $Stock,
				'StockMinimo' => $StockMinimo,
				'IdCategoria' => $categoria,
				'Estado' => "1"
			);

			if ($this->Productos_model->update($idProducto,$data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/edit/".$idProducto);
			}
		//}else{
			//$this->edit($idProducto);
		//}

		
	}
	public function delete($id){
		$data  = array(
			'Estado' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}

}