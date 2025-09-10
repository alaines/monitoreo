<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $this->webroot; ?>">
        <img class="img-responsive" width="80%" src="<?php echo $this->webroot; ?>img/LOGO_MML_2023.png" alt="mml">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item">
          <a class="nav-link" href="<?php echo $this->webroot; ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php  $menus = $this->requestAction('acceso/gruposMenus/generar/'.$this->Session->read('Auth.User')['grupo_id']);?>
    <?php $i = 1; ?>
    <?php foreach ($menus['cabeceras'] as $c): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
            <i class="fas fa-fw <?php echo $c['icono'];?>"></i>
            <span><?php echo $c['name']; ?></span>
        </a>
        <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php foreach ($menus['subcabeceras'] as $sc):?>
                    <?php if ($c['id'] == $sc['parent_id']):?>
                        <h6 class="collapse-header"><?php echo $sc['name'];?></h6>
                        <?php foreach ($menus['items'] as $idp):?>
                            <?php if ($sc['id'] == $idp['parent_id']):?>
                                <a class="collapse-item" href="<?php echo $this->webroot.$idp['url']; ?>"><?php echo $idp['name']?></a>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>
                <?php endforeach; ?>            
            </div>
        </div>
    </li>
    <?php $i++; ?>
    <?php endforeach; ?>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->