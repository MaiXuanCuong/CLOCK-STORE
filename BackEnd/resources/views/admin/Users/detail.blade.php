@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="mb-1">Sản Phẩm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item"> Chi tiết nhân viên</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chi tiết nhân viên</h5><br>
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <img style="margin-top:30px" src="{{ asset('storage/images/user/' . $user->image) }}"
                                    id="main_user_image" height="300" width="412">
                            </div><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="mt-2"> <span class="fw-bold">Thông tin chi tiết:</span>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Mã nhân viên</td>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày sinh</td>
                                            <td>{{ $user->birthday }}</td>
                                        </tr>
                                        <tr>
                                            <td>Giới tính</td>
                                            <td>{{ $user->gender }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
