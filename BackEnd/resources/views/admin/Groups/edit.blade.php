@extends('admin.index')
@section('content')
<style>
    /* .form-switch .form-check-input{
        margin-left: -6.5em;
    } */
    .form-switch{
        padding-left: 0.5em;
    }
    #checkAll{
        margin-left: 0.5em;
    }
</style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Chức Vụ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('groups.index')}}">Chức vụ</a></li>
                    <li class="breadcrumb-item active">Sửa chức vụ</li>
                </ol>
            </nav>
        </div>
        <div class="page-section">
            <form method="post" action="{{route('groups.update',$item->id)}}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin chức vụ</legend>
                        <div class="form-group">
                            <label for="tf1">Tên chức vụ:</label> {{$item->name}}
                        </div><br>
                        <div class="form-group">
                            <h4>Quyền hạn</h4>
                            <label  class="form-check form-switch">{{ __('CheckAll') }}
                                <input type="checkbox" id="checkAll" class="form-check-input"
                                    value="Quyền hạn">
                            </label><br>
                            <div class="row">
                                @foreach ($group_names as $group_name => $roles)
                                    <div class="list-group list-group-flush list-group-bordered col-lg-4">
                                        <div class="list-group-header" style="color:rgb(2, 6, 249) ;">
                                            <h5 style="margin-left:20px"> {{ __($group_name) }}</h5>
                                        </div>
                                        @foreach ($roles as $role)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                <!-- .switcher-control -->
                                                <label class="form-check form-switch ">
                                                    <input type="checkbox" @checked(in_array($role['id'], $userRoles)) name="roles[]"
                                                        class="checkItem form-check-input checkItem"
                                                        value="{{ $role['id'] }}">
                                                    <span class="switcher-indicator"></span>
                                                </label>
                                                <!-- /.switcher-control -->
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-actions">
                            @if (Auth::user()->hasPermission('Group_update'))
                            <button  class="btn btn-primary ml-auto mr-2" type="submit">Lưu</button>
                            @endif
                            <a style="float: right;" class="btn btn-danger float-right " href="{{route('groups.index')}}">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $('#checkAll').click(function() {
            $(':checkbox.checkItem').prop('checked', this.checked);
        });
    </script>
@endsection
