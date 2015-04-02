<!doctype html>
<html>
    <head>
        
        @include('includes.head')
        @include('includes.header')
    </head>

    <body>
        <div class="container">
            <header>
            </header>

            <div id="resources" class="row">
                @yield('content')
            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>
        </div>
    </body>
</html>