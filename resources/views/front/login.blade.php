<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Showroom Place Vendome</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/lightbox.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
    <div class="container">
        <header>
            <div id="logo">
                <a href="/"><img src="./images/logo.PNG" alt="logo"></a>
            </div>
            <nav class="nav">
                <a class="nav-link" data-scroll href="">The Place</a>
                <a class="nav-link" data-scroll href="#photos">Photos</a>
                <a class="nav-link" data-scroll href="#videos">Videos</a>
                <a class="nav-link" data-scroll href="#team">Team</a>
                <a class="nav-link" data-scroll href="#contact">Contact</a>
            </nav>
        </header>
    </div>

    <section style="min-height: 76vh; margin-top: 8rem;">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 2rem;">
                        <div class="card-body">
                            <h1>Login</h1>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('postLogin') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">GO</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <a class="nav-link" href="#photos">The Place</a>
        <a class="nav-link" href="#photos">Photos</a>
        <a class="nav-link" href="#videos">Vidéos</a>
        <a class="nav-link" href="#team">Équipe</a>
        <a class="nav-link" href="#contact">Contact</a>
    </footer>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="./js/scrollsmooth.js"></script>
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="./js/site.js"></script>
    </body>
</html>
