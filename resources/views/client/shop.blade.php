@extends('layouts.client.main')


@section('content')
<br><br><br>
@csrf
<div class="container-fluid row">
    @foreach ($bijoutiers as $bijoutier)
                <div class=" col-sm-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{ asset("bijoutierPhoto/".$bijoutier->photo1) }}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3>{{ $bijoutier->nom }} {{ $bijoutier->prenom }}</h3>
                                    <p>{{ $bijoutier->description }}</p>
                                    <small><p>{{ $bijoutier->paye->name ?? '' }}</p></small>

                                </div>
                                <div>
                                    <a href="{{ route("client.shop_details",["id"=>$bijoutier->id]) }}" class="btn btn-sm btn-outline-secondary" role="button">view</a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                @endforeach

</div>
@endsection
