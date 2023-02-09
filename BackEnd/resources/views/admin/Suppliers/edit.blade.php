@extends('admin.index')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Nhà Cung Cấp</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('supplier.index')}}">Nhà Cung Cấp</a></li>
            <li class="breadcrumb-item"> Sửa nhà cung cấp</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Sửa Nhà Cung Cấp</h5>
    <form action="{{ route('supplier.update', $item->id) }}" method="post">
        @method('PUT')
        @csrf
      <div class="col-md-10">
        <label for="inputName5" class="form-label">Tên nhà cung cấp</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
        id="inputName5" name='name' value="{{ old('name') ?? $item->name }}">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror

      <div class="row g-3">
      <div class="col-md-12">
        <label for="inputEmail5" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
        name='email' id="inputName5" value="{{ old('email') ?? $item->email }}">
        @error('email')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">
        <label for="inputPassword5" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror"
         name='address' id="inputName5" value="{{ old('address') ?? $item->address }}">
        @error('address')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">
        <label for="inputPassword5" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror"
         name='phone' id="inputName5" value="{{ old('phone') ?? $item->phone }}">
        @error('phone')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
      </div>
      </div><br>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a style="float: right" href="{{route('supplier.index')}}" type="button" class="btn btn-danger">Quay lại</a>
      </div>
    </form>
  </div>
</div>
</div>
</main>
  @endsection
