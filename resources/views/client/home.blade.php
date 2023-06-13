
@extends("layouts.client.main")

@section("content")
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1" ></li>
            <li data-target="#carouselExample" data-slide-to="2" ></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset("carousel\Jewelry_Gray_background_Brown_haired_Hands_Glance_586068_1280x785.jpg") }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("carousel\Jewelry_White_background_Hands_Makeup_Hairstyle_577216_1280x853.jpg") }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("carousel\Jewelry_Gray_background_Face_Earrings_Hands_564025_1280x830.jpg") }}" alt="Third slide">
            </div>
        </div>
        <a href="#carouselExample" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a href="#carouselExample" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
  </div>
  <script>
      $(".carousel").carousel({
          pause : "null"
      })
  </script>

@endsection
