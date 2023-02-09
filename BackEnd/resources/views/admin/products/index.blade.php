@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-1">Sản Phẩm</h1>
            </div>
            <div class="col-md-6">
                <a style="float: right" href="{{route('products.exportExcel')}}"><i class="bi bi-printer-fill h3"></i></a>
            </div>

        </div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Sản Phẩm</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <div class="row g-3">
        <div class="col-md-6">
            <h5 class="card-title">Danh Sách Sản Phẩm</h5>
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
@if (Auth::user()->hasPermission('Product_create'))
    <a class='btn btn-primary mb-2'  href="{{route('product.create')}}">Thêm sản phẩm</a>
    @endif
    <a class='btn btn-danger mb-2 float-right'  href="{{route('product.getTrashed')}}">Thùng rác</a>
    <table class="table table-hover" style="text-align: center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên</th>
          <th scope="col">Thương Hiệu</th>
          <th scope="col">Giá (VND)</th>
          <th scope="col">Hình Ảnh</th>
          <th scope="col">Trạng Thái</th>
          <th scope="col">Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        @if (!$products->count())
        <tr>
            <td colspan="7">Chưa có sản phẩm.....</td>
        </tr>
        @else
          @foreach ($products as $key => $product)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>@if (Auth::user()->hasPermission('Product_view'))
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Xem chi tiết sản phẩm" href="{{route('product.show',$product->id)}}">
                @endif
                {{$product->name}}</a></td>
          <td>{{$product->brand->name}}</td>
          <td>{{number_format($product->price)}}</td>
          <td>
            <img style="width:120px; height:100px" src="{{ asset('storage/images/product/' . $product->image) }}" alt=""class="image_photo">
          </td>
          <td >
            @if (Auth::user()->hasPermission('Product_status'))
            <a data-href="{{ route('products.updateStatus', $product->id) }}" class="updateStatus"
                data-status="{{ $product->status }}"  id="{{ $product->id }}">
                <i class="h4  iconStatus{{ $product->id }}
                    {{ $product->status ? 'bi bi-eye-fill text-success' : 'bi bi-eye-slash-fill text-danger' }} "></i>
            </a>
            @endif
          </td>
          <td>
            <form action="{{ route('product.destroy', $product->id) }}" method="post" >
                @method('DELETE')
                @csrf
                @if (Auth::user()->hasPermission('Product_update'))
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa sản phẩm" style='color:rgb(52,136,245)' class='btn' href="{{route('product.edit',$product->id)}}">
                <i class='bi bi-pencil-square h4'></i></a>
                @endif
                @if (Auth::user()->hasPermission('Product_delete'))
            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Đưa vào thùng rác" onclick="return confirm('Bạn có chắc muốn đưa sản phẩm này vào thùng rác không?');"
            class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
                 @endif
            </form>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    <div style="float: right">
        {{ $products->appends(request()->all())->links() }}
    </div>
  </div>
</div>
@include('admin.products.advanceSearch')

</main>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     $(document).on('click', '.updateStatus', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let status = $(this).data('status');
            let href = $(this).data('href') + `/` + status;
            let csrf = '{{ csrf_token() }}';
            console.log(href);
            Swal.fire({
                title: 'Bạn có chắc?',
                text: "Bạn muốn thay đổi trạng thái của sản phẩm!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Cập nhật',
                cancelButtonText: 'Không',
            }).then((result) => {
                if (status && result.isConfirmed) {
                    $(this).data('status', 0);
                    $(`.iconStatus${id}`).removeClass('bi bi-eye-fill text-success');
                    $(`.iconStatus${id}`).addClass('bi bi-eye-slash-fill text-danger');
                } else if(!status && result.isConfirmed) {
                    $(this).data('status', 1);
                    $(`.iconStatus${id}`).removeClass('bi bi-eye-slash-fill text-danger');
                    $(`.iconStatus${id}`).addClass('bi bi-eye-fill text-success');
                }
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'post',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            console.log(id);
                            Swal.fire({
                                title: 'Cập nhật thành công!',
                                text: "Trạng thái của sản phẩm đã được cập nhật!",
                                icon: 'success',
                                confirmButtonText: 'Tốt lắm!',
                            }
                            )
                        }
                    });
                }
            })
        });
</script>
@endsection
