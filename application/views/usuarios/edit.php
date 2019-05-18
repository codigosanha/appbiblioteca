<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Usuario</h3>

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
        <?php echo form_open('usuarios/update', "enctype=multipart/form-data"); ?>
        <input type="hidden" name="idUsuario" value="<?php echo $usuario->id?>">
        <div class="box-body">
            <div class="col-md-6">
               
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required="required" value="<?php echo set_value('nombres')?:$usuario->nombres; ?>">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required="required" value="<?php echo set_value('apellidos')?:$usuario->apellidos; ?>">
                </div>
                <div class="form-group <?php echo form_error('email') == true ? 'has-error' : '' ?>">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="required" value="<?php echo set_value('email')?:$usuario->email; ?>">
                    <?php echo form_error('email'); ?>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group <?php echo form_error('dni') == true ? 'has-error' : '' ?>">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" required="required" value="<?php echo set_value('dni')?:$usuario->dni; ?>">
                    <?php echo form_error('dni'); ?>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo set_value('telefono')?:$usuario->telefono; ?>">
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" value="0" id="checkChangePassword" name="checkChangePassword">
                        Cambiar Contraseña
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña" disabled="disabled">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    <a href="<?php echo base_url(); ?>usuarios" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

</section>