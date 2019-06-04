<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	private $permisos;

	public function __construct(){
		parent::__construct();
		//crearemos la libreria Backend_lib
//		$this->load->model("Backend_model");
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Categorias_model");
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'categorias' => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$Descripcion = $this->input->post("Descripcion");

		$this->form_validation->set_rules("Descripcion","Descripcion","required|is_unique[categorias.Descripcion]");


		if ($this->form_validation->run()==TRUE) {

			$data  = array( 
				'Descripcion' => $Descripcion,
				'Estado' => "1"
			);

			if ($this->Categorias_model->save($data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/categorias/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
		
	}

	public function edit($id){
	    
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit",$data);
		$this->load->view("layouts/footer");
		
	}

	public function update(){
	    
	    $idCategoria=$this->input->post("idCategoria");
		$Descripcion = $this->input->post("Descripcion");
	
		$this->form_validation->set_rules("Descripcion","Descripcion","required");

		//if ($this->form_validation->run()==TRUE) {
			$data = array(

				'Descripcion' => $Descripcion,
			);

			if ($this->Categorias_model->update($idCategoria,$data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/categorias/edit/".$idCategoria);
			}
		//}
		/*else{
			$this->edit($idCategoria);
		}*/
	
	}

	public function view($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){
		$data  = array(
			'Estado' => "0", 
		);
		$this->Categorias_model->update($id,$data);
		echo "mantenimiento/categorias";
	}
	
}
