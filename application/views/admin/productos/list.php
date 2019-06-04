<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <?php if($permisos->insert == 1): ?>
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Productos</a>
                    </div>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo de Barra</th>
                                    <th>Nombre</th>
                                    <th>Detalle</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Stock</th>
                                    <th>Stock Minimo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $producto):?>
                                        <tr>
                                            <td><?php echo $producto->IdProducto;?></td>
                                            <td><?php echo $producto->CodBarra;?></td>
                                            <td><?php echo $producto->Detalle;?></td>
                                            <td><?php echo $producto->PrecioCompra; ?></td>
                                            <td><?php echo $producto->PrecioVenta;?></td>
                                            <td><?php echo $producto->Stock;?></td>
                                            <td><?php echo $producto->StockMinimo;?></td>
                                    

                                            <?php $dataproducto = $producto->IdProducto."*".$producto->CodBarra."*".$producto->Detalle."*".$producto->PrecioCompra."*".$producto->PrecioVenta."*".$producto->Stock."*".$producto->StockMinimo;?>
                                                <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproducto;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>

                                                    <?php if($permisos->update == 1): ?>
                                                    <a href="<?php echo base_url()?>mantenimiento/productos/edit/<?php echo $producto->IdProducto;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif; ?>
                                                    <?php if($permisos->delete == 1): ?>
                                                    <a href="<?php echo base_url();?>mantenimiento/productos/delete/<?php echo $producto->IdProducto;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del Producto</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
