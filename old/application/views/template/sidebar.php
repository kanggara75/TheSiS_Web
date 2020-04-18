<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/'); ?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-motorcycle"></i>
    </div>
    <div class="sidebar-brand-text mx-3">TheSiS</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Query Menu -->
  <?php
  $role_id = $this->session->userdata('role_id');

  $queryMenu =  "SELECT `user_menu`.`id`, `menu` 
                  FROM `user_menu` JOIN `user_access_menu` 
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id 
                  ORDER BY `user_access_menu`.`menu_id`
                  ";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- Looping Menu -->
  <?php foreach($menu as $m) : ?>
  <div class="sidebar-heading">
    <?=$m['menu'];?>
  </div>
  
  <!-- Sub Menu Looping -->
  <?php
    $menuId = $m['id'];
    $querySubMenu = "SELECT * FROM `user_sub_menu` 
                      WHERE `menu_id` = $menuId
                      AND `is_active` = 1
    ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
  ?>
  <?php foreach ($subMenu as $sm) : ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url($sm['url']); ?>">
      <i class="<?=$sm['icon'];?>"></i>
      <span><?=$sm['title'];?></span></a>
    </li>
  <?php endforeach;?>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php endforeach;?>

 

  
  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Components</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a>
    </div>
  </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Utilities:</h6>
      <a class="collapse-item" href="utilities-color.html">Colors</a>
      <a class="collapse-item" href="utilities-border.html">Borders</a>
      <a class="collapse-item" href="utilities-animation.html">Animations</a>
      <a class="collapse-item" href="utilities-other.html">Other</a>
    </div>
  </div>
</li>
      
  <!-- Divider -->
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Main Menu
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->