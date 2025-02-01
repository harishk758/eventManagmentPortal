<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Singhtek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="shortcut icon" href="./assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./assets/css/table.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>

<body class="body_wrapper">
    <!-- HEADER -->
    @include('backend.layouts.header')
    <!-- SIDEBAR -->
    @include('backend.layouts.sidebar')
    <!-- MAIN SCREEN -->
    @yield('content')
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/custom.js"></script>
    {{-- <script src="./assets/js/custom.js"></script> --}}
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    

</body>

</html>
