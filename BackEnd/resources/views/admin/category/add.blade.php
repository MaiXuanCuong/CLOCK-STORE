@extends('admin.index')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Danh Mục</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Danh mục</a></li>
            <li class="breadcrumb-item"> Thêm danh mục</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Thêm Danh Mục</h5>
    <!-- Multi Columns Form -->
    <form  action="{{ route('category.store') }}" method="post">
        @csrf
      <div class="col-md-10">
        <label for="inputName5" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName5" name='name' value="{{ old('name') }}">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror<br>
      <div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a style="float: right" href="{{route('category.index')}}" type="button" class="btn btn-danger">Quay lại</a>
      </div>
    </form><!-- End Multi Columns Form -->
  </div>
</div>
</div>
</main>
  @endsection
