@extends('layouts.client.main')


@section('content')
<br><br><br>
@csrf
<div class="container-fluid row" id="product_container">

    @foreach ($articles as $article)
        <div class=" col-sm-4">
                <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{ asset("addBijouxPhoto/".$article->photo1) }}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3>{{ $article->name }}</h3>
                            <p>{{ $article->bijoutier->nom }} {{ $article->bijoutier->prenom }}</p>
                            <small class="text-muted"><p>{{ $article->created_at }}</p></small>
                        </div>
                        <div>
                            <a href="{{ route("client.pdetails",["id"=>$article->id]) }}" class="btn btn-sm btn-outline-secondary" role="button">view</a>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        @endforeach
</div>
@endsection

