
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>

                        <form action="<?php echo base_url();?>mantenimiento/productos/update" method="POST">
                           
                            <div class="form-group">
                            <input type="text" class="form-control" name="idProducto" value="<?php echo $producto->IdProducto?>"> 
                            </div>
                            
                            <div class="form-group <?php echo !empty(form_error('CodBarra')) ? 'has-error':'';?>">
                                <label for="CodBarra">Nombre:</label>
                                <input type="text" class="form-control" id="CodBarra" name="CodBarra" value="<?php echo !empty(form_error('CodBarra')) ? set_value('CodBarra'):$producto->CodBarra?>">
                                <?php echo form_error("CodBarra","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('Detalle')) ? 'has-error':'';?>">
                                <label for="Detalle">Detalle:</label>
                                <input type="text" class="form-control" id="Detalle" name="Detalle" value="<?php echo !empty(form_error('Detalle')) ? set_value('Detalle'):$producto->Detalle?>">
                                <?php echo form_error("Detalle","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group">
                                <label for="PrecioCompra">Precio Compra:</label>
                                <input type="text" class="form-control" id="PrecioCompra" name="PrecioCompra" value="<?php echo $producto->PrecioCompra?>">
                            </div>

                            <div class="form-group <?php echo !empty(form_error('PrecioVenta')) ? 'has-error':'';?>">
                                <label for="precio">Precio Venta:</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo !empty(form_error('PrecioVenta')) ? set_value('PrecioVenta'):$producto->PrecioVenta?>">
                                <?php echo form_error("PrecioVenta","<span class='help-block'>","</span>");?>
                            </div>


                            <div class="form-group <?php echo !empty(form_error('Stock')) ? 'has-error':'';?>">
                                <label for="Stock">Stock:</label>
                                <input type="text" class="form-control" id="stock" name="Stock" value="<?php echo !empty(form_error('Stock')) ? set_value('Stock'):$producto->Stock?>">
                                <?php echo form_error("Stock","<span class='help-block'>","</span>");?>
                            </div>


                            <div class="form-group <?php echo !empty(form_error('StockMinimo')) ? 'has-error':'';?>">
                                <label for="StockMinimo">Stock Minimo:</label>
                                <input type="text" class="form-control" id="StockMinimo" name="StockMinimo" value="<?php echo !empty(form_error('StockMinimo')) ? set_value('StockMinimo'):$producto->StockMinimo?>">
                                <?php echo form_error("StockMinimo","<span class='help-block'>","</span>");?>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
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
