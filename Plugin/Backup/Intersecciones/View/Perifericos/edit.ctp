<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Periferico : Registrar</h6>
            </div>
            <div class="card-body">
                <?= $this->Form->create('Periferico'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $this->Form->input('tipo_periferico',['label'=>'Tipo de Periferico','class' => 'form-control','options' => $tipo_periferico,'empty' => '--Seleccione--'],'required'); ?>
                    </div>
                    <div class="col-lg-4"><?= $this->Form->input('fabricante', ['class' => 'form-control']); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('modelo', ['class' => 'form-control']); ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4"><?= $this->Form->input('ip', ['type' => 'text','class' => 'form-control']); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('numero_serie', ['class' => 'form-control']); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('estado', ['class' => 'form-control']); ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4"><?= $this->Form->input('usuario', ['class' => 'form-control']); ?></div>
                    <div class="col-lg-4"><?= $this->Form->input('password', ['class' => 'form-control']); ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12"><?= $this->Form->input('observaciones',['class' => 'form-control']); ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-check">
                            <?= $this->Form->input('en_garantia', array('class' => 'form-check-input')); ?>
                            <?= $this->Form->input('Cruce',['value'=>$cruce_id,'type'=>'hidden']); ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button id="back" class="btn btn-primary shadow"> Volver </button> 
                        <button type="submit" class="btn btn-warning shadow"> Grabar </button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>