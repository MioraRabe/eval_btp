<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">BTP</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboards') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.devis') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Devis</span></a>
    </li>
    
    {{-- <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Profile</span></a>
    </li> --}}


    <li class="nav-item">
      <a class="nav-link" href="{{ route('travauxes.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Types travaux</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('typefinitions.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Types finition</span></a>
    </li>
    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>