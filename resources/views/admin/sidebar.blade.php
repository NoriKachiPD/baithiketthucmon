<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
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
                    <i class="fa fa-dashboard fa-fw" style="color: orange;"></i> <span style="margin-left: 70px; font-weight: 900;">Dashboard</span>
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

            {{-- Contact --}}
            <li>
                <span class="dropdown-toggle sidebar-link">
                    <i class="fa fa-envelope fa-fw" style="color: orange;"></i> Contact
                    <i class="fa fa-chevron-right arrow-icon"></i>
                </span>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.contact.list') }}">List Contact</a></li>
                </ul>
            </li>

            {{-- Order --}}
            <li>
                <span class="dropdown-toggle sidebar-link">
                    <i class="fa fa-shopping-cart fa-fw" style="color: orange;"></i> Order
                    <i class="fa fa-chevron-right arrow-icon"></i>
                </span>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.order.orderlist') }}">List Order</a></li>
                    {{-- Nếu có thêm chức năng tạo đơn hàng, bạn thêm ở đây --}}
                    {{-- <li><a href="{{ route('admin.order.add') }}">Add Order</a></li> --}}
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


    
    .search-dropdown {
    list-style: none;
    padding: 0;
    margin-top: 5px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    position: absolute;
    width: 90%;
    z-index: 999;
    max-height: 200px;
    overflow-y: auto;
    }

    .search-dropdown li {
        padding: 8px 12px;
        cursor: pointer;
    }

    .search-dropdown li:hover {
        background-color: #f0f0f0;
    }
</style>

{{-- JS --}}
<script>
    $(document).ready(function () {
        // Dropdown toggle cho sidebar
        $('.dropdown-toggle').on('click', function (e) {
            e.stopPropagation(); // không lan ra ngoài

            const $clickedToggle = $(this);
            const $submenu = $clickedToggle.next('.nav-second-level');
            const $arrow = $clickedToggle.find('.arrow-icon');
            const isAlreadyOpen = $submenu.is(':visible');

            // Đóng hết các submenu
            $('.nav-second-level').not($submenu).slideUp();
            $('.arrow-icon').not($arrow).removeClass('rotate-down');

            // Nếu submenu này đang đóng thì mở ra
            if (!isAlreadyOpen) {
                $submenu.stop(true, true).slideDown(); // đảm bảo không bị đè lệnh cũ
                $arrow.addClass('rotate-down');
            }
        });

        // ✅ Ngăn menu bị ẩn khi click vào bên trong menu con
        $('.nav-second-level').on('click', function (e) {
            e.stopPropagation();
        });

        // Tìm kiếm (giữ nguyên như bạn có)
        const searchableItems = [
            { label: 'List Category', url: "{{ route('admin.category.list') }}" },
            { label: 'Add Category', url: "{{ route('admin.category.add') }}" },
            { label: 'List Product', url: "{{ route('admin.product.list') }}" },
            { label: 'Add Product', url: "{{ route('admin.product.add') }}" },
            { label: 'List User', url: "{{ route('admin.user.list') }}" },
            { label: 'Add User', url: "{{ route('admin.user.add') }}" },
            { label: 'List Contact', url: "{{ route('admin.contact.list') }}" },
            { label: 'Dashboard', url: "{{ route('admin.dashboard') }}" }
        ];

        const $input = $('.custom-search-form input');
        const $dropdown = $('<ul class="search-dropdown"></ul>').insertAfter('.custom-search-form');

        function renderDropdown(results) {
            $dropdown.empty();
            if (results.length === 0) {
                $dropdown.hide();
                return;
            }
            results.forEach(item => {
                const $li = $('<li></li>').text(item.label).data('url', item.url);
                $dropdown.append($li);
            });
            $dropdown.show();
        }

        $input.on('input', function () {
            $dropdown.hide();
        });

        $input.on('keypress', function (e) {
            if (e.which === 13) {
                const keyword = $input.val().toLowerCase();
                const results = searchableItems.filter(item =>
                    item.label.toLowerCase().includes(keyword)
                );
                renderDropdown(results);
            }
        });

        $('.custom-search-form button').on('click', function () {
            const keyword = $input.val().toLowerCase();
            const results = searchableItems.filter(item =>
                item.label.toLowerCase().includes(keyword)
            );
            renderDropdown(results);
        });

        $dropdown.on('click', 'li', function () {
            const url = $(this).data('url');
            window.location.href = url;
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('.custom-search-form').length) {
                $dropdown.hide();
            }
        });
    });
        $(document).on('click', function (e) {
        if (!$(e.target).closest('.sidebar').length) {
            $('.nav-second-level').slideUp();
            $('.arrow-icon').removeClass('rotate-down');
        }
    });
</script>