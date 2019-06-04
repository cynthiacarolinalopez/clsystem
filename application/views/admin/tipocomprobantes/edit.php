<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Tipo Comprobante
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
                        <form action="<?php echo base_url();?>mantenimiento/Tipocomprobantes/update" method="POST">
                            
                            <input type="hidden" name="IdTipoComprobante" value="<?php echo $tipo_comprobantes->IdTipoComprobante;?>">
                            
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="<?php echo $tipo_comprobantes->Descripcion?>">
                            </div>
                            <div class="form-group">
                                <label for="UltimoNro">Ultimo Numero:</label>
                                <input type="text" class="form-control" id="UltimoNro" name="UltimoNro" value="<?php echo $tipo_comprobantes->UltimoNro?>">
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
