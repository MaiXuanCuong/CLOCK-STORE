@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-1">Khách Hàng</h1>
            </div>
            <div class="col-md-6">
                <a style="float: right" href="{{ route('export-orderdetail',$order->id) }}"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Xuất File Excel" class="bi bi-printer-fill h3"></i></a>
            </div>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem Khách Hàng" class="breadcrumb-item"><a href="{{ route('customer.index') }}">Khách Hàng</a></li>
                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Xem Đơn Hàng" class="breadcrumb-item"><a href="{{ route('order.index') }}">Đơn Đặt</a></li>
                <li class="breadcrumb-item">Chi Tiết Đơn Hàng</li>
            </ol>
        </nav>
    </div>
    <div class="card">
            <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <h5>Mã Đơn Hàng: {{ $order->id }}</h5>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3 fw-bold">Ngày Đặt: @if(isset($order->created_at)) {{ date_format($order->created_at, "H:i:s - d/m/Y") }} @endif</span>
                                    <span class="me-3 fw-bold">Ngày Duyệt:@if(isset($order->updated_at)) {{ date_format($order->updated_at, "H:i:s - d/m/Y") }}@endif</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Chi Tiết Tài Khoản" class="me-3 fw-bold">Người Mua: <a href="{{ route('customer.show',$order->customer->id) }}" style="color: rgb(8, 0, 255)">{{ $order->customer->name }}</a></span>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="fw-bold">
                                        <td>Ảnh</td>
                                        <td>Sản phẩm</td>
                                        <td>Số Lượng</td>
                                        <td class="text-end">Giá</td>
                                        <td class="text-end">Tổng Phụ</td>
                                    </tr>
                                    @php
                                        $totalPriceOrder = 0;
                                    @endphp
                                    @foreach ($orderDetails as $orderDetail)
                                    <tr>
                                        <td>
                                                <div class="flex-shrink-0">
                                                    @if(isset($orderDetail->products->image))
                                                    <img src="{{ asset('storage/images/product/'.$orderDetail->products->image) }}"
                                                        alt="" width="75" class="img-fluid">
                                                        @endif
                                                </div>
                                        <td>
                                            <h6 class="small mb-0">
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Xem Chi Tiết Sản Phẩm" href="{{ route('product.show',$orderDetail->products->id) }}" class="text-reset">{{ $orderDetail->products->name.' ('.$orderDetail->products->type_gender.')' }}</a>
                                            </h6>
                                        </td>
                                        </div>
                                        </td>
                                        <td>{{ $orderDetail->quantity }}</td>
                                        <td class="text-end">{{ number_format($orderDetail->price_at_time) }}</td>
                                        <td class="text-end">{{ number_format($orderDetail->price_at_time * $orderDetail->quantity) }}</td>
                                        @php
                                            $totalPriceOrder += $orderDetail->price_at_time * $orderDetail->quantity;
                                        @endphp
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="4">Tổng</td>
                                        <td class="text-end">{{ number_format($totalPriceOrder)}}<span class="badge bg-success rounded-pill">VNĐ</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Phương Thức Thanh Toán</h3>
                                    <p>Thanh Toán khi Nhận Hàng<br>
                                        Thanh Toán: <b>{{ number_format($totalPriceOrder) }}</b> <span class="badge bg-success rounded-pill">VNĐ</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Địa Chỉ Thanh Toán</h3>
                                    <address>
                                        <div>
                                            <strong>{{$order->address}},</strong>
                                        </div>
                                        <div>
                                            <strong>
                                                {{ $order->ward->name }}.
                                                {{ $order->district->name }},
                                                {{ $order->province->name }}
                                                </strong>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Yêu Cầu/Ghi Chú*</h3>
                            <p>{{ $order->note }}</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Thông Tin Vận Chuyển</h3>
                            <strong>Người Nhận:</strong>
                            <span>{{ $order->name_customer }}</span><br>
                                    <strong>Liên Hệ:</strong>
                            <span><a href="#" class="text-decoration-underline" target="_blank">{{ $order->phone }}</a> <i
                                    class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6">Địa Chỉ Kho</h3>
                            <address>
                                <strong>133 Lý Thường Kiệt</strong><br>
                                Thành Phố Đông Hà<br>
                                Tỉnh Quảng Trị<br>
                                <abbr title="Phone">Liên Hệ</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>
                    @if ($order->status)
                    <div class="text-center">
                        <h5>Duyệt Đơn Thành Công<i class="bi bi-check2 text-success"></i></h5>
                    </div>
                    @else
                        <div class="mb-4">
                            <form action="{{ route('order.updatesingle', $order->id) }}" method="POST" class="mb-3">
                                @csrf
                                @method('PUT')
                                <div class="text-center">
                                    @if(Auth::user()->hasPermission('Order_status'))
                                    <button class="btn btn-primary">Duyệt Đơn<i class="bi bi-check2 text-success"></i></button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <main>
@endsection
