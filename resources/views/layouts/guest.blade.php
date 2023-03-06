<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('') }}"
    data-template="vertical-menu-template"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}img/favicon/favicon.ico" />

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

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('') }}vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('') }}vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('') }}vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{ asset('') }}vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('') }}vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('') }}js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover authentication-bg">
    {{ $slot }}
</div>

<!-- / Content -->

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
<script src="{{ asset('') }}vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="{{ asset('') }}vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="{{ asset('') }}vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="{{ asset('') }}js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('') }}js/pages-auth.js"></script>
</body>
</html>
