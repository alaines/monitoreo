<div id="content-request" class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Reportes : Comparativo Mensual de Volumen de Tráfico</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Reporte');?>
                <div class="row">
                        <div class="col-lg-4">
                            <label for="pmedidaBusca">Punto de Medida</label>
                            <input type="text" class="form-control" id="pmedidaBusca" name='data[Pmedida][txt]' placeholder="Ingrese código / Nombre de eje" <?php if(isset($this->data['Pmedida']['txt'])){ echo 'value = "'.$this->data['Pmedida']['txt'].'"'; }; ?> >
                            <input type="hidden" id="ReportePmedidaNumero" name="data[Reporte][pmedida][numero]" <?php if(isset($this->data['Reporte']['pmedida']['numero'])){ echo 'value = "'.$this->data['Reporte']['pmedida']['numero'].'"'; }; ?> >
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('month',array( 'options' => array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'),'empty' => 'Seleccione un mes','div' => false, 'class' => 'form-control', 'label' => 'Mes')); ?> &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('year',array( 'type' => 'select','multiple'=>true,'options' => array('2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'),'class' => 'form-control', 'label' => 'Años')); ?>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button id ="comprobar" type="submit" class="btn btn-danger shadow">Generar <i class="far fa-fw fa-chart-bar"></i></button>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
                <?php if(isset($results)):?>
                <hr>
                <div class="row">
                    <div class="col-lg-5 text-center">
                        <strong>Eje - Tramo : <?php echo $pmedida['Pmedida']['descripcion']; ?> </strong><br>
                        <strong>Código de Punto de Medida : <?php echo $pmedida['Pmedida']['numero']; ?></strong><br>
                        <strong>Años : <?php foreach ($this->data['Reporte']['year'] as $value){ echo $value.' ';} ; ?> &nbsp;&nbsp; / &nbsp;&nbsp; Mes : <?php echo $this->Fecha->meses($this->data['Reporte']['month']); ?></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-bordered table-hover table-striped table-sm" id="reportesMensual" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Dia</th>
                                        <?php foreach ($this->data['Reporte']['year'] as $year): ?>
                                            <th class="text-center"><?php echo $year; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $result): ?>
                                        <tr>
                                            <td class="text-center"><?php echo h($result['dia']); ?></td>
                                            <?php foreach ($this->data['Reporte']['year'] as $y): ?>
                                            <td class="text-center">
                                                <?php 
                                                if(isset($result[$y]['volumen'])){
                                                    echo h($result[$y]['volumen']);
                                                } else {
                                                    echo 'Sin registros';
                                                }
                                                ?>
                                            </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-bordered table-hover table-striped table-sm" id="reportesMensual" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-left">Tipo de Días</th>
                                        <?php foreach ($this->data['Reporte']['year'] as $year): ?>
                                            <th class="text-center"><?php echo $year; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Laborales</td>
                                        <?php foreach ($this->data['Reporte']['year'] as $yl): ?>
                                        <td class="text-center"><?php echo $promedios['Promedio']['laboral'][$yl]; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <td>No Laboral Sábado</td>
                                        <?php foreach ($this->data['Reporte']['year'] as $ys): ?>
                                        <td class="text-center"><?php echo $promedios['Promedio']['sabados'][$ys]; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <td>No Laboral Domingo</td>
                                        <?php foreach ($this->data['Reporte']['year'] as $yd): ?>
                                        <td class="text-center"><?php echo $promedios['Promedio']['domingos'][$yd]; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--<div class="col-lg-7">
                        <canvas id="densityCanvas" width="600" height="400"></canvas>
                            <div class="chart-legend text-center">
                                <ul>
                                    <li class="lab">Laborales</li>
                                    <li class="sab">Sábado</li>
                                    <li class="dom">Domingo</li>
                                </ul>
                                <ul>
                                    <li class="plab">Prom. Lab.</li>
                                    <li class="psab">Prom. Sábado</li>
                                    <li class="pdom">Prom. Domingo</li>
                                </ul>
                            </div>
                    </div> -->
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('conteos/reportes-comp-mensual')); ?> 
<script>
    var densityData = {
        label: ['Volumen Vehicular'], 
        data: <?php echo json_encode($dataset); ?>,
      backgroundColor: <?php echo json_encode($colorset); ?>,
      borderWidth: 2,
      hoverBorderWidth: 0
    };
    
    var chartOptions = {
        responsive: true,
        title: {
          display: true,
          position: 'top',
          fontStyle: 'bold',
          text: ['Eje - Tramo : <?php echo $pmedida['Pmedida']['descripcion']; ?>', 'Código de Punto de Medida : <?php echo $pmedida['Pmedida']['numero']; ?>', 'Año : <?php echo $this->data['Reporte']['year']; ?> Mes : <?php echo $this->Fecha->meses($this->data['Reporte']['month']); ?>']
        },
        legend: {
          display: false
        },
        scales: {
            yAxes: [{
                barPercentage: 0.5,
                scaleLabel: {
                    display: true,
                    labelString: 'Volumen Vehicular (Veh/Día)'
                },
                ticks: {
                    stepSize: 5000
                }
            }],
            xAxes: [{
                  scaleLabel: {
                      display: true,
                      labelString: 'Días'
                    }
                }]
        }
    };

    var barChart = new Chart(densityCanvas, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [densityData],
        },
        options: chartOptions
    });
</script>