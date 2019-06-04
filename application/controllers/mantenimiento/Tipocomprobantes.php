<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipocomprobantes extends CI_Controller {

	//private $permisos;

	public function __construct(){
		parent::__construct();
		//crearemos la libreria Backend_lib
//		$this->load->model("Backend_model");
		//$this->permisos = $this->backend_lib->control();
		$this->load->model("TipoComprobantes_model");
	}

	public function index()
	{
		$data  = array(
			//'permisos' => $this->permisos,
			'tipo_comprobantes' => $this->TipoComprobantes_model->getTipoComprobantes()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tipocomprobantes/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tipocomprobantes/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$Descripcion = $this->input->post("Descripcion");
		$UltimoNro = $this->input->post("UltimoNro");

		$this->form_validation->set_rules("Descripcion","Descripcion","required|is_unique[tipo_comprobantes.Descripcion]");
		$this->form_validation->set_rules("UltimoNro","UltimoNro","required|is_unique[tipo_comprobantes.UltimoNro]");


		if ($this->form_validation->run()==TRUE) {

			$data  = array( 
				'Descripcion' => $Descripcion,
				'UltimoNro' => $UltimoNro,
				'Estado' => "1"
			);

			if ($this->TipoComprobantes_model->save($data)) {
				redirect(base_url()."mantenimiento/Tipocomprobantes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/Tipocomprobantes/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
		
	}

	public function edit($id){
	    
		$data  = array(
			'tipo_comprobantes' => $this->TipoComprobantes_model->getTipoComprobante($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/TipoComprobantes/edit",$data);
		$this->load->view("layouts/footer");
		
	}

	public function update(){
	    
		$idTipoComprobante = $this->input->post("idTipoComprobante");
		$Descripcion = $this->input->post("Descripcion");
		$UltimoNro = $this->input->post("UltimoNro");
	
		$this->form_validation->set_rules("Descripcion","Descripcion","required");
		$this->form_validation->set_rules("UltimoNro","UltimoNro","required");

		//if ($this->form_validation->run()==TRUE) {
			$data = array(

				'Descripcion' => $Descripcion,
				'UltimoNro' => $UltimoNro,
			);

			if ($this->TipoComprobantes_model->update($idTipoComprobante,$data)) {
				redirect(base_url()."mantenimiento/Tipocomprobantes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/Tipocomprobantes/edit/".$idTipoComprobante);
			}
		//}else{
			//$this->edit($IdTipoComprobante);
		//}
	
	}

	public function view($id){
		$data  = array(
			'tipo_comprobantes' => $this->TipoComprobantes_model->getTipoComprobante($id), 
		);
		$this->load->view("admin/Tipocomprobantes/view",$data);
	}

	public function delete($id){
		$data  = array(
			'Estado' => "0", 
		);
		$this->TipoComprobantes_model->update($id,$data);
		echo "mantenimiento/Tipocomprobantes";
	}
	
}
