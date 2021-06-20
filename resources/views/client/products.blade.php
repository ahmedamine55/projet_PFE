@extends('layouts.client.main')


@section('content')
<br><br><br>
@csrf
<div class="container-fluid">
	<div class="row align-items-start">
	  <div class="col-2">
		<div class="card">
			<article class="card-group-item">
				<header class="card-header">
					<h6 class="title">Categories </h6>
				</header>
				<div class="filter-content">
					<div class="card-body">
					<form>

							@foreach ($categories as $categorie)
								<label class="form-check">
									<input class="form-check-input" type="checkbox" value="" onclick="addFilterCategorie('{{ $categorie->name }}')">
									<span class="form-check-label">
									{{ $categorie->name }}
									</span>
								</label> <!-- form-check.// -->
							@endforeach
					</form>

					</div> <!-- card-body.// -->
				</div>
			</article> <!-- card-group-item.// -->

			<article class="card-group-item">
				<header class="card-header">
					<h6 class="title">Types </h6>
				</header>
				<div class="filter-content">
					<div class="card-body">
						<form>
							@foreach ($types as $type)
								<label class="form-check">
									<input class="form-check-input" type="checkbox" value="" onclick="addFilterType('{{ $type->name }}')">
									<span class="form-check-label">
									{{ $type->name }}
									</span>
								</label> <!-- form-check.// -->
							@endforeach
						</form>
					</div> <!-- card-body.// -->
				</div>
			</article> <!-- card-group-item.// -->
		</div>
	  </div>
	  <div class="col">
		<div class="container-fluid row" id="product_container">

			@foreach ($products as $product)
                <div class=" col-sm-4">
                        <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{ asset("addBijouxPhoto/".$product->photo1) }}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3>{{ $product->name }}</h3>
                                    <p>{{ $product->bijoutier->nom }} {{ $product->bijoutier->prenom }}</p>
                                    <small class="text-muted"><p>{{ $product->created_at }}</p></small>
                                </div>
                                <div>
                                    <a href="{{ route("client.pdetails",["id"=>$product->id]) }}" class="btn btn-sm btn-outline-secondary" role="button">view</a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                @endforeach

		</div>
	  </div>
	</div>

</div>

<script>
	let product_container = document.getElementById("product_container");
	let types = [];
	let categories =[];
	function getArrayAsString(){
		let string = "";
		for(let i=0; i<types.length; i++){
			string += "type[]="+types[i]+"&";
		}
		return string;
	}
	function getArrayAsString1(){
		let string = "";
		for(let i=0; i<categories.length; i++){
			string += "categorie[]="+categories[i]+"&";
		}
		return string;
	}
	function addFilterType(type){
		if(types.indexOf(type) === -1)
			types.push(type);
		else
			types.splice(types.indexOf(type), 1);
		fetch('http://127.0.0.1:8000/blingstyle/products/filter?'+getArrayAsString()).then( res => {
			return  res.text();
		}).then( html_source => {
			product_container.innerHTML = html_source;
		});
	}

	</script>
@endsection

