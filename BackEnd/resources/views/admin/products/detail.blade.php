@extends('admin.index')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Sản Phẩm</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Sản Phẩm</a></li>
            <li class="breadcrumb-item"> Chi Tiết Sản Phẩm</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Chi Tiết Sản Phẩm</h5>
<div class="row g-0">
    <div class="col-md-6">
        <div class="d-flex flex-column justify-content-center">
            <div style=" margin-top: 24px;" class="main_image"> <img src="{{ asset('storage/images/product/' .$product->image) }}" id="main_product_image" height="300" width="412">
            </div><br>
            <div class="thumbnail_images">
                <ul style="padding-left: 0rem;" id="thumbnail">
                    <img onclick="changeImage(this)" src="{{ asset('storage/images/product/' .$product->image) }}" width="100">
                    @foreach ($product->product_images as $file_name)
                        <img onclick="changeImage(this)" src="{{ asset('storage/images/product/' .$file_name->image) }}"
                            width="100px">
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="p-3 right-side">
            <div class="product-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Sản Phẩm</button>
                  </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Nhân Viên Thêm</button>
                  </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Nhân Viên Sửa</button>
                  </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td>Trạng thái</td>
                                <td>{{ $product->status == 0 ? 'Ẩn' : 'Hiện' }}</td>
                            </tr>
                            <tr>
                                <td>Nhà cung cấp</td>
                                <td>{{ $product->supplier->name }}</td>
                            </tr>
                            <tr>
                                <td>Danh mục</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Thương hiệu</td>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <td>Loại</td>
                                <td>{{ $product->type_gender }}</td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td>{{ $product->quantity}} Chiếc</td>
                            </tr>
                            <tr>
                                <td>Giá bán</td>
                                <td>{{ number_format($product->price)}} Đồng</td>
                            </tr>
                        </tbody>
                    </table>
                    <label>Mô tả: {!! $product->description !!}</label>
                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Tên Nhân Viên</td>
                                <td>{{ $product->user->name}}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>{{ $product->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $product->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại</td>
                                <td>{{ $product->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Ngày Thêm</td>
                                <td>{{ $product->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <table class="table table-striped">
                        @foreach ($users as $user)
                        @if ($user->id == $product->user_id_edit)
                        <tbody>
                            <tr>
                                <td>Tên Nhân Viên</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Ngày Sửa</td>
                                <td>{{ $product->updated_at}}</td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</main>
@endsection
