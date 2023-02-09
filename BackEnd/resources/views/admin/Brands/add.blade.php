@extends('admin.index')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Thương Hiệu</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('brand.index')}}">Thương Hiệu</a></li>
            <li class="breadcrumb-item"> Thêm thương hiệu</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Thêm Thương Hiệu</h5>
    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="col-md-10">
        <label for="inputName5" class="form-label">Tên thương hiệu</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName5" name='name' value="{{ old('name') }}">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror

      <div class="row g-3">
      <div class="col-md-12">
        <label for="inputEmail5" class="form-label">Logo</label>
        <input accept="image/*" type='file' id="inputFile" name="inputFile" class="form-control @error('inputFile') is-invalid @enderror">
        @error('inputFile')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
        <br>
        <img type="hidden" width="90px" height="90px" id="blah" src="" alt="" />
      </div>
      </div><br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a style="float: right" href="{{route('brand.index')}}" type="button" class="btn btn-danger">Quay lại</a>
      </div>
    </form>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  jQuery(document).ready(function() {
    if( $('#blah').hide()){
      $('#blah').hide();
    }
      jQuery('#inputFile').change(function() {
          $('#blah').show();
          const file = jQuery(this)[0].files;
          if (file[0]) {
              jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
              jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
          }
      });
  });
</script>
</main>
  @endsection
