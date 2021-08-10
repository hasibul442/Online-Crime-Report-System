@include('admin.include.head')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.include.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          @include('admin.include.sidebar')
          <!-- partial -->
          <div class="main-panel">
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.include.footer')
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
@include('admin.include.script')
