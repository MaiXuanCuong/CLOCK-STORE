@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Thương Hiệu</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Thương Hiệu</a></li>
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
    <a class='btn btn-primary mb-2'  href="{{route('brand.index')}}">Thương hiệu</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên</th>
          <th style="text-align: center" scope="col">Logo</th>
          <th style="text-align: center" scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($brands as $key => $brand)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$brand->name}}</td>
          <td style="text-align: center"><img style="width:250px; height:100px" src="{{ asset('storage/images/brand/' . $brand->image) }}" alt=""class="image_photo"></td>
          <td style="text-align: center">
            <form action="{{ route('brand.delete', $brand->id) }}" method="post">
                @method('DELETE')
                @csrf
                <a onclick="return confirm('Bạn có chắc muốn khôi phục thương hiệu này không?');"
                style='color:rgb(52,136,245)' class='btn'
                href="{{ route('brand.restore', $brand->id) }}"><i
                class='bi bi-arrow-clockwise h4'></i></a>
            <button onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này không?');"
            class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div style="float: right">
        {{ $brands->onEachSide(5)->links() }}
    </div>
  </div>
</div>
</main>
@endsection
