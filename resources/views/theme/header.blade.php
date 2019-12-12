<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      @include('theme.nav')
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800">Контент</h1> -->
        @yield('content')
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('theme.footer')
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->
