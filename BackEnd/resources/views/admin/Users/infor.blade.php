@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Thông Tin Tài Khoản</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Thông Tin Tài Khoản</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{ asset('storage/images/user/' . $item->image)}}" alt="Profile" class="rounded-circle">
              <h2>{{$item->name}}</h2>
              <h3>{{$item->groups->name}}</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Thông tin</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Thay đổi</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Thay đổi mật khẩu</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password-by-mail">Quên mật khẩu</button>
                  </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Thông tin nhân viên</h5>
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
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Họ tên</div>
                    <div class="col-lg-9 col-md-8">{{$item->name}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Chức vụ</div>
                    <div class="col-lg-9 col-md-8">{{ $item->groups->name}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Giới tính</div>
                    <div class="col-lg-9 col-md-8">{{ $item->gender}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ngày sinh</div>
                    <div class="col-lg-9 col-md-8">{{ $item->birthday}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$item->email}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                    <div class="col-lg-9 col-md-8">{{$item->address}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                    <div class="col-lg-9 col-md-8">{{$item->phone}}</div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form action ="{{route('user.update_info',Auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Tên</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{Auth()->user()->name}}">
                        @error('name')
                          <div class="text text-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="gender" class="form-control" >
                                <option {{Auth()->user()->gender=="Nam" ? 'selected' : ''}} value="Nam">Nam</option>
                                <option {{Auth()->user()->gender=="Nữ" ? 'selected' : ''}} value="Nữ">Nữ</option>
                                <option {{Auth()->user()->gender=="Khác" ? 'selected' : ''}} value="Khác">Khác</option>
                            </select>
                          @error('gender')
                          <div class="text text-danger">{{ $message }}</div>
                      @enderror
                      <input name="province_id" type="hidden" value="{{Auth()->user()->province_id}}">
                      <input name="district_id" type="hidden" value="{{Auth()->user()->district_id}}">
                      <input name="ward_id" type="hidden" value="{{Auth()->user()->ward_id}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Ngày sinh</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="birth_day" type="text" class="form-control" id="company" value="{{Auth()->user()->birthday}}">
                          @error('birth_day')
                          <div class="text text-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                    <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="address" type="text" class="form-control" id="company" value="{{Auth()->user()->address}}">
                          @error('address')
                          <div class="text text-danger">{{ $message }}</div>
                      @enderror
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="company" value="{{Auth()->user()->email}}">
                        @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Job" value="{{Auth()->user()->phone}}">
                        @error('phone')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Hình ảnh</label>
                      <div class="col-md-8 col-lg-9">
                        <input accept="image/*" type='file' id="inputFile" name="inputFile"  /><br><br>
                        <img type="hidden" width="90px" height="90px" id="blah1" src="{{ asset('storage/images/user/' . Auth()->user()->image) ?? asset('storage/images_admin/'.$request->inputFile) }}" alt=""  />
                    </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- Settings Form -->
                  <form action="#" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->
                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="{{route('user.change_password', Auth()->user()->id)}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                        @error('password')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                        @error('newpassword')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu mới</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        @error('renewpassword')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password-by-mail">
                  <!-- Change Password Form -->
                  <form action="{{route('user.mailPassword', Auth()->user()->id)}}" method="post">
                    @method('POST')
                    @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Nhập Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email">
                        @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Lấy Mật Khẩu</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection
