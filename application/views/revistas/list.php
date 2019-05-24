<section class="content">
      <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de Revistas</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
             </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url(); ?>revistas/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Revista</a>
                </div>
            </div>
            <!-- /.row -->
            <?php if ($this->session->flashdata("success")): ?>
                <script>
                    swal("Exito", "<?php echo $this->session->flashdata("success") ;?>", "success");
                </script>
            <?php endif ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="tb-without-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Numero de Registro</th>
                                <th>Cod. Ubicacion</th>
                                <th>Revista</th>
                                <th>Titulo</th>
                                <th>Editorial</th>
                                <th>Lugar</th>
                                <th>Año</th>
                                <th>Ejemplares</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($revistas): ?>
                            <?php $i = 1;?>
                            <?php foreach ($revistas as $revista): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $revista->numero_registro; ?></td>
                                    <td><?php echo $revista->codigo_ubicacion; ?></td>
                                    <td><?php echo $revista->revista; ?></td>
                                    <td><?php echo $revista->titulo; ?></td>
                                    <td><?php echo $revista->editorial; ?></td>
                                    <td><?php echo $revista->lugar; ?></td>
                                    <td><?php echo $revista->año_publicacion; ?></td>
                                    <td><?php echo $revista->ejemplares; ?></td>
                                    <td><img src="<?php echo base_url(); ?>assets/images/revistas/<?php echo $revista->imagen; ?>" width="100px;" height="100px" alt=""></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>revistas/edit/<?php echo $revista->id; ?>" class="btn btn-warning btn-flat" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                </tr>
                                <?php $i++;?>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
      <!-- /.box -->
</section>

<div class="modal modal-info fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PORTADA DEL LIBRO</h4>
            </div>
          <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h4>Portada Actual</h4>
                        <img src="" alt="Portada Actual" class="image-actual img-responsive">
                    </div>
                    <div class="col-sm-8">
                        <h4>Cambiar Imagen de Portada</h4>
                        <form action="<?php echo base_url(); ?>backend/libros/changeImage" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="imagen">Seleccione Imagen:</label>
                                <input type="hidden" name="idLibro">
                                <input type="file" id="imagen" name="imagen" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>

          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>