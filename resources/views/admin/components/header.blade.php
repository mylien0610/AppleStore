<header class="header">
    <div class="header_left">
        <div class="header_logo">
            <a href="home" class="logo_link">
                <img src="/img/Apple_logo_black.svg" alt="CellPhoneS">
                Apple store
            </a>
        </div>
        <div class="button-toggle-sidebar" id="button-toggle-sidebar"><i class="fa-solid fa-bars"></i></div>
    </div>
    <div class="header_right">
        <div class="user dropdown">
            <div class="user_avatar">
                <i class="fa-regular fa-user"></i>
            </div>
            <div class="user_name">
                {{ session()->get('user')['name'] }}
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <ul class="menu header_menu">
                <li class="menu_item"><a class="menu_link" href="#">Thông tin cá nhân</a></li>
                <li class="menu_item"><a class="menu_link" href="#">Đổi mật khẩu</a></li>
                <li class="menu_item">
                    <a class="menu_link" href="#">
                        Đăng xuất
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
