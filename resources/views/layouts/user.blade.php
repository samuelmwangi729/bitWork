@include('layouts.head')
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
@include('layouts.right')
@include('layouts.sidebar')
    <!--the main content goes here-->
    @yield('content')
    <!-- Jquery Core Js --> 
@include('layouts.scripts')
</body>
</html>
