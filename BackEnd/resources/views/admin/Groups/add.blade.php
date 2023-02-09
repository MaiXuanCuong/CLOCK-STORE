@extends('admin.index')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Danh sách chức vụ</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('groups.index')}}">Danh sách chức vụ</a></li>
            <li class="breadcrumb-item"><a href="{{route('groups.create')}}"> Thêm chức vụ</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Thêm chức vụ</h5>
    <form action="{{ route('groups.store') }}" method="post">
        @csrf
      <div class="col-md-12">
        <label for="inputName5" class="form-label">Tên chức vụ</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName5" name='name' value="{{ old('name') }}">
        @error('name')
        <div class="text text-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a style="float: right" href="{{ route('users.index') }}" type="button"
            class="btn btn-danger">Quay lại</a>
      </div>
    </form>
  </div>
</div>
</div>
</main>
  @endsection
