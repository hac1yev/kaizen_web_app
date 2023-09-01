<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.Layouts.head')

</head>

<body>
    @include('front.Layouts.header')
    @yield('content')
    @include('front.Layouts.footer')

    @yield('js')
</body>

</html>