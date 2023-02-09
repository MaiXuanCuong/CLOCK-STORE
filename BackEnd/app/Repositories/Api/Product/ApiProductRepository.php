<?php

namespace App\Repositories\Api\Product;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Repositories\Api\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiProductRepository extends BaseRepository implements ApiProductRepositoryInterface
{

    function getModel()
    {
        return Product::class;
    }
    public function getAll()
    {
        $products = $this->model->where('status', '=', '1')->where('quantity', '>', '0')->get();
        return $products;
    }
    public function search($request)
    {
        $query = $this->model::query();
        $data = $request->input('search');
        if ($data) {
            $query->where('status', '=', '1')->where('quantity', '>', '0')
            ->whereRaw("name Like '%" . $data . "%' ")
            ;
        }
        return $query->get();
    }
    public function find($id)
    {
        $product= DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*',  'categories.name as cateName',
        'brands.name as branName')->where('products.id','=',$id)->get();
        return $product;
    }
    public function trendingProduct()
    {
        $toptrending = DB::table('products')
            ->Join('order_details', 'products.id', '=', 'order_details.product_id')
            ->selectRaw('products.*, count(order_details.product_id) as totalBy')
            ->groupBy('products.id')
            ->orderBy('totalBy', 'desc')
            ->take(8)
            ->get();
        return $toptrending;
    }
    public function find_images($id)
    {
        $product= DB::table('products')
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('product_images.image as product_images')->where('product_images.product_id','=',$id)->get();
        return $product;
    }
}
