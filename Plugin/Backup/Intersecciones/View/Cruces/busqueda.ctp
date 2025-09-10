<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Intersecciones : Consultar</h6>
            </div>
            <div class="card-body">
                <form id="search">    
                <div class="row">
                    <div class="col-lg-4">
                        <label for="cruceBusca">Cruce</label>
                        <input type="text" class="form-control" id="cruceBusca" name='data[cruce_txt]' placeholder="Ingrese Cruce">
                        <input type="hidden" id="cruce_id" name='data[cruce_id]'>
                    </div>
                    <div class="col-lg-4"><?php echo $this->Form->input('ubigeo_id',['label'=>'Distrito','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('proyecto_id',['label'=>'Proyecto','empty'=>' --Seleccione-- ','class' => 'form-control','required']); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('tipo_comunicacion',['label'=>'Tipo de Comunicación','class' => 'form-control','options' => $tipo_comunicacion,'empty' => '--Seleccione--']) ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('administradore_id',['label'=>'Administrado por','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('filas', array('class' => 'form-control','options' => [10=>10,20=>20,30=>30,40=>40,50=>50,100=>100, 'NULL'=>'TODOS'] ,'label' => 'Cantidad de registros')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <button type="button" id="buscar" class="btn btn-danger shadow">Buscar</button> &nbsp;&nbsp;
                        <button type="button" id="limpiar" class="btn btn-primary shadow">Limpiar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4>Resultados</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="tabla-ajax" class="table-responsive"></div>
                    </div>
                </div> 
            </div>

        </div>
    </div>
</div>

<?php echo $this->Html->script(array('intersecciones/cruces-search')); ?>