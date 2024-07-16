<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ url('admin') }}"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a href="{{ url('admin') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class>
            <a href="{{ url('admin/users') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/14.svg') }}" alt>
                </div>
                <span>User</span>
            </a>
        </li>
        <li class>
            <a href="{{ url('admin/products') }}" aria-expanded="false">
                <div class="icon_menu"> 
                    <img src="{{ asset('assets/admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Product</span>
            </a>
        </li>
        <li class>
            <a href="{{ url('admin/categories') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/13.svg') }}" alt>
                </div>
                <span>Category</span>
            </a>
        </li>
        <li class>
            <a href="{{ url('admin/orders') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>Order Detail</span>
            </a>
        </li>
    </ul>
</nav>
