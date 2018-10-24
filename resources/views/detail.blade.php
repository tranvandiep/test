@extends('layouts/master')

@section('banner')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">{{ $detail->name }}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home-page') }}">Home</a> / <span><a href="{{ route('products') }}">Sản phẩm</a></span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@stop

@section('content')
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4">
						<img src="{{ asset('theme/image/product/'.$detail->image) }}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{ $detail->name }}</p>
							<p class="single-item-price">
								@php
									$price = $detail->promotion_price;
									if($price == 0) {
										$price = $detail->unit_price;
									}
								@endphp
								<span>{{ number_format($price) }} VND</span>
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{!! $detail->description !!}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<p>Options:</p>
						<div class="single-item-options">
							<select class="wc-select" name="size">
								<option>Size</option>
								<option value="XS">XS</option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
							</select>
							<select class="wc-select" name="color">
								<option>Color</option>
								<option value="Red">Red</option>
								<option value="Green">Green</option>
								<option value="Yellow">Yellow</option>
								<option value="Black">Black</option>
								<option value="White">White</option>
							</select>
							<select class="wc-select" name="color">
								<option>Qty</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{!! $detail->description !!}</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Related Products</h4>

					<div class="row">
						@foreach ($products as $item)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('detail', $item->id) }}"><img src="{{ asset('theme/image/product/'.$item->image) }}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $item->name }}</p>
										<p class="single-item-price">
											@php
												$price = $item->promotion_price;
												if($price == 0) {
													$price = $item->unit_price;
												}
											@endphp
											<span>{{ number_format($price) }} VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('detail', $item->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('detail', $item->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			{{-- right menu --}}
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach ($best_seller as $item)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('detail', $item->id) }}"><img src="{{ asset('theme/image/product/'.$item->image) }}" alt=""></a>
									<div class="media-body">
										{{ $item->name }}
										@php
												$price = $item->promotion_price;
												if($price == 0) {
													$price = $item->unit_price;
												}
											@endphp
											<span>{{ number_format($price) }} VND</span>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				{{-- newest --}}
					<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach ($newest as $item)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ route('detail', $item->id) }}"><img src="{{ asset('theme/image/product/'.$item->image) }}" alt=""></a>
									<div class="media-body">
										{{ $item->name }}
										@php
												$price = $item->promotion_price;
												if($price == 0) {
													$price = $item->unit_price;
												}
											@endphp
											<span>{{ number_format($price) }} VND</span>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					{{-- newest end --}}
				</div>
			</div>
			{{-- right menu end --}}
		</div>
	</div>
</div>
@stop