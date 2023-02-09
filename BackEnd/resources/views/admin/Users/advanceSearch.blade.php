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
                                <label class="form-label" for="nameVi">Danh sách chức vụ:</label>
                                <select class=" form-select" name="group_id" id="users" style="width: 470px">
                                    <option style="text-align: center" value="" disabled
                                    selected>Vui lòng chọn</option>
                                    @foreach ($groups as $group)
                                        <option value="{{  $group->id }}">{{ $group->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="nameVi">Tỉnh/Thành phố</label>
                                <select class=" form-select" name="province_id" id="users" style="width: 470px">
                                    <option style="text-align: center" value="" disabled
                                    selected>Vui lòng chọn</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{  $province->id }}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <p><b>Giới tính</b></p>
                                <input type="radio" name="gender" value="Nam">
                                <label for="html">Nam </label>&nbsp&nbsp&nbsp
                                <input type="radio" name="gender" value="Nữ">
                                <label for="css">Nữ</label><br>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>

    </div>
</div>
