<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
      <span class="brand-text font-weight-light">{{Facades\Services\ConfigService::findByName('info_name')->keterangan}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="{{ route('admin') }}" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.config.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Konfigurasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.about.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                About
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.project.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Project
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.galery.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Galery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.slider.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>