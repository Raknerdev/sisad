<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo', 'SISAD') | SISAD</title>
        <link rel="icon" href="{{asset("favicon.png")}}" type="image/png"/>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/ionicons.min.css")}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
        @yield('styles')
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
        <div class="wrapper">
                {{--  Header  --}}
                @include("theme/$theme/header")
                {{--  Fin Header  --}}
            
                {{--  Aside  --}}
                @include("theme/$theme/aside")
                {{--  Fin Aside  --}}
            
            {{--  Contenido  --}}
            <div class="content-wrapper bg-white">
                {{--  Contenido  --}}
                <section class="content bg-white mr-5 ml-5 mt-2">
                    @yield('contenido')
                </section>
                {{--  Fin Contenido  --}}
            </div>
            {{--  Fin Contenido  --}}
        </div>
            {{--  Footer  --}}
            {{--  @include("theme/$theme/footer")  --}}
            {{--  Fin Footer  --}}
        {{-- jQuery  --}}
        <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
        <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("assets/$theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
        @yield('scripts')
        <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
        
    </body>
</html>