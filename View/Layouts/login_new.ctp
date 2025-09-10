<!doctype html>
  <head>
    <!-- Required meta tags -->
    <?php 
      echo $this->Html->charset(); 
      echo $this->Html->meta('icon');  
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <?php echo $this->Html->css(['../vendor/icomoon/style','owl.carousel.min', 'bootstrap.min', 'style']); ?>
    <?php 
      echo $this->fetch('meta');
      echo $this->fetch('css'); 
    ?>
    <title>SGI - GMU - DMC</title>
  </head>
  <body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('../../img/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
    <?php echo $this->Html->script(['login/jquery-3.3.1.min', 'login/popper.min', 'login/bootstrap.min', 'login/main']); ?>
  </body>
</html>