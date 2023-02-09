<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class ProductExport implements FromCollection,WithHeadings
{
    public function collection()
    {/////////join
        return DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('suppliers','products.supplier_id','=','suppliers.id')
        ->select('products.name', 'products.price','products.quantity','products.type_gender',
        'products.created_at', 'products.updated_at','categories.name as cateName',
        'brands.name as brandName', 'suppliers.name as suppName'
        )->get();
    }
    public function headings() :array
    {
        ////////các cột của bảng excel
    	return ["Tên Sản Phẩm", "Giá(VND)", "Số Lượng", "Loại","Ngày Nhập","Ngày Sửa","Danh Mục","Thương Hiệu", "Nhà Cung Cấp"];
    }

}
