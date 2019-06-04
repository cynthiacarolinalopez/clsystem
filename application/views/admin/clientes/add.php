
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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

                        <form action="<?php echo base_url();?>mantenimiento/clientes/store" method="POST">
                           
                            <div class="form-group <?php echo form_error('RazonSocial') != false ? 'has-error':''?>">
                                <label for="nombre">RazonSocial:</label>
                                <input type="text" class="form-control" id="RazonSocial" name="RazonSocial" value="<?php echo set_value("RazonSocial");?>">
                                <?php echo form_error("RazonSocial","<span class='help-block'>","</span>");?>
                            </div>
                            

                            <div class="form-group <?php echo form_error('NroDocumento') != false ? 'has-error':''?>">
                                <label for="numero">Numero del Documento:</label>
                                <input type="text" class="form-control" id="NroDocumento" name="NroDocumento" value="<?php echo set_value("NroDocumento")?>">
                                <?php echo form_error("numero","<span class='help-block'>","</span>");?>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="Telefono" name="Telefono">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="Direccion" name="Direccion">
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
