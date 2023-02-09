@extends('admin.index')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="mb-1">Nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item"> Sửa nhân viên</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sửa nhân viên</h5>
                <form action="{{ route('users.update', $users->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-11">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name='name' id="inputName5" value="{{ old('name') ?? $users->name }}">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name='phone' id="inputName5" value="{{ old('phone') ?? $users->phone }}">
                                @error('phone')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name='email' id="inputName5" value="{{ old('email') ?? $users->email }}">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name='address' id="inputName5" value="{{ old('address') ?? $users->address }}">
                                @error('address')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Ảnh đại diện</label>
                                <input accept="image/*" type='file' id="inputFile" name="inputFile" class="form-control @error('image') is-invalid @enderror">
                                @error('inputFile')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <img type="hidden" width="120px" height="100px" id="blah1"
                                src="{{ asset('storage/images/user/' . $users->image) ?? asset('storage/images/' . $request->inputFile) }}" alt="" />
                              </div>
                              <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Ngày Sinh</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    name='birthday' id="inputName5" value="{{ old('birthday') ?? $users->birthday }}">
                                @error('birthday')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉnh/Thành phố</label>
                                    <select name="province_id" id="province_id" class="form-control province_id"
                                        aria-label="Default select example" data-toggle="select2">
                                        <option selected="" value="">Vui lòng chọn</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quận/Huyện</label>
                                    <select name="district_id" id="district_id" class="form-control district_id"
                                        aria-label="Default select example">
                                        <option selected="" value="">Vui lòng chọn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phường/Xã</label>
                                    <select name="ward_id" class="form-control ward_id" aria-label="Default select example"
                                        id="ward_id">
                                        <option selected="" value="">Vui lòng chọn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Nhóm nhân viên</label>
                                <select id="inputState" class="form-select @error('group_id') is-invalid @enderror" name="group_id">
                                    @foreach($groups as $group)
                                    <option <?= $users->group_id==$group->id ? 'selected' : '' ?> value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            <div class="col-md-4">
                                <label>Giới tính</label><br />
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="gender" value="Nam"
                                        checked="Nam">
                                    <span class="form-radio-sign">Nam</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="gender" value="Nữ">
                                    <span class="form-radio-sign">Nữ</span>
                                </label>
                            </div>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <a style="float: right" href="{{ route('users.index') }}" type="button"
                            class="btn btn-danger">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </main>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '.province_id', function() {
                var province_id = $(this).val();
                var district_name = $('.district_id').find('option:selected').text();
                console.log(district_name);
                console.log(province_id);
                if (province_id == '') {
                    $('#province_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                $.ajax({
                    url: "{{ route('user.GetDistricts') }}",
                    type: "GET",
                    data: {
                        province_id: province_id
                    },
                    success: function(data) {
                        console.log(data);
                        var html = '<option value="">Vui lòng chọn</option>';
                        $.each(data, function(key, v) {
                            console.log(v);
                            html += '<option value=" ' + v.province_id + ' "> ' + v
                                .name + '</option>';
                        });
                        $('.district_id').html(html);
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#district_id, .payment', function() {
                var district_id = $(this).val();
                var ward_id = $(this).val();
                var ward_name = $('.ward_id').find('option:selected').text();
                if (district_id == '') {
                    $('#district_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                if (ward_id == '') {
                    $('#ward_id').notify("Lỗi:Địa chỉ không được để trống", {
                        globalPosition: 'top left',
                    });
                    return false;
                }
                $.ajax({
                    url: "{{ route('user.getWards') }}",
                    type: "GET",
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        console.log(data);
                        var html = '<option value="">Vui lòng chọn</option>';
                        $.each(data, function(key, v) {
                            html += '<option value =" ' + v.id + ' "> ' + v.name +
                                '</option>';
                        });
                        $('#ward_id').html(html);
                    }
                })
            });
        });
    </script>
@endsection
