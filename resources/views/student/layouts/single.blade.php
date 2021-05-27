<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
    </head>
    <body class="sb-nav-fixed">
        @include('admin.includes.nav')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('admin.includes.sidenav')
            </div>

            <div id="layoutSidenav_content">
            
        @yield('emp')

                @include('admin.includes.footer')
            </div>
        </div>
        
    </body>
</html>
