@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Khách Hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Khách Hàng</li>
                    <li class="breadcrumb-item"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Xem Đơn Hàng" href="{{ route('order.index') }}">Đơn Hàng</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                <h5 class="card-title">Danh Sách Khách Hàng</h5>
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
                        @include('admin.customers.advanceSearch')
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
                <div style="text-align: right" class="md-3 title_cate" >
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Khách Hàng Vi Phạm" href="{{ route('customer.trash') }}" class="btn btn-danger btn-rounded waves-effect waves-light ">
                        <i class=" fas fa-trash-alt"></i>
                        Thùng Rác</a>
                </div>
                <table style="text-align: center" class="table table-hover">
                    @if (!$customers->count())
                        <tr>
                            <td colspan="6">Danh Sách Rỗng!</td>
                        </tr>
                    @else
                        <thead>

                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="item-{{ $customer->id }}">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>@if(Auth::user()->hasPermission('Customer_view'))
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Chi Tiết Khách Hàng" href="{{ route('customer.show',$customer->id) }}">
                                         @endif
                                    {{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <form action="{{ route('customer.destroy',$customer->id) }}" method="post" >
                                            @method('DELETE')
                                            @csrf
                                            @if(Auth::user()->hasPermission('Customer_delete'))
                                            <button onclick=" return confirm('Bạn có chắc xóa khách hàng {{ $customer->name }} không?');" class ='btn' style='color:rgb(52,136,245)' type="submit" ><i data-bs-toggle="tooltip" data-bs-placement="top" title="Vô Hiệu Hóa Tài Khoản" class='bi bi-trash h4'></i></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    @endif
                    </tbody>
                </table>
                    <div style="float: right">
                        {{ $customers->appends(request()->all())->links() }}
                    </div>
            </div>
        </div>
    </div>
        <main>
            <script>
                $(function() {
                    $('.deleteCustomer').on('click', deleteCustomer)

                })
            <script>
                $(function() {
                    $("#keyword").autocomplete({
                        serviceUrl: 'searchCustomers',
                        paramName: "keyword",
                        onSelect: function(suggestion) {
                            console.log(suggestion);
                            $("#keyword").val(suggestion.value);
                        },
                        transformResult: function(response) {
                            return {
                                suggestions: $.map($.parseJSON(response), function(item) {
                                    console.log(item);
                                    return {
                                        value: item.name,
                                    };
                                })
                            };
                        },

                    });
                })
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 @endsection
