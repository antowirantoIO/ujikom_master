<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('') }}"
    data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('') }}vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('') }}vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('') }}css/demo.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Vendors CSS -->
    {{ $vendor_css ?? '' }}

    <!-- Page CSS -->
    {{ $page_css ?? '' }}

    <!-- Helpers -->
    <script src="{{ asset('') }}vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('') }}vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('') }}js/config.js"></script>

    </head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <x-nav-menu />
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <x-navbar />

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            {{ $slot }}
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                >
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                  </div>
                  <div>
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>

    {{ $modal ?? '' }}

        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('') }}vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('') }}vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('') }}vendor/js/bootstrap.js"></script>
    <script src="{{ asset('') }}vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('') }}vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('') }}vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('') }}vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('') }}vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('') }}vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('') }}vendor/libs/sweetalert2/sweetalert2.js"></script>
    {{ $vendor_js ?? '' }}

    <!-- Main JS -->
    <script src="{{ asset('') }}js/main.js"></script>

    <!-- Page JS -->
    {{ $page_js ?? '' }}
    </body>
</html>
