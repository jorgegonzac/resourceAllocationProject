<!DOCTYPE HTML>
<html>
    <head>
        @include('includes.headBooking')
        @include('includes.header1')
    </head>
    
    <body onload="display_ct()">
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