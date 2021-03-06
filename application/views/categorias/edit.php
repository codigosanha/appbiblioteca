<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Categoria</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
             </div>
        </div>
        <?php if ($this->session->flashdata("success")): ?>
            <script>
                swal("Exito", "<?php echo $this->session->flashdata("success") ;?>", "success");
            </script>
        <?php endif ?>
        <?php echo form_open('categorias/update', "enctype=multipart/form-data"); ?>
        <input type="hidden" name="idCategoria" value="<?php echo $categoria->id?>">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group <?php echo form_error('codigo') == true ? 'has-error' : '' ?>">
                    <label for="codigo">Codigo:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" required="required" value="<?php echo set_value('codigo')?:$categoria->codigo; ?>">
                    <?php echo form_error('codigo'); ?>
                </div>
                <div class="form-group <?php echo form_error('nombre') == true ? 'has-error' : '' ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="required" value="<?php echo set_value('nombre')?:$categoria->nombre; ?>">
                    <?php echo form_error('nombre'); ?>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    <a href="<?php echo base_url(); ?>categorias" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

</section>