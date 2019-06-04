<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller{
    
    public function __construct(){

        parent::__construct();
        $this->permisos = $this->backend_lib->control();
        $this->load->model("Ventas_model");
        $this->load->model("Clientes_model");
        $this->load->model("Productos_model");
        $this->load->model("TipoCliente_model");
    
    }
    
    public function index(){
        $data = array(
            'permisos' => $this->permisos,
            'ventas' => $this->Ventas_model->getVentas(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/ventas/list", $data);
        $this->load->view("layouts/footer");
    }
    
    public function add(){
        
        $data = array(
          "tipocomprobantes" => $this->Ventas_model->getComprobantes(),
          "clientes" => $this->Clientes_model->getClientes(),
          "tipoclientes" => $this->TipoCliente_model->getTipoCliente()
        );
        
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/ventas/add", $data);
        $this->load->view("layouts/footer");

    }

    public function getproductos(){

        $valor = $this->input->post("valor");
        $productos = $this->Ventas_model->getproductos($valor);
        echo json_encode($productos); 

    }

    public function store(){

        $subtotal = $this->input->post("subtotal"); //recibe del formulario del parametro name
        $igv = $this->input->post("igv");
        $descuento = $this->input->post("descuento");
        $TotalVenta = $this->input->post("TotalVenta");
        $idcomprobante = $this->input->post("idcomprobante");
        $idcliente = $this->input->post("idcliente");
        $idusuario = $this->session->userdata("id");
        $numero = $this->input->post("numero");
        $serie = $this->input->post("serie");

        $idproductos = $this->input->post("idproductos");
        $precios = $this->input->post("precios");
        $cantidades = $this->input->post("cantidades");
        $importes = $this->input->post("importes");

        $data = array(
            
            'Fecha' => $this->input->post("fecha"),
    /*este igual a base de datos*/
            'subtotal' => $subtotal,
            'igv' => $igv,
            'descuento' => $descuento,
            'TotalVenta' => $TotalVenta,
            'TipoComprobanteId' => $idcomprobante,
            'ClienteId' => $idcliente,
            'IdUsuario' => $idusuario,
            'NroComprobante' => $numero,
            'SerieComprobante' => $serie
        );
    
        if($this->Ventas_model->save($data)){
            $idventa = $this->Ventas_model->lastID();
            $this->updateComprobante($idcomprobante);
            $this->save_detalle($idproductos, $idventa, $precios, $cantidades, $importes);
            redirect(base_url()."movimientos/ventas");
        }else{
            redirect(base_url()."movimientos/ventas/add");
        }

    }

    protected function updateComprobante($idcomprobante){

        $comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
        $data = array(
            'Cantidad' => $comprobanteActual->Cantidad + 1 
        );
        $this->Ventas_model->updateComprobante($idcomprobante, $data);

    }

    protected function save_detalle($productos, $idventa, $precios, $cantidades, $importes){
        for ($i = 0; $i < count($productos) ; $i++) {
            $data = array(
                'ProductoId' => $productos[$i],
                'VentaId' => $idventa,
                'PrecioUnitario' => $precios[$i],
                'Cantidad' => $cantidades[$i],
                'Importe' => $importes[$i],
            );
            $this->Ventas_model->save_detalle($data);
            $this->updateProducto($productos[$i], $cantidades[$i]);
        }
    }

    protected function updateProducto($idproducto, $cantidad){
        $productoActual = $this->Productos_model->getProducto($idproducto);
        $data = array(
            'Stock' => $productoActual->stock - $cantidad,
        );
        $this->Productos_model->update($idproducto, $data);
    }

    public function view(){
        $idventa = $this->input->post("id");
        $data = array(
            "venta" => $this->Ventas_model->getVenta($idventa),
            "detalles" => $this->Ventas_model->getDetalle($idventa),
        );
        $this->load->view("admin/ventas/view", $data);
    }
    
}