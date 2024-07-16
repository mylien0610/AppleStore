<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Apple Manage- {{ $title }}
    </title>
    <link rel="icon" href="{{ asset('img/Apple_logo_black.svg') }}" />

    <!-- Link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Link file css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Header -->
        @include('admin/components/header')
        <!-- /Header -->

        <!-- Main -->
        <div class="main" id="main">
            <div class="left_panel">
                @include('admin/components/sidebar')
            </div>
            <div class="right_panel">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        <div id='toast'></div>
        <!-- /Main -->
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
