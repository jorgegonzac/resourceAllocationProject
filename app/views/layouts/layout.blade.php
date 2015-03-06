<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>

    <body>
        <div class="container">
            <header class="row">
                @include('includes.header')
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