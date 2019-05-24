<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Revista</h3>

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
        <?php echo form_open('revistas/update', "enctype=multipart/form-data"); ?>
        <input type="hidden" name="idRevista" value="<?php echo $revista->id;?>">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_registro">Nro de Registro</label>
                    <input type="text" id="numero_registro" class="form-control" id="numero_registro" name="numero_registro" placeholder="Numero Registro" required="required" value="<?php echo set_value('numero_registro') ?: $revista->numero_registro; ?>">
                </div>
                <div class="form-group <?php echo form_error('codigo_ubicacion') == true ? 'has-error' : '' ?>">
                    <label for="codigo_ubicacion">Codigo Ubicacion</label>
                    <input type="text" class="form-control" id="codigo_ubicacion" name="codigo_ubicacion" placeholder="Codigo Ubicacion" value="<?php echo set_value('codigo_ubicacion') ?: $revista->codigo_ubicacion; ?>" required="required">
                    <?php echo form_error('codigo_ubicacion'); ?>
                </div>
                <div class="form-group">
                    <label for="revista">Revista</label>
                    <input type="text" id="revista" class="form-control" id="revista" name="revista" placeholder="Revista" required="required" value="<?php echo set_value('revista') ?: $revista->revista; ?>">
                </div>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" id="titulo" class="form-control" id="titulo" name="titulo" placeholder="Numero Registro" required="required" value="<?php echo set_value('titulo') ?: $revista->titulo; ?>">
                </div>
                <div class="form-group">
                    <label for="publicacion">Año de Publicacion</label>
                    <input type="text" id="datepicker"class="form-control" id="publicacion" name="publicacion" placeholder="Año de Publicacion" required="required" value="<?php echo set_value('publicacion') ?: $revista->año_publicacion; ?>">
                </div>
            </div>
        <div class="col-md-6">

            <div class="form-group">
                <label for="editorial">Editorial</label>
                <input type="text" class="form-control" id="editorial" name="editorial" placeholder="Editorial" value="<?php echo set_value('editorial') ?: $revista->editorial; ?>">
            </div>

            <div class="form-group">
                <label for="lugar">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" placeholder="Lugar" maxlength="15" value="<?php echo set_value('lugar') ?: $revista->lugar; ?>">
            </div>
            <div class="form-group <?php echo form_error('ejemplares') == true ? 'has-error' : '' ?>">
                <label for="ejemplares">Ejemplares</label>
                <input type="number" class="form-control" id="ejemplares" name="ejemplares" placeholder="Ejemplares" value="<?php echo set_value('ejemplares') ?: $revista->ejemplares; ?>" required="required" min="1">
                <?php echo form_error('ejemplares'); ?>
            </div>
           
            <div class="form-group">
                <label for="imagen">Imagen Portada</label>
                <input type="file" id="imagen" name="imagen" required="required" accept=".jpg, .png">
            </div>
        </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    <a href="<?php echo base_url(); ?>revistas" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

</section>