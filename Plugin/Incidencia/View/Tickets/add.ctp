<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Registrar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Ticket'); ?>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('incidencia_nombre', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Incidencia', 'options' => $incidencias, 'required')); ?></div>
                    <div class="col-lg-4">
                        <label for="TicketIncidenciaId">Tipo</label>
                        <select class="form-control" id="TicketIncidenciaId" name="data[Ticket][incidencia_id]" required="required">
                            <option value='00' selected="selected">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('prioridades', array('class' => 'form-control', 'label' => 'Prioridad', 'disabled')); ?>
                        <?php echo $this->Form->input('prioridade_id', array('type' => 'hidden')); ?>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="cruceBusca">Cruce</label>
                        <input type="text" class="form-control" id="cruceBusca" name='data[Cruce][txt]' placeholder="Ingrese Cruce">
                        <input type="hidden" id="TicketCruceId" name='data[Ticket][cruce_id]'>
                    </div>
                    <div class="col-lg-4"><?php echo $this->Form->input('equipo_id', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Se asigna a :', 'required')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?= $this->Form->input('reportadore_id', array('class' => 'form-control', 'label' => 'Quien reporta?','empty' => '--Seleccione--', 'required')); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('reportadore_nombres', array('class' => 'form-control', 'label' => 'Nombre','empty' => '--Seleccione--')); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('reportadore_dato_contacto', array('class' => 'form-control', 'label' => 'Dato de contacto','empty' => '--Seleccione--')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Detalle de incidencia', 'required')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <br><button id="back" class="btn btn-primary shadow">Volver</button> 
                        <button id="grabar" type="submit" class="btn btn-warning shadow"> Grabar </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('incidencias/tickets-add')); ?>