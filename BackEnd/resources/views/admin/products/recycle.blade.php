@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Sản Phẩm</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Sản Phẩm</a></li>
            <li class="breadcrumb-item">Thùng Rác</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <div class="row g-3">
        <div class="col-md-6">
            <h5 class="card-title">Thùng Rác</h5>
        </div>
        <div class="col-md-6">
            <form style="" action="" id="form-search"
            class="form-inline d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
            <div style="margin-top: 12px;" class="form-group">
                <div class="input-group-prepend">
                </div>
                <input class="form-control" name="search" placeholder="tìm kiếm">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>

            </div><br>
        </form>
        <div style="margin-top: 12px; float: right" class="md-3 title_cate">
            <button href="" class="btn btn-primary  waves-effect waves-light"
                data-bs-toggle="modal" data-bs-target="#searchModal">
                Tìm kiếm nâng cao
            </button>
            @include('admin.products.advanceSearch')
        </div>
        </div>
    </div>
    @if (Session::has('success'))
    <p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
@endif
@if (Session::has('error'))
    <p class="text-danger"><i class="bi bi-x-circle"></i>
        {{ Session::get('error') }}
    </p>
@endif
    <a class='btn btn-primary mb-2'  href="{{route('product.index')}}">Sản phẩm</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên</th>
          <th scope="col">Thương Hiệu</th>
          <th scope="col">Giá (VND)</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Thao Tác</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($products as $key => $product)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$product->name}}</td>
          <td>{{$product->brand->name}}</td>
          <td>{{number_format($product->price)}}</td>
          <td>
            <img style="width:120px; height:100px" src="{{ asset('storage/images/product/' . $product->image) }}" alt=""class="image_photo">
          </td>
          <td>
            <form action="{{ route('product.delete', $product->id) }}" method="post" >
                @method('DELETE')
                @csrf
                @if (Auth::user()->hasPermission('Product_restore'))
            <a onclick="return confirm('Bạn có chắc muốn khôi phục sản phẩm này không?');"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Khôi phục sản phẩm" style='color:rgb(52,136,245)' class='btn' href="{{route('product.restore',$product->id)}}">
                <i class='bi bi-arrow-clockwise h4 h4'></i></a>
                @endif
                @if (Auth::user()->hasPermission('Product_forceDelete'))
            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa sản phẩm" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');"
            class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
                @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table >
    <div style="float: right">
        {{ $products->onEachSide(5)->links() }}
    </div>
  </div>
</div>
</main>
@endsection
