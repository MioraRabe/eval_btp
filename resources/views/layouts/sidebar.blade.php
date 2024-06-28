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
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-chart-area"></i>
          {{-- <i class="fas fa-fw fa-wrench"></i> --}}
          <span>Import csv</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
              <a class="collapse-item" href="{{ route('import.import') }}">Maison, travaux, devis</a>
              <a class="collapse-item" href="{{ route('import.importpaiement') }}">Paiement</a>
              {{-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a> --}}
          </div>
      </div>
    </li>

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