
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Nuevo</small>
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

                        
                        <form action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                            
                            <div class="form-group <?php echo !empty(form_error('CodBarra')) ? 'has-error':'';?>">
                                <label for="CodBarra">Codigo Barra:</label>
                                <input type="text" class="form-control" id="CodBarra" name="CodBarra" value="<?php echo set_value('CodBarra');?>">
                                <?php echo form_error("CodBarra","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('Detalle')) ? 'has-error':'';?>">
                                <label for="Detalle">Detalle:</label>
                                <input type="text" class="form-control" id="Detalle" name="Detalle" value="<?php echo set_value('Detalle');?>">
                                <?php echo form_error("Detalle","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group ">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>

                            <div class="form-group <?php echo !empty(form_error('PrecioCompra')) ? 'has-error':'';?>">
                                <label for="PrecioCompra">Precio Compra:</label>
                                <input type="text" class="form-control" id="PrecioCompra" name="PrecioCompra" value="<?php echo set_value('PrecioCompra');?>">
                                <?php echo form_error("PrecioCompra","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('PrecioVenta')) ? 'has-error':'';?>">
                                <label for="PrecioVenta">Precio Venta:</label>
                                <input type="text" class="form-control" id="PrecioVenta" name="PrecioVenta" value="<?php echo set_value('PrecioVenta');?>">
                                <?php echo form_error("PrecioVenta","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('Stock')) ? 'has-error':'';?>">
                                <label for="Stock">Stock:</label>
                                <input type="text" class="form-control" id="Stock" name="Stock" value="<?php echo set_value('Stock');?>">
                                <?php echo form_error("Stock","<span class='help-block'>","</span>");?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('StockMinimo')) ? 'has-error':'';?>">
                                <label for="StockMinimo">Stock Minimo:</label>
                                <input type="text" class="form-control" id="StockMinimo" name="StockMinimo" value="<?php echo set_value('StockMinimo');?>">
                                <?php echo form_error("StockMinimo","<span class='help-block'>","</span>");?>
                            </div>


                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                    <option value="<?php echo $categoria->IdCategoria?>"><?php echo $categoria->Descripcion;?></option>
                                    <?php endforeach;?>
                                </select>
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
