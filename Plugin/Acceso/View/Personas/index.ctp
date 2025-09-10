<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Personas : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>acceso/personas/add" class="btn btn-primary shadow"> Nueva </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="personasIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
                                <th>Numero Documento</th>
                                <th>Fecha Nac.</th>
                                <th>Genero</th>
                                <th>Movil 1</th>
                                <th>Movil 2</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><?php echo h($persona['Persona']['id']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['ape_pat']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['ape_mat']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['nombres']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['num_doc']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['fecnac']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['genero']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['movil1']); ?>&nbsp;</td>
                            <td><?php echo h($persona['Persona']['movil2']); ?>&nbsp;</td>
                                <td><?php echo (h($persona['Persona']['estado']) == TRUE) ? 'ACTIVO' : 'INACTIVO'; ?>&nbsp;</td>
                                <td class="text-center">
                                        <a href="<?php echo $this->webroot;?>acceso/personas/edit/<?php echo $persona['Persona']['id'];?>" data-original-title="Editar Persona" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('acceso/personas-index')); ?>