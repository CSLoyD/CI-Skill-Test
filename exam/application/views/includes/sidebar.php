<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <?php

  ?>
  <div class="page-header w-100">
    <div class="float-left">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </div>
    <div class="float-right">
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 7px;">
          <div class="family-family-small-logo-hldr">
            <p>CI Exam</p>
          <div class="mg-footer-bast-unq">
            <div class="dropdown-divider custom-dropdown-divider"></div>
          </div>
          

          <div class="mg-footer-bast-unq">
            <div class="dropdown-divider"></div>
          </div>
          <a href="javscript:;" class="dropdown-item" id="btn-logout-confirmation" data-toggle="modal" data-target="#Loogut-Confirmation-Modal">
            <i class="fas fa-power-off" aria-hidden="true"></i> <span style="margin: 0px 10px;">Logout</span>
          </a>
        </div>
      </li>
    </div>
    <div class="clearfix"></div>
  </div>
</nav>

<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-center">
    <p>CI Exam</p>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
     
        <li class="nav-item">
          <a href="<?= base_url("users") ?>" class="nav-link <?= ($route == 'users') ? "active" : "" ; ?>">
            <i class="far fa-user nav-icon"></i>
            <p>Users</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>