<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Grupos: Registrar</h6>
            </div>
            <div class="card-body">
            <?php echo $this->Form->create('Grupo'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <h4><strong>Agregar Grupo</strong></h4>
                        <?php echo $this->Form->input('nombre', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('descripcion', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('edicion', array('class' => 'form-control', 'label' => 'Puede editar datos?','empty' => '--Seleccione--','options'=> array('1'=>'Si','0'=>'No')));?>
                        <br>
                        <button type="submit" class="btn btn-primary" id="comprobar"> Grabar </button>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <h4><strong>Grupos creados</strong></h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($grupos as $grupo):?>
                                <tr>
                                    <td><?php echo $grupo['Grupo']['nombre'];?></td> 
                                    <td class="text-center">	
                                        <?php if ($grupo['Grupo']['estado'] == 1):?>
                                            <input id="GrupoEstado<?php echo  $grupo['Grupo']['id'];?>" type="checkbox" value="1" onchange="actEst('<?php echo $grupo['Grupo']['id'];?>')" checked >
                                        <?php elseif ($grupo['Grupo']['estado'] == 0):?>
                                            <input id="GrupoEstado<?php echo  $grupo['Grupo']['id'];?>" type="checkbox" value="1" onchange="actEst('<?php echo $grupo['Grupo']['id'];?>')" >
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo $this->webroot;?>acceso/gruposMenus/add/<?php echo $grupo['Grupo']['id'];?>"><i class="fa fa-tasks"></i></a>
                                        <a href="edit/<?php echo $grupo['Grupo']['id'];?>"><i class="fa fa-edit"></i></a>  
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('acceso/grupos-add')); ?>	