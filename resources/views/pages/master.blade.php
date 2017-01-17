
<!DOCTYPE html>
<html lang="en">

<head>

@include('partials._header')

</head>

<body>

 @include('partials._nav')

    <!-- Page Content -->
    <div class="container">

    	@include('partials._messages')
    	
        @yield('content')
      

        @include('partials._footer')

    </div>
    <!-- /.container -->

        @include('partials._scripts')

</body>

</html>
