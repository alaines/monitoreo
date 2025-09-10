<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencias : Consultar x Ticket</h6>
            </div>
            <div class="card-body">
            <?php echo $this->Form->create('Ticket'); ?> 
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('Ticket.id', array('class' => 'form-control', 'label' => 'Número de Ticket', 'type'=> 'text', 'placeholder' => 'Ingrese número de Ticket')); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <button type="submit" id="buscar" class="btn btn-danger shadow">Buscar</button> &nbsp;&nbsp;
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>