<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        $product = Product::create([
            'id' => 1,
            'name' => 'Orient Powermatic',
            'quantity' => 5,
            'price' => 12000000,
            'type_gender' => 'Nam',
            'description' => 'Chiếc đồng hồ Orient Powermatic thuộc bộ sưu tập Orient Le Locle Powermatic 80
                                mang đến sự sang trọng và lịch lãm dành cho quý ông. Sử dụng bộ máy cơ tự động
                                có thời gian trữ cót lên đến 80 giờ.',
            'image' => 'a1.webp',
            'status' => '0',
            'category_id' => '1',
            'brand_id' => '1',
            'supplier_id' => '1',
            'user_id_ad' => '1',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 2,
            'name' => 'Casio World Time',
            'quantity' => 5,
            'price' => 11000000,
            'type_gender' => 'Nam',
            'description' => 'Đồng hồ nam Casio World Time có mặt đồng hồ vuông to với phong cách thể thao,
                                 mặt số điện tử với những tính năng hiện đại tiện dụng,
                                  kết hợp với dây đeo bằng kim loại đem lại vẻ mạnh mẽ cá tính dành cho phái nam.',
            'image' => 'b1.webp',
            'status' => '0',
            'category_id' => '3',
            'brand_id' => '2',
            'supplier_id' => '2',
            'user_id_ad' => '2',
            'user_id_edit' => '3',
        ]);
        $product = Product::create([
            'id' => 3,
            'name' => 'Citizen Romantic',
            'quantity' => 5,
            'price' => 3000000,
            'type_gender' => 'Nam',
            'description' => 'Ẩn chứa dưới vẻ ngoài giản dị của mẫu Citizen Romantic với mẫu dây da lịch lãm tông màu nâu,
                              các chi tiết vạch số tạo hình mỏng chứa đựng sự tinh tế sang trọng khi được bao phủ tông màu vàng nổi bật',
            'image' => 'c1.webp',
            'status' => '0',
            'category_id' => '2',
            'brand_id' => '3',
            'supplier_id' => '3',
            'user_id_ad' => '3',
            'user_id_edit' => '4',
        ]);
        $product = Product::create([
            'id' => 4,
            'name' => 'Seiko Classic',
            'quantity' => 5,
            'price' => 7000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu đồng hồ Seiko Classic vẻ ngoài giản dị đặc trưng đến từ thương hiệu Seiko,
                                 các chi tiết đồng hồ tạo nét thanh mảnh mang lại sự trẻ trung thời trang cho
                                 các phái đẹp với mẫu dây lưới vàng hồng.',
            'image' => 'd1.webp',
            'status' => '0',
            'category_id' => '4',
            'brand_id' => '4',
            'supplier_id' => '4',
            'user_id_ad' => '4',
            'user_id_edit' => '5',
        ]);
        $product = Product::create([
            'id' => 5,
            'name' => 'Tissot Diamon',
            'quantity' => 5,
            'price' => 7000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Tissot Diamon mặt số vuông kiểu dáng nhỏ nhắn trẻ trung cho phái đẹp,
                             điểm nhấn nổi bật cùng với thiết kế siêu mỏng với phần vỏ máy pin chỉ dày 6mm.',
            'image' => 'e1.webp',
            'status' => '0',
            'category_id' => '5',
            'brand_id' => '5',
            'supplier_id' => '5',
            'user_id_ad' => '5',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 6,
            'name' => 'Orient Heart',
            'quantity' => 5,
            'price' => 8000000,
            'type_gender' => 'Nam',
            'description' => 'Mẫu Orient RA-AR0001S10B thiết kế đặc trưng Open Heart với ô chân kính lộ ra
                                 1 phần của bô máy cơ tạo nên vẻ độc đáo trước mặt kính Sapphire.',
            'image' => '611.webp',
            'status' => '0',
            'category_id' => '1',
            'brand_id' => '1',
            'supplier_id' => '1',
            'user_id_ad' => '2',
            'user_id_edit' => '3',
        ]);
        $product = Product::create([
            'id' => 7,
            'name' => 'Orient Open',
            'quantity' => 5,
            'price' => 25000000,
            'type_gender' => 'Nam',
            'description' => 'Mẫu Orient RA-AR0004S10B điểm nhấn nổi bật với thiết kế máy cơ lộ tim vẻ ngoài
                            độc đáo trên nền mặt trắng size 40mm, vỏ máy cơ dày dặn nam tính sang trọng với kim loại mạ bạc.',
            'image' => '711.webp',
            'status' => '0',
            'category_id' => '2',
            'brand_id' => '3',
            'supplier_id' => '5',
            'user_id_ad' => '5',
            'user_id_edit' => '1',
        ]);
        $product = Product::create([
            'id' => 8,
            'name' => 'Orient SK',
            'quantity' => 5,
            'price' => 30000000,
            'type_gender' => 'Nam',
            'description' => 'Mẫu Orient SK phiên bản mạ vàng với mẫu kim chỉ nổi bật trên mặt số size 41.7mm đi kèm
                            thiết kế 2 núm vặn điều chỉnh, vỏ máy kim loại mạ bạc kiểu dáng dày dặn của bô máy cơ.',
            'image' => '811.webp',
            'status' => '0',
            'category_id' => '1',
            'brand_id' => '4',
            'supplier_id' => '3',
            'user_id_ad' => '4',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 9,
            'name' => 'Tissot T006',
            'quantity' => 5,
            'price' => 17000000,
            'type_gender' => 'Nam',
            'description' => 'Mẫu Tissot T006 với thiết kế chữ số được in theo phong cách chữ la mã mang đậm nét
                                cổ điển trên nền mặt kính Sapphire, kết hợp cùng dây đeo bằng da có vân tăng thêm vẻ lịch lãm.',
            'image' => '911.webp',
            'status' => '0',
            'category_id' => '5',
            'brand_id' => '3',
            'supplier_id' => '1',
            'user_id_ad' => '1',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 10,
            'name' => 'Citizen EM0503',
            'quantity' => 5,
            'price' => 27000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu đồng hồ Citizen EM0503 tạo điểm nhấn nổi bật với vỏ máy cùng dây đeo vàng hồng thời trang sang
                                trọng cho các phái nữ, ấn tượng với Pin đồng hồ sử dụng công nghệ hiện đại Eco-Drive (Năng Lượng Ánh Sáng).',
            'image' => '11.webp',
            'status' => '0',
            'category_id' => '2',
            'brand_id' => '5',
            'supplier_id' => '5',
            'user_id_ad' => '5',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 11,
            'name' => 'Saga 53375',
            'quantity' => 5,
            'price' => 25000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Saga 53375 phiên bản 12 viên đá Swarovski được đính trên nền mặt số kích thước 34mm với tone màu trắng
                                xà cừ tạo nên vẻ ngoài thời trang sang trọng dành cho phái đẹp.',
            'image' => '21.webp',
            'status' => '0',
            'category_id' => '3',
            'brand_id' => '5',
            'supplier_id' => '3',
            'user_id_ad' => '5',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 12,
            'name' => 'Saga 53766',
            'quantity' => 5,
            'price' => 35000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Saga 53766 phiên bản dây vỏ mạ bạc sang trọng, điểm nhấn nổi bật với thiết kế thời trang đính đá
                                pha lê Swaroski trên nền mặt số trắng họa tiết trải tia nhẹ.',
            'image' => '31.webp',
            'status' => '0',
            'category_id' => '2',
            'brand_id' => '5',
            'supplier_id' => '5',
            'user_id_ad' => '2',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 13,
            'name' => 'Tissot T094',
            'quantity' => 5,
            'price' => 15000000,
            'type_gender' => 'Nữ',
            'description' => 'Đồng hồ Tissot T094 có mặt số tròn nhỏ nhắn, kim chỉ và vạch số mỏng tinh tế
                                nổi bật trên nền số màu trắng trang nhã, dây đeo kim loại bằng chất liệu thép không gỉ mạ bạc sáng bóng, đem lại phong cách quyến rũ.',
            'image' => '41.webp',
            'status' => '0',
            'category_id' => '5',
            'brand_id' => '5',
            'supplier_id' => '2',
            'user_id_ad' => '4',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 14,
            'name' => 'Tissot Lovely',
            'quantity' => 5,
            'price' => 12000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Tissot Lovely phiên bản sang trọng 12 viên kim cương tương ứng
                                 với 12 múi giờ đính trên nền mặt số vuông với kích thước nhỏ 20mm.',
            'image' => '51.webp',
            'status' => '0',
            'category_id' => '5',
            'brand_id' => '1',
            'supplier_id' => '1',
            'user_id_ad' => '2',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 15,
            'name' => 'Tissot Square',
            'quantity' => 5,
            'price' => 10000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Tissot Square phiên bản mạ vàng sang trọng các chi tiết kim chỉ
                                cùng cọc vạch số tạo hình mỏng trên nền mặt số vuông với kích thước nhỏ 20mm.',
            'image' => '61.webp',
            'status' => '0',
            'category_id' => '3',
            'brand_id' => '3',
            'supplier_id' => '3',
            'user_id_ad' => '3',
            'user_id_edit' => '3',
        ]);
        $product = Product::create([
            'id' => 16,
            'name' => 'Orient ST',
            'quantity' => 5,
            'price' => 8000000,
            'type_gender' => 'Nam',
            'description' => 'Mẫu Orient ST phiên bản mạ vàng với phần vỏ máy cùng dây đeo, mặt số kích thước 41.7mm
                            đi kèm thiết kế 2 núm vặn điều chỉnh, vỏ máy kim loại kiểu dáng dày dặn của bô máy cơ.',
            'image' => '71.webp',
            'status' => '0',
            'category_id' => '4',
            'brand_id' => '2',
            'supplier_id' => '2',
            'user_id_ad' => '2',
            'user_id_edit' => '5',
        ]);
        $product = Product::create([
            'id' => 17,
            'name' => 'Seiko SRPG09J1',
            'quantity' => 5,
            'price' => 98000000,
            'type_gender' => 'Nữ',
            'description' => 'Mẫu Seiko SRPG09J1 phiên bản Presage phong cách thập niên 60, thiết kế đơn giản chức năng 3 kim
                                 và 1 lịch hiện thị trên nền mặt số với kích thước 40mm.',
            'image' => '81.webp',
            'status' => '0',
            'category_id' => '4',
            'brand_id' => '4',
            'supplier_id' => '4',
            'user_id_ad' => '4',
            'user_id_edit' => '4',
        ]);
        $product = Product::create([
            'id' => 18,
            'name' => 'Casio MTP',
            'quantity' => 5,
            'price' => 32000000,
            'type_gender' => 'Nữ',
            'description' => 'Đồng hồ Casio MTP có vỏ và dây đeo kim loại mạ vàng, nền số màu trắng sang trọng cùng kim
                                 chỉ được làm mỏng lịch lãm, chữ số giờ được phủ đen nổi bật.',
            'image' => '91.webp',
            'status' => '0',
            'category_id' => '3',
            'brand_id' => '3',
            'supplier_id' => '3',
            'user_id_ad' => '3',
            'user_id_edit' => '2',
        ]);
        $product = Product::create([
            'id' => 19,
            'name' => 'Casio MTP-99',
            'quantity' => 5,
            'price' => 41000000,
            'type_gender' => 'Nữ',
            'description' => 'Đồng hồ Casio MTP-99 có mặt số tròn lớn, niềng kim loại mạ bạc tinh tế bao quanh nền số màu xám sang trọng,
                                 kim chỉ và vạch số mạ vàng có phản quang nổi bật.',
            'image' => '101.webp',
            'status' => '0',
            'category_id' => '3',
            'brand_id' => '5',
            'supplier_id' => '5',
            'user_id_ad' => '5',
            'user_id_edit' => '2',
        ]);

    }
}
