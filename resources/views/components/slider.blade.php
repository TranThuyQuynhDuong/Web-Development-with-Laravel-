<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
   
    .carousel-item .col-sm-6 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
</style>
<body>
    <div>
        <section id="slider">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach ($list_banner as $index => $row)
                                    <li data-target="#slider-carousel" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($list_banner as $row)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h1>{{$row->name}}</h1>
                                                <h2>Slider</h2>
                                                <p>{{$row->description}}</p>
                                                <button type="button" class="btn btn-default get">Chi tiết</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="{{ asset('images/banner/' . $row->image) }}" alt="Slider1" style="max-width: 400px; height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#slider-carousel" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#slider-carousel" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
