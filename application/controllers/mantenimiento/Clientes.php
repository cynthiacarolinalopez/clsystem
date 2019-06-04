<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Clientes_model");
	}

	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'clientes' => $this->Clientes_model->getClientes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list", $data);
		$this->load->view("layouts/footer");

	}
	public function add(){


		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add");
		$this->load->view("layouts/footer");
	}
	public function store(){

		$RazonSocial = $this->input->post("RazonSocial");
		$NroDocumento = $this->input->post("NroDocumento");
		$Direccion = $this->input->post("Direccion");
		$Telefono = $this->input->post("Telefono");
		
		$this->form_validation->set_rules("RazonSocial", "Nombre del cliente", "required");
		$this->form_validation->set_rules("NroDocumento", "Numero del documento", "required|is_unique[clientes.NroDocumento]");
		
		if($this->form_validation->run()){
		    
		    $data  = array(
		        'RazonSocial' => $RazonSocial,
		     	'NroDocumento' => $NroDocumento,
		        'Direccion' => $Direccion,
		        'Telefono' => $Telefono,
		        
		        'Estado' => "1"
		    );
		    
		    if ($this->Clientes_model->save($data)) {
		        redirect(base_url()."mantenimiento/clientes");
		    }
		    else{
		        $this->session->set_flashdata("error","No se pudo guardar la informacion");
		        redirect(base_url()."mantenimiento/clientes/add");
		    }
		    
		}else{
		    
		    $this->add();
		    
		}

		
		
	}
	public function edit($id){
		$data  = array(
			'cliente' => $this->Clientes_model->getCliente($id), 

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}


	public function update(){
	    
		$idCliente = $this->input->post("idCliente");
		$RazonSocial = $this->input->post("RazonSocial");
		$NroDocumento = $this->input->post("NroDocumento");
		$Direccion = $this->input->post("Direccion");
		$Telefono = $this->input->post("Telefono");
		
		
		$this->form_validation->set_rules("RazonSocial", "Nombre del cliente", "required");
		$this->form_validation->set_rules("NroDocumento", "Numero del documento", "required".$is_unique);

		//if($this->form_validation->run()){
		    
		    $data = array(
		        'RazonSocial' => $RazonSocial,
		        'NroDocumento' => $NroDocumento,
		        'Direccion' => $Direccion,
		        'Telefono' => $Telefono,
		        
		    );
		    
		    if ($this->Clientes_model->update($idCliente,$data)) {
		        redirect(base_url()."mantenimiento/clientes");
		    }
		    else{
		        $this->session->set_flashdata("error","No se pudo actualizar la informacion");
		        redirect(base_url()."mantenimiento/clientes/edit/".$idCliente);
		    }
		    
		//}else{
		   // $this->edit($idcliente);
		//}
		
	}

	public function delete($id){
		$data  = array(
			'Estado' => "0", 
		);
		$this->Clientes_model->update($id,$data);
		echo "mantenimiento/clientes";
	}
}