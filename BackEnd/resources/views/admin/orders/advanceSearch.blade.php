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
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Tổng Tiền Đơn Hàng <span class="badge bg-success rounded-pill">VNĐ</span>
                                </label>
                                <input type="number" value="{{ request()->startPrice }}"  class="form-control"
                                    name="startPrice" id="startPrice" placeholder="Từ">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="name">&nbsp</label>
                                <input type="number" value="{{ request()->endPrice }}"  class="form-control" name="endPrice"
                                    id="endPrice" placeholder="Đến">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label" for="quantity">Ngày Đặt Hàng
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
                                <p><b>Trạng Thái Đơn:</b></p>
                                <input <?= request()->status == '1' ? 'checked' : '' ?> type="radio"  name="status" value="1">
                                <label for="html">Đã Duyệt </label>&nbsp&nbsp&nbsp
                                <input <?= request()->status == '0' ? 'checked' : '' ?> type="radio"  name="status" value="0">
                                <label for="css">Chưa Duyệt</label><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('order.index') }}" class="btn btn-warning">Đặt Lại</a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>

    </div>
</div>
