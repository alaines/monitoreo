    <div class="row">
        <div class="col-lg-1 text-center numerado-sn">
            <?= $num + 1; ?>
            <?php $i = $num ?>
            <input type="hidden" name="data[Senale][<?= $i; ?>][cruce_id]" value="<?= $cruce_id ?>" id="Senale<?= $i; ?>CruceId">        
        </div>
        <div class="col-lg-4"><?= $this->Form->input('Senale.'.$i.'.signal_id',['label'=>false,'class'=>'form-control','options'=>$tipo_senal,'empty'=>'--SELECCIONE TIPO--']); ?></div>
        <div class="col-lg-2">
            <div class="input select">
                <select name="data[Senale][<?= $i; ?>][tipo_placa]" class="form-control" id="Senale<?= $i; ?>Luces">
                <option value="">--SELECCIONE PLACA--</option>
                <option value="57">FIBRA DE VIDRIO</option>
                <option value="56">FIERRO GALVANIZADO</option>
                <option value="58">SUSTRATO DE ALUMINIO</option>
                </select>
            </div>
        </div>
        <div class="col-lg-1 text-center"><?= $this->Form->input('Senale.'.$i.'.num_signals',['label'=>false,'class'=>'form-control','type'=>'number']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Senale.'.$i.'.estructura_forma',['label'=>false,'class'=>'form-control','options'=>['CIRCULAR'=>'CIRCULAR','CUADRADA'=>'CUADRADA'],'empty'=>'--SELECCIONE FORMA--']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Senale.'.$i.'.tipo_soporte',['label'=>false,'class'=>'form-control','options'=>['PEDESTAL'=>'PEDESTAL','PASTORAL'=>'PASTORAL','BANDERA'=>'BANDERA','SEMIPORTICO'=>'SEMIPORTICO','PORTICO'=>'PORTICO'],'empty'=>'--SELECCIONE TIPO--']); ?></div>
    </div>
	