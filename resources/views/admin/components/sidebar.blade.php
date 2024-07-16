<div class="sidebar">
    <ul class="menu">

        <li class="menu_item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home.index') }}" class="menu_link">
                <span class="icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>
                <span class="text">
                    Dashboard
                </span>
            </a>
        </li>

        <li class="menu_item menu_item-title">
            Manage
        </li>

        <li class="menu_item ">
            <a href="/quan-tri/nhan-vien" class="menu_link">
                <span class="icon">
                    <i class="fa fa-id-badge"></i>
                </span>
                <span class="text">
                    Staff
                </span>
            </a>
        </li>


        <li class="menu_item">
            <a href="/quan-tri/khach-hang" class="menu_link">
                <span class="icon">
                    <i class="fa fa-users"></i>
                </span>
                <span class="text">
                    Customer
                </span>
            </a>
        </li>

        <li class="menu_item menu_item-title">
            Products
        </li>

        <li class="menu_item {{ request()->is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}" class="menu_link">
                <span class="icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
                <span class="text">
                    Category manage
                </span>
            </a>
        </li>

        <li class="menu_item {{ request()->is('admin/products*') ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}" class="menu_link">
                <span class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </span>
                <span class="text">
                    Products manage
                </span>
            </a>
        </li>

        <li class="menu_item menu_item-title">
            Order
        </li>

        <li class="menu_item">
            <a href="/quan-tri/don-hang" class="menu_link">
                <span class="icon">
                    <i class="fa-solid fa-truck"></i>
                </span>
                <span class="text">
                    Order manage
                </span>
            </a>
        </li>

    </ul>
</div>
