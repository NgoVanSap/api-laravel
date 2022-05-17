<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.layout.header')
    </head>
    <body>
        <div id="app">
            <div id="sidebar" class="active">
                @include('admin.layout.menu')
            </div>
            @include('admin.admin_login_register.thongKe')
             @yield('Content')
        </div>
        @include('admin.layout.bottom')
        @yield('js')
    </body>
</html>
