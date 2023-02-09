@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="mb-1">Thùng rác</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"></a>Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Danh sách nhân viên</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.getTrashed')}}">Thùng rác</a></li>
          </ol>
        </nav>
      </div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Thùng rác</h5>
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
    <a class='btn btn-primary mb-2'  href="{{route('users.index')}}">Danh sách nhân viên</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Mã nhân viên</th>
          <th scope="col">Ảnh đại diện</th>
          <th scope="col">Tên Nhân Viên</th>
          <th scope="col">Nhóm nhân viên</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $key => $user)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>
            <img style="width:120px; height:100px" src="{{ asset('storage/images/user/' . $user->image) }}" alt=""class="image_photo">
          </td>
          <td>{{$user->name}}</td>
          <td>{{$user->groups->name}}</td>

          <td>
            <form action="{{ route('user.force_destroy', $user->id) }}" method="post" >
                @method('DELETE')
                @csrf
                @if(Auth::user()->hasPermission('User_restore'))
                <a onclick="return confirm('Bạn có chắc muốn khôi phục nhân viên này không?');"
                style='color:rgb(52,136,245)' class='btn'
                href="{{ route('user.restore', $user->id) }}"><i
                class='bi bi-arrow-clockwise h4'></i></a>
                @endif
                @if(Auth::user()->hasPermission('User_forceDelete'))
            <button onclick="return confirm('Bạn có chắc muốn xóa nhân viên này không?');"
            class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
                @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->onEachSide(5)->links() }}
  </div>
</div>
</main>
@endsection
