
<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

    <!-- BEGIN: Laravel-->
    <title>SIMDAPEN</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- END: Laravel-->

    <!-- BEGIN: Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../vuexy/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/Logobpn.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <!-- END: Meta -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="../vuexy/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../vuexy/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->

    <!-- BEGIN: Nav-->
    @include('components.nav')
    <!-- END: Nav-->

    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('components.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../vuexy/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../vuexy/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../vuexy/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../vuexy/app-assets/js/core/app-menu.js"></script>
    <script src="../vuexy/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../vuexy/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

<html>
