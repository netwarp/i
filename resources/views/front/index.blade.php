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
                <a class="nav-link" data-scroll href="#showrooms">Showrooms</a>
                <a class="nav-link" data-scroll href="#team">Contact</a>
            </nav>
        </header>
    </div>
    <section id="section1">
        
    </section>

    <section id="section1-1">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="h2">Luxury showrooms located in Paris prestigious Place Vendôme.</h1>
                </div>
                <p>Impress your clients and invite them in the heart of Paris fashion district for your business meetings or fashion shows. </p>
                <p>The interiors are contemporary in style with a well proportioned open plan providing the perfect location from which to explore this exciting neighborhood and the world beyond.</p>
                <p>The high ceilings and the domotique Lutron &amp; Deltalight lighting systems will sublimate your fashion shows &amp; collections.</p>
            </div>
        </div>
    </section>

    <section id="section2">
        <div class="block-title" id="showrooms">
            <h2 class="title">Showrooms</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @foreach($showrooms as $showroom)
                        <div class="card" style="padding: 2rem;">
                            <div class="card-body">
                                <div class="card-title">
                                    <h1 class="h2">{{ $showroom->title }}.</h1>
                                </div>
                                <div>
                                    {!! nl2br(e($showroom->description)) !!}
                                    <h2 class="sub-title-1">Photos</h2>
                                    <div class="row">
                                        @forelse($showroom->photos as $photo)
                                            <div class="col-md-3 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="/file/{{ $photo->path }}" data-lightbox="image-1" data-title="">
                                                            <img class="card-img-top img-fluid" width="100%" src="/file/{{ $photo->path }}" alt="{{ $photo->path }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12 text-center">
                                                No photo yet
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="text-center">
                                        @forelse($showroom->videos as $video)
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="team">
        <div class="block-title" id="contact">
            <h2 class="title">Contact</h2>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="/images/sylvain.png" alt="Card image cap">
                        <div class="card-block">
                            <div><strong>Sylvain Chavry</strong><br> Owner</div>
                            <div>schavry@gmail.com</div>
                            <div>+33 6 99 16 24 24</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="/images/quentin.png" alt="Card image cap">
                        <div class="card-block">
                            <div><strong>Quentin Paprocki</strong><br> Family Office Manager</div>
                            <div>q.paprocki@gmail.com</div>
                            <div>+33 6 51 85 92 09</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="info">
        <div class="text-center">
            <div class="h4">16 Place Vendôme</div>
            <div class="h4">75001 Paris</div>
        </div>
    </section>

    <footer>
        <a class="nav-link" data-scroll href="#showrooms">Showrooms</a>
        <a class="nav-link" data-scroll href="#contact">Contact</a>
    </footer>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="./js/scrollsmooth.js"></script>
    <script src="./js/lightbox-plus-jquery.min.js"></script>
    <script src="./js/site.js"></script>
    </body>
</html>
