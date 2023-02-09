@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Khách Hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Danh Sách Khách Hàng" href="{{ route('customer.index') }}">Khách Hàng</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Khách Hàng Vi Phạm</h5>
                <div class="md-3 title_cate" >
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Danh Sách Khách Hàng" href="{{ route('customer.index') }}" class="btn btn-info btn-rounded waves-effect waves-light ">
                        <i class=" fas fa-trash-alt"></i>
                        Khách Hàng</a>
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
                                <th scope="col">Ngày Xóa</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="item-{{ $customer->id }}">
                                    <th scope="row">{{ $customer->id }}</th>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->deleted_at }}</td>
                                    <td>

                                        <form action="{{ route('customer.forceDelete',$customer->id) }}" method="post" >
                                            @method('DELETE')
                                            @csrf
                                            @if(Auth::user()->hasPermission('Customer_restore'))
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Khôi Phục Tài Khoản" onclick="return confirm('Bạn có chắc muốn khôi phục khách hàng {{ $customer->name }} không?');"
                                            style='color:rgb(52,136,245)' class='btn'
                                            href="{{ route('customer.restore', $customer->id) }}"><i
                                                class='bi bi-arrow-clockwise h4'></i></a>
                                                @endif
                                                @if(Auth::user()->hasPermission('Customer_forceDelete'))
                                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa Tài Khoản Vi Phạm" onclick="return confirm('Bạn có chắc xóa khách hàng {{ $customer->name }} không?');" class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
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
            </script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 @endsection
