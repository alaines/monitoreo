<?php
    $cakeDescription = __d('cake_dev', 'PROTRANSITO');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('sb-admin-2.min','../vendor/fontawesome-free/css/all.min', '../vendor/datatables/dataTables.bootstrap4.min'));
        ?>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <?php
                echo $this->Html->css('../vendor/gijgo/css/gijgo.min');
                echo $this->Html->css(array('../vendor/jquery-ui-1.12.1/jquery-ui.min', '../vendor/jquery-ui-1.12.1/jquery-ui.theme.min', '../vendor/leaflet/leaflet', 'https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css'));
                echo $this->Html->css('../vendor/holdon/HoldOn.min');
                
                #Bootstrap core JavaScript
                echo $this->Html->script(array('../vendor/jquery/jquery.min', '../vendor/bootstrap/js/bootstrap.bundle.min'));

                #Core plugin JavaScript-->
                echo $this->Html->script('../vendor/jquery-easing/jquery.easing.min');

                #Datatables
                echo $this->Html->script(array('../vendor/datatables/jquery.dataTables.min', '../vendor/datatables/dataTables.bootstrap4.min'));
                
                #ChartJs
                echo $this->Html->script(array('../vendor/chartjs/Chart.js'));
                
                #Custom scripts for all pages
                echo $this->Html->script(array('../vendor/gijgo/js/gijgo.min', '../vendor/gijgo/js/messages/messages.es-es.min', '../vendor/jquery-ui-1.12.1/jquery-ui.min'));
                echo $this->Html->script(['../vendor/leaflet/leaflet','../vendor/leaflet-kmz-master/dist/leaflet-kmz','https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js']);
                echo $this->Html->script('../vendor/holdon/HoldOn.min');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <style type="text/css">
            .chart-legend {
                margin:0px auto;
            }
            .chart-legend ul {
                list-style: none;
                width: 100%;
                margin: 30px auto 0;
            }
            .chart-legend li {
                text-indent: 29px;
                line-height: 24px;
                position: relative;
                font-weight: 200;
                display: block;
                float: left;
                width: 16%;
                font-size: 0.8em;
            }
            .chart-legend  li:before {
                display: block;
                width: 20px;
                height: 16px;
                position: absolute;
                left: 0;
                top: 3px;
                content: "";
            }
            .lab:before { background-color: #75b2e1; }
            .sab:before { background-color: #70d7a0; }
            .dom:before { background-color: #ff7477; }
            .plab:before { background-color: #50c5e6; }
            .psab:before { background-color: #70ce8f; }
            .pdom:before { background-color: #ff7161; }
        </style>
</head>
<body id="page-top">
    
    <div id="wrapper">
        <?php echo $this->element('menu-side', array('cache' => array('config' => 'largo')));?>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php echo $this->element('menu-top', array('cache' => array('config' => 'largo')));?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo $this->Session->flash('flash', array('element' => 'failure'));?>
                    <?php echo $this->fetch('content'); ?>
                </div>
                <!-- /.container-fluid -->
                      
            </div>
            <?php echo $this->element('footer', array('cache' => array('config' => 'largo')));?>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seguro de terminar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Salir" si realmente desea terminar la sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="<?php echo $this->webroot.'acceso/users/logout' ?>">Salir</a>
          </div>
        </div>
      </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
    <?php echo $this->Html->script(array('sb-admin-2.min')); ?>
    <?php echo $this->Html->script(array('layout-default')); ?>
</body>
</html>