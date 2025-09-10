<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencias : Consultar</h6>
            </div>
            <div class="card-body">
                <form id="search">    
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('incidencia_nombre', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Incidencia', 'options' => $incidencias)); ?></div>
                    <div class="col-lg-3">
                        <label for="incidencia_tipo">Tipo</label>
                        <select class="form-control" id="incidencia_tipo" name="data[incidencia_tipo]">
                            <option value='' selected="selected">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="col-lg-3"><?php echo $this->Form->input('prioridade_id', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Prioridad')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('estado_id', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Estado')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="cruceBusca">Cruce</label>
                        <input type="text" class="form-control" id="cruceBusca" name='data[cruce_txt]' placeholder="Ingrese Cruce">
                        <input type="hidden" id="cruce_id" name='data[cruce_id]'>
                    </div>
                    <div class="col-lg-3"><?php echo $this->Form->input('equipo_id', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Equipo')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('reportadore_id', array('class' => 'form-control', 'empty' => '--Seleccione--', 'label' => 'Quien reporta?')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('filas', array('class' => 'form-control','options' => ['NULL'=>'TODOS',10=>10,20=>20,30=>30,40=>40,50=>50,100=>100] ,'label' => 'Cantidad de registros')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="fecha1">Fecha Inicio &nbsp;&nbsp;</label>
                        <input type="text" id="fecha1" name="data[fecha1]" placeholder="Ingrese Fecha Inicial" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label for="fecha2">Fecha Fin &nbsp;&nbsp;</label>
                        <input type="text" id="fecha2" name="data[fecha2]" placeholder="Ingrese Fecha Final" class="form-control">
                    </div>
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

<?php echo $this->Html->script(array('incidencias/tickets-search')); ?>