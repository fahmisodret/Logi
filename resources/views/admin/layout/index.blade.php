<!DOCTYPE html>
<html>
@include('admin.layout.html')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admin.layout.header')

  @include('admin.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              @if(!isset($mainTitle))
                @yield('main-title', 'Dashboard')
              @else
                {!! $mainTitle !!}
              @endif
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if(isset($firstPage) && isset($secondPage))
                <li class="breadcrumb-item"><a href="#">{!! $firstPage !!}</a></li>
                <li class="breadcrumb-item active">{!! $secondPage !!}</li>
              @elseif(isset($firstPage))
                <li class="breadcrumb-item active">{!! $firstPage !!}</li>
              @endif
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('admin.layout.flash-message')
        <!-- /.row -->
        <!-- Main row -->
        @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">DNR</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layout.script')
</body>
</html>
