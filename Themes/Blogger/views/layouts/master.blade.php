<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

    @include('partials.head')

    <body>
    <div class="container">
        @yield('content')
    </div>
    </body>

    @include('partials.footer')

    @include('partials.preloader')

    @include('partials.scripts')

</html>
