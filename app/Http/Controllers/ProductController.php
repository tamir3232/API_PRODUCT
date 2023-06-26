<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResources;
use App\Http\Resources\ProductResources;
use App\Models\product;
// use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {

        $Products = product::all();
        return ProductResources::collection($Products->loadMissing('produsen:id,name'));
    }

    public function Detail($id){
        $Product = product::with('produsen:id,name')->findorfail($id);
        return new ProductDetailResources($Product);
    }

    public function show($id){
        $Product = product::findorfail($id);
        return new ProductDetailResources($Product);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
        ]);
        $request['Author_id']=Auth::user()->id;
        $post=product::create($request->all());
        return new ProductDetailResources($post->loadMissing('produsen:id,name'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $product=product::findorfail($id);
        $product->update($request->all());
        // return $product;
        return new ProductDetailResources($product->loadMissing('produsen:id,name'));
    }

    public function destroy($id){
        $product=product::findorfail($id);
        $product->delete();
    }

}

