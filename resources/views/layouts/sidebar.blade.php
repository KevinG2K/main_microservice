<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Franquicia Inmobiliaria Century 21</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('sidebar/sidebar.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="{{ asset('sidebar/img/logo.png') }}" alt="Logo de la página" class="logo">
                </div>
            </div>

            <hr class="linea-division">
            <ul class="list-unstyled margin-icon-sidebar">
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="/home"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="{{ Request::is('asesores') ? 'active' : '' }}">
                    <a href="/asesores"><i class="fas fa-user-tie"></i> Asesores</a>
                </li>
                <li class="{{ Request::is('inmuebles') ? 'active' : '' }}">
                    <a href="/inmuebles"><i class="fas fa-building"></i> Inmuebles</a>
                </li>
                <li class="{{ Request::is('transacciones') ? 'active' : '' }}">
                    <a href="/transacciones"><i class="fas fa-handshake"></i> Transacciones</a>
                </li>
                <li class="{{ Request::is('ia') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-folder"></i> IA</a>
                </li>
                <li class="{{ Request::is('reportes') ? 'active' : '' }}">
                    <a href="{{ route('bussiness') }}"><i class="fas fa-file"></i> Bussiness Inteligence</a>
                </li>
                <li class="{{ Request::is('documentos') ? 'active' : '' }}">
                    <a href="/documentos"><i class="fas fa-folder"></i> Documentos</a>
                </li>
            </ul>
            <hr class="linea-division">
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="https://thumbs.dreamstime.com/b/imagen-del-pasaporte-de-un-hombre-de-negocios-hisp%C3%A1nico-con-el-traje-54531886.jpg"
                                        class="img-fluid rounded-circle mr-2 avatar">
                                    Kevin Gustavo
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Mi Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-outline-dark btn-bell" data-toggle="popover"
                        data-content="Mensaje de notificación">
                        <a href="#"><i class="fas fa-bell"></i> <span
                                class="badge badge-pill badge-light">1</span></a>
                    </button>
                </div>
            </nav>

            @yield('contenido')

        </div>
    </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover({
                placement: 'bottom',
                trigger: 'manual',
                html: true
            }).on('mouseenter', function() {
                var _this = this;
                $(this).popover('show');
                $('.popover').on('mouseleave', function() {
                    $(_this).popover('hide');
                });
            }).on('mouseleave', function() {
                var _this = this;
                setTimeout(function() {
                    if (!$('.popover:hover').length) {
                        $(_this).popover('hide');
                    }
                }, 100);
            });
        });
    </script>
</body>

</html>
