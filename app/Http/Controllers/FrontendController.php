<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller {
	public function showHome(Request $request) {
		$banner = DB::table('slide')->get();
		$newest = DB::table('products')
			->where('new', 1)
			->orderBy('updated_at', 'desc')
			->take(4)
			->get();
		$best_seller = DB::table('products')
			->leftJoin('bill_detail', 'bill_detail.id_product', '=', 'products.id')
			->select('products.*', 'bill_detail.quantity')
			->orderBy('bill_detail.quantity', 'desc')
			->take(12)
			->get();

		return view('index')->with([
				'banner'      => $banner,
				'newest'      => $newest,
				'best_seller' => $best_seller
			]);
	}

	public function showProduct(Request $request) {
		$products = DB::table('products');
		if ($request->id && $request->id > 0) {
			$products = $products->where('id_type', $request->id);
		}
		$products = $products->orderBy('updated_at', 'desc')
		                     ->paginate(16);

		return view('products')->with([
				'products' => $products
			]);
	}

	public function showDetail(Request $request, $id) {
		$detail = DB::table('products')
			->where('id', $id)
			->get();
		if ($detail != null && count($detail) > 0) {
			$detail = $detail[0];
		}

		$id_type  = $detail->id_type;
		$products = DB::table('products')
			->where('id_type', $id_type)
			->where('id', '<>', $detail->id)
			->orderBy('updated_at', 'desc')
			->take(3)
			->get();

		$best_seller = DB::table('products')
			->leftJoin('bill_detail', 'bill_detail.id_product', '=', 'products.id')
			->select('products.*', 'bill_detail.quantity')
			->orderBy('bill_detail.quantity', 'desc')
			->take(4)
			->get();

		$newest = DB::table('products')
			->where('new', 1)
			->orderBy('updated_at', 'desc')
			->take(4)
			->get();

		return view('detail')->with([
				'detail'      => $detail,
				'products'    => $products,
				'best_seller' => $best_seller,
				'newest'      => $newest
			]);
	}
}
