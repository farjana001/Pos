<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | POS</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="main-banner">
        <div class="container">
            <div class="row justify-content-start text-white pt-5">
                <div class="">
                    <h1 class="">POS Dashboard</h1>
                    <p>Please Register/Login to continue</p>
                    <div class="">
                        <a href="{{ route('registration') }}" class="btn btn-info">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
