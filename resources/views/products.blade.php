@extends('layouts/master')

@section('banner')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home-page') }}">Home</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@stop

@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					@php
						$categories = DB::table('type_products')->get();
					@endphp

					<ul class="aside-menu">
						@foreach ($categories as $item)
							<li><a href="{{ route('products') }}?id={{ $item->id }}">{{ $item->name }}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Danh Sách Sản Phẩm</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
						</div>

						<div class="row">
							{{-- item start --}}
							@php
								$count = 0;
							@endphp
							@foreach ($products as $item)
							@if ($count == 4)
								</div>
								<div class="space40">&nbsp;</div>
								<div class="row">
								@php
									$count = 0;
								@endphp
							@endif
							@php
								$count++;
								$photo_url = asset('theme/image/product/'.$item->image);
								$price = $item->promotion_price;
								if($price == 0) {
									$price = $item->unit_price;
								}
							@endphp
							<div class="col-sm-3">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('detail', $item->id) }}"><img src="{{ $photo_url }}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $item->name }}</p>
										<p class="single-item-price">
											<span>{{ number_format($price) }} VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('detail', $item->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							{{-- item end --}}
							@endforeach
							<div class="col-md-12">
								{!! $products->appends($_GET)->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop