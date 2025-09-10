    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <br><br>
            <?php echo $this->Session->flash('flash', array('element' => 'failure'));?>
            <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">SISTEMA</h1>
                        <h1 class="h4 text-gray-900 mb-4">GESTION DE INCIDENCIAS</h1>
                        <h1 class="h4 text-gray-900 mb-4">PROTRANSITO</h1>
                  </div>
                    <?php echo $this->Form->create('Usuario',array('class'=>'user')); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('usuario',array('type'=>'text','class'=>'form-control form-control-user', 'placeholder'=>'Nombre de Usuario','required','autofocus','label'=>false));?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('clave',array('type'=>'password','class'=>'form-control form-control-user', 'maxlength' => 20  ,'placeholder'=>'Clave de Usuario','label'=>false));?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          Ingresar
                        </button>
                    <?php echo $this->Form->end(); ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Olvidaste tu clave?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
