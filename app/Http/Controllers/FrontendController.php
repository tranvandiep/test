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
}
