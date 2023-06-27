<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResources;
use App\Http\Resources\ProductResources;
use App\Models\product;
use App\Repositories\ProductRepository;
// use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $product = $this->productRepository->getAll();
        return $product;
    }

    public function Detail($id){
        $product = $this->productRepository->getDetailProduct($id);

        return $product;
    }

    public function show($id){
        $product = $this->productRepository->getShowProduct($id);
        return $product;
    }

    public function store(Request $request){
        $product = $this->productRepository->store($request);
        return $product;
    }

    public function update(Request $request, $id){
        $product=$this->productRepository->update($request,$id);
        return $product;
    }

    public function destroy($id){
        $product=$this->productRepository->destroy($id);

        return $product;

    }

}

