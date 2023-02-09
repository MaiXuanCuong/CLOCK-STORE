@extends('admin.home')
@section('content')
<form>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Multi Columns Form</h5>

    <!-- Multi Columns Form -->
    <form class="row g-3">
      <div class="col-md-10">
        <label for="inputName5" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="inputName5">

      <div class="row g-3">
      <div class="col-md-4">
        <label for="inputEmail5" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail5">
      </div>
      <div class="col-md-4">
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword5">
      </div>
      <div class="col-md-4">
        <label for="inputPassword5" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="inputPassword5">
      </div>

      <div class="col-12">
        <label for="inputAddress5" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Mô Tả</label>
        {{-- <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> --}}
        <textarea class="form-control" name="" id="" cols="20" rows="5"></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Ảnh</label>
        <input type="file" class="form-control" id="inputCity">
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">UP Nhiều Ảnh</label>
        <input type="file" class="form-control" id="inputCity">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Tỉnh</label>
        <select id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Huyện</label>
        <select id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">Xã</label>
        <select id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form><!-- End Multi Columns Form -->

  </div>
</div>
</div>
  @endsection