<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard fa-fw" style="color: orange;"></i> Dashboard
                </a>
            </li>

            {{-- Category --}}
            <li>
                <span class="dropdown-toggle sidebar-link">
                    <i class="fa fa-bar-chart-o fa-fw" style="color: orange;"></i> Category
                    <i class="fa fa-chevron-right arrow-icon"></i>
                </span>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.category.list') }}">List Category</a></li>
                    <li><a href="{{ route('admin.category.add') }}">Add Category</a></li>
                </ul>
            </li>

            {{-- Product --}}
            <li>
                <span class="dropdown-toggle sidebar-link">
                    <i class="fa fa-cube fa-fw" style="color: orange;"></i> Product
                    <i class="fa fa-chevron-right arrow-icon"></i>
                </span>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.product.list') }}">List Product</a></li>
                    <li><a href="{{ route('admin.product.add') }}">Add Product</a></li>
                </ul>
            </li>

            {{-- User --}}
            <li>
                <span class="dropdown-toggle sidebar-link">
                    <i class="fa fa-users fa-fw" style="color: orange;"></i> User
                    <i class="fa fa-chevron-right arrow-icon"></i>
                </span>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.user.list') }}">List User</a></li>
                    <li><a href="{{ route('admin.user.add') }}">Add User</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

{{-- CSS --}}
<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 4px;
    }

    .sidebar-link:hover {
        background-color: #f5f5f5;
    }

    .sidebar-link i.fa-fw {
        margin-right: 10px;
    }

    .arrow-icon {
        transition: transform 0.3s ease;
        display: inline-block; /* cần thiết để transform hoạt động */
        transform-origin: center center;
    }

    .rotate-down {
        transform: rotate(90deg);
    }

    .nav-second-level {
        display: none;
        padding-left: 20px;
    }
</style>

{{-- JS --}}
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').on('click', function () {
            const submenu = $(this).next('.nav-second-level');
            const arrow = $(this).find('.arrow-icon');
            const isVisible = submenu.is(':visible');

            // Ẩn tất cả submenu khác & reset tất cả icon
            $('.nav-second-level').not(submenu).slideUp();
            $('.arrow-icon').not(arrow).removeClass('rotate-down');

            // Toggle submenu hiện tại
            submenu.slideToggle();

            // Xoay icon tương ứng
            arrow.toggleClass('rotate-down');
        });
    });
</script>
