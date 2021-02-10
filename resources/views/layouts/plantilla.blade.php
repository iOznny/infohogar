<!DOCTYPE html>
<html lang="es">
    <head>
        @include('layouts.head')
        @yield('css')
    </head>

    <body id="page-top">
        <div id="wrapper">
            @include('layouts.asidebar')

            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    @include('layouts.navbar')

                    @yield('container')
                </div>
            </div>
        </div>

        @include('layouts.footer')
        @yield('js')
    </body>
</html>