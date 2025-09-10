<?php echo $this->Form->create('Tickets', array('url' => 'resultXls')) ?>
<input type="hidden" name="data" value='<?php echo serialize($tickets) ?>'></input>
<button type="submit" class="btn btn-success shadow">Generar <i class="far fa-file-excel"></i></button>
<?php echo $this->Form->end(); ?><br><br>
<?php $i = 1; ?>
<?php //debug($tickets); ?>
<table class="table table-hover table-bordered" id="reportesIndex">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th>Ticket</th>
            <th>Fecha y Hora</th>
            <th>Tipo</th>
            <th>Incidencia</th>
            <th>Cruce</th>
            <th>Asignado a</th>
            <th>Estado</th>
            <th class="text-center">Detalle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td><?php echo $ticket['Reporte']['Ticket']; ?></td>
            <td><?php echo $ticket['Reporte']['Fecha_registro']; ?></td>
            <td><?php echo $ticket['Reporte']['Tipo']; ?></td>
            <td><?php echo $ticket['Reporte']['Incidencia']; ?></td>
            <td><?php echo $ticket['Reporte']['Cruce']; ?></td>
            <td><?php echo $ticket['Reporte']['Equipo']; ?></td>
            <td><?php echo $ticket['Reporte']['Estado']; ?></td>
            <td class="text-center">
                <a href="<?php echo $this->webroot;?>incidencia/tickets/detalle/<?php echo $ticket['Reporte']['Ticket'];?>" data-original-title="Editar" data-toggle="tooltip" data-placement="bottom" title="" class="edit"><i class="fa fa-edit"></i></a> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    //var tickets = <?php //echo json_encode($tickets); ?>;
    $('#reportesIndex').DataTable({
            language: {
                url: base_url+'/vendor/datatables/es_ES.json'
            }
        });
</script>