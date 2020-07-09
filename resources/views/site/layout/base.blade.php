<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Management</title>

    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/css/site/v1_app.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('/js/site/v1_app.js')}}"></script>
</head>

<body>

    @yield('modal')

    <nav class="navbar navbar-expand-lg navbar-light bg-warning text-white">
        <a class="navbar-brand" href="/site">Gymn Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="/site">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/contact">Contact Gym</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/logout">logout <i class="material-icons mr-3">logout</i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
      @yield('content')
    </div>
    { <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        {{-- <script src="{{asset('/dashboard/js/v1_app.js')}}"></script> --}}
</body>

</html>
