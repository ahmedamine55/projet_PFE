@extends('layouts.client.main')

<div class="h_header-bar">
    <div class="icon back">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve"> <g> <g> <path d="M198.608,246.104L382.664,62.04c5.068-5.056,7.856-11.816,7.856-19.024c0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12 C361.476,2.792,354.712,0,347.504,0s-13.964,2.792-19.028,7.864L109.328,227.008c-5.084,5.08-7.868,11.868-7.848,19.084 c-0.02,7.248,2.76,14.028,7.848,19.112l218.944,218.932c5.064,5.072,11.82,7.864,19.032,7.864c7.208,0,13.964-2.792,19.032-7.864 l16.124-16.12c10.492-10.492,10.492-27.572,0-38.06L198.608,246.104z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
    </div>
    <div class="title">{{ $addbBijoux->name }}</div>
</div>

<div class="container-content">

    <div class="product-imgs">
        <div class="price">
            133,00 Dt
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            {{-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                <img class="d-block w-100 img-inline" data-slide-to="0" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo1) }}" alt="First slide">

                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                <img class="d-block w-100 img-inline" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo2) }}" alt="Second slide">

                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                <img class="d-block w-100 img-inline" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo3) }}" alt="Third slide">

                </li>
              </ol> --}}
            <div class="carousel-inner">
              <div class="carousel-item active block-img">
                <img class="d-block w-100" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo1) }}" alt="First slide">
              </div>
              <div class="carousel-item block-img">
                <img class="d-block w-100" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo2) }}" alt="Second slide">
              </div>
              <div class="carousel-item block-img">
                <img class="d-block w-100" src="{{ asset("addBijouxPhoto/".$addbBijoux->photo3) }}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>



    <div class="block">
        <div class="btns">
            <button onClick="toggleView()" id="desc-btn" class="btn-toggle active">Description</button>
            <button onClick="toggleView()" id="shop-btn" class="btn-toggle">Bejoutier</button>
        </div>
        <p id="description" style="display: block;">{{ $addbBijoux->description }}</p>
        <div id="shop" style="display:none;" class="shop-c">
            <div class="h_group">
                <label>Name</label>
                <span class="value">{{ $addbBijoux->bijoutier->nom ?? '' }} {{ $addbBijoux->bijoutier->prenom ?? '' }}</span>
            </div>
            <div class="h_group">
                <label>Email</label>
                <span class="value">{{ $addbBijoux->bijoutier->email ?? '' }}</span>
            </div>
            <div class="h_group">
                <label>PhoneNumber</label>
                <span class="value">{{ $addbBijoux->bijoutier->mobile ?? '' }}</span>
            </div>
            <div class="h_group">
                <label>Facebook</label>
                <span class="value">{{ $addbBijoux->bijoutier->facebook ?? '' }}</span>
            </div>
            <div class="h_group">
                <label>Instagram</label>
                <span class="value">{{ $addbBijoux->bijoutier->instagram ?? '' }}</span>
            </div>
        </div>
    </div>
    <div class="price price-bg-screen">
        {{ $addbBijoux->prix }} {{ $addbBijoux->currency->name }}
    </div>
</div>

<script>
    var blocks = [document.getElementById("description"), document.getElementById("shop")];
    var btns =  [document.getElementById("desc-btn"), document.getElementById("shop-btn")]
    function toggleView(){
        for(i in btns){
            if(btns[i].classList.contains("active"))
            btns[i].classList.remove("active")
            else btns[i].classList.add("active")
        }
        for(i in blocks)
            blocks[i].style.display = blocks[i].style.display == 'block' ? 'none' : 'block';
    }
    var desEle = document.getElementById("description");
    var desText = desEle.innerText;

    setTimeout(() => {
        desEle.innerHTML = desEle.innerText.substring(0, 100) + "<span onClick='showMore()'  class='show-more'> afficher plus</span>";
    }, 2000);

    function showMore(){
        desEle.innerText = desText;
    }

</script>


{{-- <div class="h_product-detail container">
    <h1 class="prduct-name">{{ $addbBijoux->name }}</h1>
    <section class="img-container">
        <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo1) }}" alt="img-1">
        <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo2) }}" alt="img-2">
        <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo3) }}" alt="img-3">
    </section>
</div> --}}

{{-- @extends("layouts.client.main")

@section("content")

@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col" id="title">
            <h1>Product details</h1>
        </div>
    </div>
    <div class="row" id="ff" class="product-container">
        <div class="col-2 pic-sm">
            <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo1) }}" alt="" onclick="clickme(this)" >
            <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo2) }}" alt="" onclick="clickme(this)">
            <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo3) }}" alt="" onclick="clickme(this)">
        </div>
        <div class="col pic">
            <img src="{{ asset("addBijouxPhoto/".$addbBijoux->photo1) }}" id="imagebox" alt="" >
        </div>
        <div class="col product-detail" id="details">
            <p class="brand">bijoutier : {{ $addbBijoux->bijoutier->nom ?? '' }} {{ $addbBijoux->bijoutier->prenom ?? '' }}</p>
            <p>{{ $addbBijoux->name }}</p>
            <p class="text">
                @foreach($addbBijoux->categories as $key => $category){{ $category->name }}@endforeach :
                @foreach($addbBijoux->types as $key => $type){{ $type->name }}@endforeach
            </p>
            <p class="desc">{{ $addbBijoux->description }}</p>
            <p class="prix">{{ $addbBijoux->prix }}:{{ $addbBijoux->currency->name }}</p>
            <p class="qua">Q : {{ $addbBijoux->quantity }}</p>
        </div>
    </div>
</div>
<script>
    function clickme(smallImg){
        var fullImg = document.getElementById("imagebox");
        fullImg.src = smallImg.src;
    }
</script>

@endsection --}}
