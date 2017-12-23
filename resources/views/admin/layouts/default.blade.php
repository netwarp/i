<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/sb-admin.min.css">
        <title>Admin</title>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="background: #212121 !important;">
            <a class="navbar-brand" href="/admin"><b>Showroom Place Vendome</b> <i>Admin</i></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="/admin">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Photos">
                        <a class="nav-link" href="{{ action('Admin\PhotosController@index') }}">
                            <i class="fa fa-fw fa-photo"></i>
                            <span class="nav-link-text">Photos</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Videos">
                        <a class="nav-link" href="{{ action('Admin\VideosController@index') }}">
                            <i class="fa fa-fw fa-video-camera"></i>
                            <span class="nav-link-text">Videos</span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Showroom Place Vendôme {{ date('Y') }}</small>
                    </div>
                </div>
            </footer>
        </div>
        <script src="/js/sb-admin.min.js"></script>
    </body>
</html>