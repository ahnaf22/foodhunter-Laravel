<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Foodhunter</title>
        @include('frontend.partials.styles')
    </head>
    <body>
         <!-- navbar -->
         @include('frontend.partials.navbar')

        <div>
           @yield('content')
        </div>
          
        <!-- footer -->
        @include('frontend.partials.footer')

        <!-- scripts -->
        @include('frontend.partials.scripts')
        @stack('custom-scripts')
    </body>
</html>
