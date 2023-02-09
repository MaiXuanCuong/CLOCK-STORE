<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Services\Api\Product\ApiProductServiceInterface;
use Illuminate\Http\Request;
class ApiProductController extends Controller
{
    private $FeproductService;
    public function __construct(ApiProductServiceInterface $FeproductService)
    {
        $this->FeproductService = $FeproductService;
    }
    public function product_list()
    {
        $products = $this->FeproductService->getAll();

        return response()->json($products, 200);
    }
    public function search(Request $request)
    {
            $products = $this->FeproductService->search($request);
            return response()->json($products, 200);
    }
    public function product_detail($id)
    {
        $product = $this->FeproductService->find($id);
        return response()->json($product, 200);
    }
    public function image_detail($id)
    {
        $product = $this->FeproductService->find_images($id);
        return response()->json($product, 200);
    }
    public function category_list()
    {
        $categories = Category::with('products')->take(10)->get();
        return response()->json($categories, 200);
    }
    public function brand_list()
    {
        $brands = Brand::with('products')->take(10)->get();
        return response()->json($brands, 200);
    }
    public function trendingProduct()
    {
        $products = $this->FeproductService->trendingProduct();
        return response()->json($products, 200);
    }

}
