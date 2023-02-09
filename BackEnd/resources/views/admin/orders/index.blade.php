@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-1">Khách Hàng</h1>
            </div>
            <div class="col-md-6">
                <a style="float: right" href="{{ route('export-order') }}"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Xuất File Excel" class="bi bi-printer-fill h3"></i></a>
            </div>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Xem Khách Hàng" href="{{ route('customer.index') }}">Khách Hàng</a></li>
                <li class="breadcrumb-item">Đơn Đặt</li>
            </ol>

        </nav>

    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <h5 class="card-title">Danh Sách Đơn Hàng</h5>
                </div>
                <div class="col-md-6">
                    <form data-bs-toggle="tooltip" data-bs-placement="top" title="Tìm Kiếm Thông Thường" style="" action="" id="form-search"
                    class="form-inline d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                    <div style="margin-top: 12px;" class="form-group">
                        <div class="input-group-prepend">
                        </div>
                        <input class="form-control" name="search" placeholder="tìm kiếm">
                        <button  type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div><br>
                </form>
                <div style="margin-top: 12px; float: right" class="md-3 title_cate">
                    <button href="" class="btn btn-primary  waves-effect waves-light"
                        data-bs-toggle="modal" data-bs-target="#searchModal">
                        Tìm kiếm nâng cao
                    </button>
                    @include('admin.orders.advanceSearch')
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
            <table style="text-align: center" class="table table-hover">
                @if (!$orders->count())
                    <tr>
                        <td colspan="6">Danh Sách Rỗng!</td>
                    </tr>
                @else
            </div>
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ Và Tên</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Trạng Thái Đơn Hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>@if(Auth::user()->hasPermission('Order_view'))
                                        <a  data-bs-toggle="tooltip" data-bs-placement="top" title="Chi Tiết Đơn Hàng" href="{{ route('order.show',$order->id) }}">
                                        @endif
                                            {{ $order->name_customer }}</a></td>
                                    <td>{{ $order->phone }}</td>
                                    <td>
                                    @if(Auth::user()->hasPermission('Order_status'))
                                    @if($order->status)
                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Đã Duyệt" class="bi bi-check-circle text-success"></i>
                                    @else
                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Chờ Duyệt" class="bi bi-x-circle text-danger"></i>
                                    @endif
                                    @endif

                                    </td>
                            </tr>
                        @endforeach
                @endif
                </tbody>
            </table>
                <div style="float: right">
                    {{ $orders->appends(request()->all())->links() }}
                </div>
        </div>
    </div>
</div>
    <main>
@endsection
