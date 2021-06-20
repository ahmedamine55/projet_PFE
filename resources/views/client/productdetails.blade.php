@extends("layouts.client.main")

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

@endsection
