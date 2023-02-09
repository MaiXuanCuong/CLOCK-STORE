<?php
namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Specifications;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    function getModel()
    {
        return Product::class;
    }
    public function all($request)
    {
        $products = $this->model->select('*');

        if (!empty($request->search)) {
            $search = $request->search;
            $products = $products->Search($search);
        }
        if (!empty($request->category_id)) {
            $products->NameCate($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }
        if (!empty($request->supplier_id)) {
            $products->NameSupp($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }
        if (!empty($request->brand_id)) {
            $products->NameBran($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }

        $products->filterPrice(request(['startPrice', 'endPrice']));
        $products->filterDate(request(['start_date', 'end_date']));
        $products->status($request);
        $products->Type($request);

        return $products->orderBy('id', 'DESC')->paginate(5);
    }
    public function create($data)
    {
        try {
            $product = $this->model;
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->type_gender = $data['type_gender'];
            $product->quantity = $data['quantity'];
            $product->description = $data['description'];
            $product->supplier_id = $data['supplier_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->user_id_ad = Auth::user()->id;
            if ($data['inputFile']) {
                $file = $data['inputFile'];
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time(); // create file name by curent time
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $data['inputFile']->storeAs('public/images/product', $newFileName); //save file in public/images/brand with newname is newFileName
                $data['image'] = $newFileName;
                $product->image = $data['image'];
            }
            $product->save();

            //create product_images
            if ($data['file_names']) {
                foreach ($data['file_names'] as $key => $file_detail) {
                    $fileExtension = $file_detail->getClientOriginalExtension();
                    $newFileName =  $key . '.' . $fileExtension;
                    $file_detail->storeAs('public/images/product', $newFileName);
                    $product->product_images()->saveMany([
                        new ProductImage([
                            'image' => $newFileName,
                        ]),
                    ]);
                }
            }
            return $product;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $product;
    }

    public function update($id, $data)
    {
        try {
            //create product
            $product = $this->model->find($id);
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->type_gender = $data['type_gender'];
            $product->quantity = $data['quantity'];
            $product->description = $data['description'];
            $product->supplier_id = $data['supplier_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->image = $data['image'];
            $product->user_id_edit= Auth::user()->id;
            // $product->created_by = Auth::user()->id;
            if (isset($data['inputFile'])) {
                $file = $data['inputFile'];
                $image = 'public/images/product/'.$product->image;
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time(); // create file name by curent time
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $data['inputFile']->storeAs('public/images/product', $newFileName); //save file in public/images/brand with newname is newFileName
                $product->image = $newFileName;

            }
            $product->save();
            if(isset($fileExtension)){
                Storage::delete($image);
            }
            //create product_images
            if (isset($data['file_names'])) {
                $items = ProductImage::where('product_id', '=', $product->id)->get();
                foreach($items as $item){
                    $im = 'public/images/product/'.$item->image;
                    Storage::delete($im);
                }
                ProductImage::where('product_id', '=', $product->id)->delete();
                ProductImage::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();
                foreach ($data['file_names'] as $key => $file_detail) {
                    $fileExtension = $file_detail->getClientOriginalExtension();
                    $fileName = time(); // create file name by curent time
                    $newFileName =  $key .$fileName. '.' . $fileExtension;
                    $file_detail->storeAs('public/images/product', $newFileName);
                    $product->product_images()->saveMany([
                        new ProductImage([
                            'product_id' => $product->id,
                            'image' => $newFileName,
                        ]),
                    ]);
                }
            }
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $product;
    }
    public function delete($id)
    {
        $product = $this->model->find($id);
        try {
            $product->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $product;
    }
    public function getTrashed($request)
    {
        $products = $this->model->onlyTrashed($request);
        if (!empty($request->search)) {
            $search = $request->search;
            $products = $products->Search($search);
        }
        if (!empty($request->category_id)) {
            $products->NameCate($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }
        if (!empty($request->supplier_id)) {
            $products->NameSupp($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }
        if (!empty($request->brand_id)) {
            $products->NameBran($request)
            ->filterPrice(request(['startPrice', 'endPrice']))
            ->filterDate(request(['start_date', 'end_date']))
            ->status($request)->Type($request);
        }

        $products->filterPrice(request(['startPrice', 'endPrice']));
        $products->filterDate(request(['start_date', 'end_date']));
        $products->status($request);
        $products->Type($request);
        return $products->orderBy('id', 'DESC')->paginate(5);
    }
    public function restore($id)
    {
        $product = $this->model->withTrashed()->findOrFail($id);
        $product->restore();
        return $product;
    }
    public function force_destroy($id)
    {
        $product = $this->model->onlyTrashed()->findOrFail($id);
        $items = ProductImage::where('product_id', '=', $product->id)->get();
        foreach($items as $item){
            $im = 'public/images/product/'.$item->image;
            Storage::delete($im);
        }
        ///xóa ảnh chi tiết trên CSDL
        ProductImage::where('product_id', '=', $product->id)->delete();
        ProductImage::onlyTrashed()->where('product_id', '=', $product->id)->forceDelete();

        ////xóa ảnh chính ở storage
        $image = $product->image;
        Storage::delete($image);
        ////xóa ảnh chi tiết ở storage


        $product->forceDelete();
        return $product;
    }
}
