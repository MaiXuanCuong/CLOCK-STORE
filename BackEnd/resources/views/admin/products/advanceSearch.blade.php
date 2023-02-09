{{-- selec2 cdn --}}

<div class="modal fade" id="searchModal" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm nâng cao</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Danh mục</label>
                                <select class=" form-select" name="category_id" id="category_id" style="width: 470px">
                                    <option style="text-align: center" value="">-----Chọn danh mục-----</option>
                                    @foreach ($categories as $category)
                                        <option <?= request()->category_id == $category->id ? 'selected' : '' ?> value="{{  $category->id }}">{{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Thương hiệu</label>
                                <select class=" form-select" name="brand_id" id="brand_id" style="width: 220px">
                                    <option value="">--Chọn thương hiệu--</option>
                                    @foreach ($brands as $brand)
                                        <option <?= request()->brand_id == $brand->id ? 'selected' : '' ?> value="{{  $brand->id }}">{{ $brand->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Nhà cung cấp</label>
                                <select class=" form-select" name="supplier_id" id="supplier_id" style="width: 220px">
                                    <option value="">--Chọn nhà cung cấp--</option>
                                    @foreach ($suppliers as $supplier)
                                        <option <?= request()->supplier_id == $supplier->id ? 'selected' : '' ?> value="{{  $supplier->id }}">{{ $supplier->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Khoảng giá (VND)
                                </label>
                                <input type="number"  class="form-control" value="{{ request()->startPrice }}"
                                    name="startPrice" id="startPrice" placeholder="từ">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">&nbsp</label>
                                <input type="text"  class="form-control" name="endPrice" value="{{ request()->endPrice }}"
                                    id="endPrice" placeholder="đến">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="quantity">Ngày thêm sản phẩm
                                </label>
                                <input type="date" name="start_date" placeholder="dd/mm/yyyy"
                                    class="form-control start_date" value="{{ request()->start_date }}"
                                    min="{{ Carbon\Carbon::now()->firstOfYear()->format('d-m-Y') }}"
                                    max="{{ Carbon\Carbon::now()->lastOfYear()->format('d-m-Y') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="quantity">&nbsp</label>
                                <input type="date" value="{{ request()->end_date }}" class="form-control" name="end_date" placeholder="dd/mm/yyyy"
                                    class="form-control end_date" value="#">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <p><b>Trạng thái:</b></p>
                                <input type="radio" <?= request()->status == '1' ? 'checked' : '' ?>  name="status" value="1">
                                <label for="html">Hiện </label>&nbsp&nbsp&nbsp
                                <input type="radio" <?= request()->status == '0' ? 'checked' : '' ?>   name="status" value="0">
                                <label for="css">Ẩn</label><br>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <p><b>Loại đồng hồ:</b></p>
                                <input type="radio" <?= request()->type_gender == 'Nam' ? 'checked' : '' ?>  name="type_gender" value="Nam">
                                <label for="html">Nam </label>&nbsp&nbsp&nbsp
                                <input type="radio" <?= request()->type_gender == 'Nữ' ? 'checked' : '' ?>  name="type_gender" value="Nữ">
                                <label for="css">Nữ</label><br>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="{{route('product.index')}}" style="float: left" type="submit" class="btn btn-danger">Đặt lại</a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>

    </div>
</div>
