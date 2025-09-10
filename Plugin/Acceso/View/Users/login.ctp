<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
        <div class="mb-4">
          <img src="../../img/LOGO_MML_2023_color.png" width="80%" style="margin-bottom: 50px; margin-top: 10px;" alt="Logo GMU" />
          <h3>Ingresar</h3>
          <p class="mb-4">Sistema de Gestión de Incidencias</p>
        </div>
        <?php echo $this->Form->create('User'); ?>
          <div class="form-group first">
            <?php echo $this->Form->input('usuario',array('type'=>'text','class'=>'form-control', 'required','div'=>false));?>
          </div>
          <div class="form-group last mb-3">
              <?php echo $this->Form->input('clave',array('type'=>'password','class'=>'form-control', 'required','label'=>'Contraseña','div'=>false));?>
          </div>
          <div class="d-flex mb-5 align-items-center">
            <label class="control control--checkbox mb-0"><span class="caption">Recordarme</span>
            <input type="checkbox" checked="checked"/>
            <div class="control__indicator"></div>
            </label>
              <span class="ml-auto"><a href="#" class="forgot-pass">Recuperar contraseña</a></span> 
          </div>
          <input type="submit" value="Ingresar" class="btn btn-block btn-primary">
        <?php echo $this->Form->end(); ?>
    </div>
</div>