<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = Supplier::create([
            'id' => 1,
            'name' => 'Đồng Hồ Hải Triều',
            'email' => 'ht@gmail.com',
            'address' => '133 Nguyễn Huệ',
            'phone' => '0982444555',
        ]);
        $supplier = Supplier::create([
            'id' => 2,
            'name' => 'Đăng Quang Watch',
            'email' => 'dq@gmail.com',
            'address' => '28 Lê Lợi',
            'phone' => '0988222444',
        ]);
        $supplier = Supplier::create([
            'id' => 3,
            'name' => 'Boss Luxury',
            'email' => 'bl@gmail.com',
            'address' => '32 Hàm Nghi',
            'phone' => '0912333555',
        ]);
        $supplier = Supplier::create([
            'id' => 4,
            'name' => ' Duy Anh Watch',
            'email' => 'da@gmail.com',
            'address' => '01 Duy Tân',
            'phone' => '0945777999',
        ]);
        $supplier = Supplier::create([
            'id' => 5,
            'name' => 'VinaWatch',
            'email' => 'vn@gmail.com',
            'address' => '28 Hoàng Diệu',
            'phone' => '0828222555',
        ]);
    }
}
