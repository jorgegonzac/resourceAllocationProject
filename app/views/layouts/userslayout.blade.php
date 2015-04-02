<!DOCTYPE HTML>
<html lang="en" class="demo-3 no-js">
    <head>
        @include('includes.head')
        @include('includes.header1')

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