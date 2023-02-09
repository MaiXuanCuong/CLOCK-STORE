@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="mb-1">Nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Danh sách nhân viên</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <h5 class="card-title">Danh sách nhân viên</h5>
                    </div>
                    <div class="col-md-6">
                        <form style="" action="" id="form-search"
                            class="form-inline d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                            <div style="margin-top: 12px;" class="form-group">
                                <div class="input-group-prepend">
                                </div>
                                <input class="form-control" name="search" placeholder="Tìm kiếm">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div><br>
                        </form>
                        <div style="margin-top: 12px; float: right" class="md-3 title_cate">
                            <button href="" class="btn btn-primary  waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#searchModal">
                                Tìm kiếm nâng cao
                            </button>
                            @include('admin.users.advanceSearch')
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
                <a class='btn btn-primary mb-2' href="{{ route('users.create') }}">Thêm nhân viên</a>
                <a class='btn btn-danger mb-2 float-right' href="{{ route('user.getTrashed') }}">Thùng rác</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã Nhân Viên</th>
                            <th scope="col">Ảnh Đại Diện</th>
                            <th scope="col">Tên Nhân Viên</th>
                            <th scope="col">Nhóm Nhân Viên</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$users->count())
                            <tr>
                                <td colspan="7">Chưa danh sách nhân viên.....</td>
                            </tr>
                        @else
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <img style="width:120px; height:100px"
                                            src="{{asset('storage/images/user/' . $user->image)  }}"
                                            alt=""class="image_photo">
                                    </td>
                                    <td><a data-bs-toggle="tooltip" data-bs-placement="top" title="Xem chi tiết nhân viên"
                                            href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                        @if(isset($user->groups->name))
                                    <td>{{ $user->groups->name }}</td>
                                    @endif
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa nhân viên"
                                                style='color:rgb(52,136,245)' class='btn'
                                                href="{{ route('users.edit', $user->id) }}">
                                                <i class='bi bi-pencil-square h4'></i></a>
                                            <button data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Đưa vào thùng rác"
                                                onclick="return confirm('Bạn có chắc muốn đưa nhân viên này vào thùng rác không?');"
                                                class='btn' style='color:rgb(52,136,245)' type="submit"><i
                                                    class='bi bi-trash h4'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $users->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
        @include('admin.users.advanceSearch')
    </main>

@endsection
