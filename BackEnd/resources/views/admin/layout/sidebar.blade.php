<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Trang Chủ</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(Auth::user()->hasPermission('User_viewAny')
      ||Auth::user()->hasPermission('Group_viewAny'))
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Nhân Viên</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @if(Auth::user()->hasPermission('User_viewAny'))
          <li>
            <a href="{{route('users.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách nhân viên</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->hasPermission('Group_viewAny'))
          <li>
            <a href="{{route('groups.index')}}">
              <i class="bi bi-circle"></i><span>Chức vụ</span>
            </a>
          </li>
          @endif
        </ul>
    </li><!-- End Components Nav -->
    @endif

    @if(Auth::user()->hasPermission('Category_viewAny')
    || Auth::user()->hasPermission('Product_viewAny')
    ||Auth::user()->hasPermission('Supplier_viewAny')
    ||Auth::user()->hasPermission('Brand_viewAny'))
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Sản Phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @if(Auth::user()->hasPermission('Category_viewAny'))
          <li>
            <a href="{{route('product.index')}}">
              <i class="bi bi-circle"></i><span>Sản Phẩm</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->hasPermission('Product_viewAny'))
          <li>
            <a href="{{route('category.index')}}">
              <i class="bi bi-circle"></i><span>Danh mục</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->hasPermission('Supplier_viewAny'))
          <li>
            <a href="{{route('supplier.index')}}">
              <i class="bi bi-circle"></i><span>Nhà Cung Cấp</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->hasPermission('Brand_viewAny'))
          <li>
            <a href="{{route('brand.index')}}">
              <i class="bi bi-circle"></i><span>Thương Hiệu</span>
            </a>
          </li>
          @endif
        </ul>
      </li><!-- End Forms Nav -->
      @endif
      @if(Auth::user()->hasPermission('Customer_viewAny'))
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Khách Hàng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('customer.index')}}">
              <i class="bi bi-circle"></i><span>Danh sách khách hàng</span>
            </a>
          </li>
        </ul>
    </li><!-- End Tables Nav -->
    @endif
    @if(Auth::user()->hasPermission('Order_viewAny'))
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Đơn Đặt Hàng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('order.index')}}">
              <i class="bi bi-circle"></i><span>Đơn đặt hàng</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Đơn hàng đã giao</span>
            </a>
          </li>
        </ul>
    </li><!-- End Charts Nav -->
    @endif
    </ul>
  </aside>
