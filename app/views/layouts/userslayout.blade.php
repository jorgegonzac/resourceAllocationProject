<!DOCTYPE HTML>
<html>
    <head>
        @include('includes.head')
        @include('includes.header')
    </head>

    <body>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        
        <footer class="row">
            @include('includes.footer')
        </footer>
    </body>
</html>