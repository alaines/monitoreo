<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-1 font-weight-bold text-center">#</div>
    <div class="col-lg-3 font-weight-bold">Tipo</div>
    <div class="col-lg-3 font-weight-bold">Soporte</div>
    <div class="col-lg-2 font-weight-bold">Modelo</div>
    <div class="col-lg-1 font-weight-bold text-center">Cantidad</div>
</div>
<div id="semaforo-inputs">
    <?php foreach ($this->request->data['Semaforo'] as $s):?>
    <div class="row">
        <div class="col-lg-1 text-center numerado-sm">
            <?= $i + 1; ?>
            <?= $this->Form->input('Semaforo.'.$i.'.id',['type'=>'hidden']); ?>
            <?= $this->Form->input('Semaforo.'.$i.'.cruce_id',['type'=>'hidden', 'value'=>$cruce_id]); ?>
        </div>
        <div class="col-lg-3"><?= $this->Form->input('Semaforo.'.$i.'.tipo',['label'=>false,'class'=>'form-control','options'=>['PEA'=>'PEATONAL','VEH'=>'VEHICULAR','CIC'=>'CICLISTA'],'empty'=>'--SELECCIONE TIPO--']); ?></div>
        <div class="col-lg-3"><?= $this->Form->input('Semaforo.'.$i.'.posicion',['label'=>false,'class'=>'form-control','options'=>['PED'=>'PEDESTAL','ADO'=>'ADOSADO','AER'=>'AEREO'],'empty'=>'--SELECCIONE POSICION--']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Semaforo.'.$i.'.luces',['label'=>false,'class'=>'form-control','options'=>['1C-1L'=>'1C-1L','1C-2L'=>'1C-2L','1C-3L'=>'1C-3L','1C-4L'=>'1C-4L','1C-5L'=>'1C-5L'],'empty'=>'--SELECCIONE LUCES--']); ?></div>
        <div class="col-lg-1"><?= $this->Form->input('Semaforo.'.$i.'.cantidad',['label'=>false,'class'=>'form-control']); ?></div>
    </div>
    <?php $i++; ?>
    <?php endforeach; ?>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <button id="agregar-filas-s" name="agregar-filas-s" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Fila</button>
    </div>
</div>
<script type="text/javascript">
    $("#agregar-filas-s").click(function() {
        console.log('agrega semaforo');
        var nsm = $(".numerado-sm").toArray().length;
        $("<div>").load("../rowreturn/<?= $cruce_id; ?>/sm/"+nsm, function() {
            $("#semaforo-inputs").append($(this).html());
        });
        return false;
    })
</script>