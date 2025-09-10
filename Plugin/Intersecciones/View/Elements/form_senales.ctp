<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-1 font-weight-bold text-center">#</div>
    <div class="col-lg-4 font-weight-bold">Tipo Señal</div>
    <div class="col-lg-2 font-weight-bold">Tipo Placa</div>
    <div class="col-lg-1 font-weight-bold text-center">Cantidad</div>
    <div class="col-lg-2 font-weight-bold">Estructura</div>
    <div class="col-lg-2 font-weight-bold">Tipo Estructura</div>
</div>
<div id="senales-inputs">
    <?php foreach ($this->request->data['Senale'] as $s):?>
    <div class="row">
        <div class="col-lg-1 text-center numerado-sn">
            <?= $i + 1; ?>
            <?= $this->Form->input('Senale.'.$i.'.id',['type'=>'hidden']); ?>
            <?= $this->Form->input('Senale.'.$i.'.cruce_id',['type'=>'hidden', 'value'=>$cruce_id]); ?>
        </div>
        <div class="col-lg-4"><?= $this->Form->input('Senale.'.$i.'.signal_id',['label'=>false,'class'=>'form-control','options'=>$tipo_senal,'empty'=>'--SELECCIONE TIPO--']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Senale.'.$i.'.tipo_placa',['label'=>false,'class'=>'form-control','options'=>$tipo_placa,'empty'=>'--SELECCIONE PLACA--']); ?></div>
        <div class="col-lg-1 text-center"><?= $this->Form->input('Senale.'.$i.'.num_signals',['label'=>false,'class'=>'form-control','type'=>'number']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Senale.'.$i.'.estructura_forma',['label'=>false,'class'=>'form-control','options'=>['CIRCULAR'=>'CIRCULAR','CUADRADA'=>'CUADRADA'],'empty'=>'--SELECCIONE FORMA--']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Senale.'.$i.'.tipo_soporte',['label'=>false,'class'=>'form-control','options'=>['PEDESTAL'=>'PEDESTAL','PASTORAL'=>'PASTORAL','BANDERA'=>'BANDERA','SEMIPORTICO'=>'SEMIPORTICO','PORTICO'=>'PORTICO'],'empty'=>'--SELECCIONE TIPO--']); ?></div>
    </div>
    <?php $i++; ?>
    <?php endforeach; ?>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <button id="agregar-filas-sn" name="agregar-filas-sn" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Fila</button>
    </div>
</div>
<script type="text/javascript">
    $("#agregar-filas-sn").click(function() {
        console.log('agrega senal');
        var nsm = $(".numerado-sn").toArray().length;
        $("<div>").load("../rowreturn/<?= $cruce_id; ?>/sn/"+nsm, function() {
            $("#senales-inputs").append($(this).html());
        });
        return false;
    })
</script>