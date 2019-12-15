<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-toolbox"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Кабінет<sup>2.0</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{url('/home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Дашборд</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Управління клієнтами
    </div>

<!-- Nav Item -  -->
<li class="nav-item {{ (request()->is('admin/companies*')) ? 'active' : '' }}">

        <a class="nav-link" href="{{url('admin/companies')}}">
            <i class="far fa-building"></i>
          <span>Компанії</span></a>
      </li>
      <!-- Nav Item -  -->
    <li class="nav-item {{ (request()->is('admin/users*')) ? 'active' : '' }}">

            <a class="nav-link" href="{{url('admin/users')}}">
                <i class="fas fa-user-tie"></i>
              <span>Користувачі</span></a>
          </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Документи
    </div>


    <!-- Nav Item -  -->
    <li class="nav-item {{ (request()->is('admin/invoices*')) ? 'active' : '' }}">

      <a class="nav-link" href="{{url('admin/invoices')}}">
        <i class="fas fa-file-invoice"></i>
        <span>Рахунки</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
