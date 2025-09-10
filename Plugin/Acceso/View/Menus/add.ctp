<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Menu: Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->create('Menu'); ?>
                            <label for="data[Menu][parent_id]">Menu Padre</label>
                            <select name="data[Menu][parent_id]" id="MenuParentId" class="form-control">
                                <option value="" selected="selected">Escoja una opción o deje en blanco</option>
                                <?php foreach ($_menus as $m):?>
                                <option value="<?php echo $m['Padre']['id']; ?>"><?php echo $m['Padre']['_name'];?></option>
                                <?php endforeach;?>
                            </select>
                            <?php echo $this->Form->input('name', array('type'=>'text','label' => 'Nombre','class'=>'form-control')); ?><br/>
                            <div class="form-inline form-group"><?php echo $this->Form->input('estado',['label' => '&nbsp;Estado','div' => false, 'class' => 'checkbox', 'checked']); ?> </div>
                            <?php echo $this->Form->input('url',array('type'=>'text','class'=>'form-control')); ?><br/>
                            <?php echo $this->Form->input('icono',array('type'=>'text','class'=>'form-control')); ?><br/>
                            <br>
                            <button type="submit" class="btn btn-primary"> Guardar </button>
                        <?php echo $this->Form->end();?>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <h4><strong> Detalle del Menú </strong></h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Menú</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>    
                            <tbody>
                                <?php foreach ($categories as $val): ?>
                                    <?php if (!empty($val['children'])): ?>    
                                    <tr>  
                                        <td> 
                                            <i class="fas fa-folder-open"></i> <?php echo $val['Menu']['name']; ?> <a href="<?php echo $this->webroot; ?>acceso/menus/moveup/<?php echo $val['Menu']['id']; ?>/1"><i class="fa fa-caret-up"></i></a> <a href="<?php echo $this->webroot; ?>acceso/menus/movedown/<?php echo $val['Menu']['id']; ?>/1"><i class="fa fa-caret-down"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->webroot; ?>acceso/menus/delete/<?php echo $val['Menu']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>
                                            <a href="<?php echo $this->webroot; ?>acceso/menus/edit/<?php echo $val['Menu']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>

                                    <?php foreach ($val['children'] as $m ):?>
                                    <tr>
                                        <td> 
                                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-folder-open"></i> <?php echo $m['Menu']['name']; ?> <a href="<?php echo $this->webroot; ?>acceso/menus/moveup/<?php echo $m['Menu']['id']; ?>/1"><i class="fa fa-caret-up"></i></a> <a href="<?php echo $this->webroot; ?>acceso/menus/movedown/<?php echo $m['Menu']['id']; ?>/1"><i class="fa fa-caret-down"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->webroot; ?>acceso/menus/delete/<?php echo $m['Menu']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>
                                            <a href="<?php echo $this->webroot; ?>acceso/menus/edit/<?php echo $m['Menu']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                        <?php if (!empty($m['children'])): ?>
                                            <?php foreach ($m['children'] as $c ):?>
                                        <tr>
                                            <td> 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> <?php echo $c['Menu']['name']; ?> <a href="<?php echo $this->webroot; ?>acceso/menus/moveup/<?php echo $c['Menu']['id']; ?>/1"><i class="fa fa-caret-up"></i></a> <a href="<?php echo $this->webroot; ?>acceso/menus/movedown/<?php echo $c['Menu']['id']; ?>/1"><i class="fa fa-caret-down"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo $this->webroot; ?>acceso/menus/delete/<?php echo $c['Menu']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>
                                                <a href="<?php echo $this->webroot; ?>acceso/menus/edit/<?php echo $c['Menu']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>        
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    <?php endforeach;?>

                                    <?php else: ?>
                                        <tr>
                                            <td><?php echo $val['Menu']['name'] ?> </td>
                                            <td class="text-center">
                                                <a href="<?php echo $this->webroot; ?>acceso/menus/delete/<?php echo $val['Menu']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>&nbsp;&nbsp;
                                                <a href="<?php echo $this->webroot; ?>acceso/menus/edit/<?php echo $val['Menu']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('acceso/grupos-add')); ?>		