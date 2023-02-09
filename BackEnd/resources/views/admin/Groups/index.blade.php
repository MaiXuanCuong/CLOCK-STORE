@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="mb-1">Chức vụ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('groups.index')}}">Chức vụ</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <h5 class="card-title">Danh sách chức vụ</h5>
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
                @if (Auth::user()->hasPermission('Group_create'))
                <a class='btn btn-primary mb-2' href="{{ route('groups.create') }}">Thêm chức vụ</a>
                @endif
                <a class='btn btn-danger mb-2 float-right'  href="{{ route('group.getTrashed')}}">Thùng rác</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã chức vụ</th>
                            <th scope="col">Tên chức vụ</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>@if (Auth::user()->hasPermission('Group_view'))
                                    {{-- <a href="{{route('groups.show', $item->id)}}"> --}}
                                    @endif
                                        {{ $item->name }}</a></td>
                                <td>
                                    <form action="{{ route('groups.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        @if (Auth::user()->hasPermission('Group_update'))
                                        <a style='color:rgb(52,136,245)' class='btn'
                                            href="{{ route('groups.edit', $item->id) }}">
                                            <i class='bi bi-pencil-square h4'></i></a>
                                        @endif
                                        @if ($item->name != 'Supper Admin')
                                        @if (Auth::user()->hasPermission('Group_delete'))
                                        <button
                                            onclick="return confirm('Bạn có chắc muốn đưa chức vụ này vào thùng rác không?');"
                                            class='btn' style='color:rgb(52,136,245)' type="submit"><i
                                                class='bi bi-trash h4'></i></button>
                                            @endif
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                    {{ $items->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
