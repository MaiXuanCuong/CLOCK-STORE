@extends('admin.index')
@section('content')
    <main  id="main" class="main">
 <style>
    .col-md-4,.col-md-5{
        margin-left: 60px;
        font-weight: 900;
    }
        .hover:hover{
            color: #000;
            background:#c7ffed;
        }
    </style>
    <div class="pagetitle">
        <h1>Khách Hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Danh Sách Khách Hàng" href="{{ route('customer.index') }}">Khách Hàng</a></li>
                <li class="breadcrumb-item"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Danh Sách Đặt Hàng" href="{{ route('order.index') }}">Đặt Hàng</a></li>
            </ol>
        </nav>
    </div>
    <section  class="section profile">
        <div class="container col-xl-6">
        <div class="row">
        <div class="card card-body pt-10 hover">
                    <button data-bs-toggle="tooltip" data-bs-placement="top" title="Thông Tin Khách Hàng" class="btn"><h4>Thông Tin</h4></button>
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row">
                            <div class="col-md-4 ">Họ Và Tên:</div>
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tên Khách Hàng" class="col-md-4">{{ $customer->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ">Số Điên Thoại:</div>
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Số Điện Thoại Khách Hàng" class="col-md-4 ">{{ $customer->phone }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ">Email:</div>
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Email Khách Hàng" class="col-md-5 ">{{ $customer->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ">Ngày Đăng Ký:</div>
                            @if(isset($customer->created_at))
                            <div class="col-md-4 ">{{ date_format($customer->created_at, "H:i:s - d/m/Y") }}</div>
                            @endif
                        </div>
                </div>
            </div>
                </section>
            </main>
 @endsection
