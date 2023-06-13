
@foreach ($products as $product)
				<div class=" col-sm-4">
						<div class="card mb-4 box-shadow">
							<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="{{ asset("bijoutierPhoto/".$product->photo1) }}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<h3>{{ $product->name }}</h3>
										<p>{{ $product->bijoutier->nom }} {{ $product->bijoutier->prenom }}</p>
										<small class="text-muted"><p>{{ $product->created_at }}</p></small>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									</div>
								</div>
							</div>
						</div>
				</div>
			@endforeach
