<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResources;
use App\Http\Resources\ProductResources;
use App\Models\product;
// use App\Models\user;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $Products = product::all();
        return ProductResources::collection($Products);

    }

    public function Detail($id){
        $Product = product::with('produsen:id,name')->findorfail($id);
        return new ProductDetailResources($Product);
    }

    public function show($id){
        $Product = product::findorfail($id);
        return new ProductDetailResources($Product);
    }
}

