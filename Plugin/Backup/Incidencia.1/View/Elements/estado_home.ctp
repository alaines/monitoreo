<?php 
$dataHoy = $this->requestAction('incidencia/reportes/reporte_estado/hoy'); 
$dataAnt = $this->requestAction('incidencia/reportes/reporte_estado/ant'); 
?>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendientes del día</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($dataHoy[0]['pendientes'])) ? $dataHoy[0]['pendientes']: 0; ?></div> 
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Atendidos Hoy</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($dataHoy[0]['atendidas'])) ? $dataHoy[0]['atendidas']: 0; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendientes anteriores</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($dataAnt[0]['pendientes'])) ? $dataAnt[0]['pendientes']: 0; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Atendidos anteriores</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (isset($dataAnt[0]['atendidas'])) ? $dataAnt[0]['atendidas']: 0; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>