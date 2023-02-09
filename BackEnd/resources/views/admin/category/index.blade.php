@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Danh Mục</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Danh Mục</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <div class="row g-3">
        <div class="col-md-6">
            <h5 class="card-title">Danh Sách Danh Mục</h5>
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
@if(Auth::user()->hasPermission('Category_create'))
    <a class='btn btn-primary mb-2'  href="{{route('category.create')}}">Thêm danh mục</a>
@endif
    <a class='btn btn-danger mb-2 float-right'  href="{{route('category.getTrashed')}}">Thùng rác</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên danh mục</th>
          <th  scope="col">Số lượng sản phẩm</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($categories))
          @foreach ($categories as $key => $category)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$category->name}}</td>
          <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$category->products->count()}}</td>
          <td>
            <form action="{{ route('category.destroy', $category->id) }}" method="post" >
                @method('DELETE')
                @csrf
                @if(Auth::user()->hasPermission('Category_update'))
            <a style='color:rgb(52,136,245)' class='btn' href="{{route('category.edit',$category->id)}}">
                <i class='bi bi-pencil-square h4'></i></a>
                @endif
                @if(Auth::user()->hasPermission('Category_delete'))
            <button onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');" class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
                @endif
            </form>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    <div style="float: right">
        {{ $categories->appends(request()->all())->links() }}
    </div>
  </div>
</div>
</main>
@endsection
