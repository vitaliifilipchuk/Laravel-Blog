<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>


<body>

    @include('partials.nav')

    <div class="container content-main">

        @include('partials.messages')

        @yield('content')

        @include('partials.footer')

    </div>

<!-- end of .container -->

    @include('partials.javascript')

</body>

</html>