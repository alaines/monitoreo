<br>
    <?php if(!$ok){ ?>
        <h6> &nbsp; <span class="alert alert-danger" role="alert"><i class="fa fa-thumbs-down fa-fw"></i> <?php echo $respuesta;?></span></h6>	
    <?php } else {?>
        <h6> &nbsp; <span class="alert alert-success" role="alert"><i class="fa fa-thumbs-up fa-fw"></i> <?php echo $respuesta;?></span></h6>
    <?php }; ?>