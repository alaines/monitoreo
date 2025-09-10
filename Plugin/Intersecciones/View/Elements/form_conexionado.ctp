<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-1 font-weight-bold text-center">#</div>
    <div class="col-lg-2 font-weight-bold">Elemento</div>
    <div class="col-lg-2 font-weight-bold">Tipo</div>
    <div class="col-lg-1 font-weight-bold text-center">Cantidad</div>    
    <div class="col-lg-1 font-weight-bold">Tapa</div>
    <div class="col-lg-2 font-weight-bold">Estado</div>
    <div class="col-lg-3 font-weight-bold text-center">Observacion</div>
</div>
<div id="conexionado-inputs">
    <?php foreach ($this->request->data['Conexionado'] as $c):?>
    <div class="row">
        <div class="col-lg-1 text-center numerado-cx">
            <?= $nu = $i + 1; ?>
            <?= $this->Form->input('Conexionado.'.$i.'.id',['type'=>'hidden']); ?>
            <?= $this->Form->input('Conexionado.'.$i.'.cruce_id',['type'=>'hidden', 'value'=>$cruce_id]); ?>
        </div>
        <div class="col-lg-2"><?= $this->Form->input('Conexionado.'.$i.'.elemento',['label'=>false,'class'=>'form-control','options'=>['CAJ'=>'CAJA DE PASO','POZ'=>'POZO A TIERRA','SUM'=>'SUMINISTRO'],'empty'=>'--SELECCIONE ELEMENTO--']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Conexionado.'.$i.'.tipo',['label'=>false,'class'=>'form-control','options'=>['C1'=>'C1','C2'=>'C2','C3'=>'C3','HOR'=>'HORIZONTAL','VER'=>'VERTICAL','ADO'=>'ADOSADO','MUR'=>'MURETE',],'empty'=>'--SELECCIONE TIPO--']); ?></div>
        <div class="col-lg-1"><?= $this->Form->input('Conexionado.'.$i.'.cantidad',['label'=>false,'class'=>'form-control']); ?></div>
        <div class="col-lg-1"><?= $this->Form->input('Conexionado.'.$i.'.tapa',['label'=>false,'class'=>'form-control']); ?></div>
        <div class="col-lg-2"><?= $this->Form->input('Conexionado.'.$i.'.estado',['label'=>false,'options'=>['B'=>'BUEN0','R'=>'REGULAR','M'=>'MALO'],'class'=>'form-control','empty'=>'--SELECCIONE ESTADO--']); ?></div>
        <div class="col-lg-3"><?= $this->Form->input('Conexionado.'.$i.'.observacion',['label'=>false,'class'=>'form-control']); ?></div>
    </div>
    <?php $i++; ?>
    <?php endforeach;?>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <button id="agregar-filas-c" name="agregar-filas-c" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Fila</button>
    </div>
</div>
<script type="text/javascript">
    $("#agregar-filas-c").click(function() {
        console.log('agrega conexionado');
        var ncx = $(".numerado-cx").toArray().length;
        $("<div>").load("../rowreturn/<?= $cruce_id; ?>/cx/"+ncx, function() {
            $("#conexionado-inputs").append($(this).html());
        });
        return false;
    })
</script>