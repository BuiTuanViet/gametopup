<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Quản lý chung
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{  url()->current() == route('users') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li class="nav-item {{  url()->current() == route('transactions') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('transactions') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Lịch sử nạp rút</p>
                </a>
            </li>
            <li class="nav-item {{  url()->current() == route('topup') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('topup') }}">
                    <i class="nc-icon nc-cloud-upload-94"></i>
                    <p>Nạp tiền</p>
                </a>
            </li>
            <li class="nav-item {{  url()->current() == route('withdraw') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('withdraw') }}">
                    <i class="nc-icon nc-cloud-download-93"></i>
                    <p>Rút tiền</p>
                </a>
            </li>
            <li class="nav-item {{  url()->current() == route('bank_user') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('bank_user') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Tài khoản Ngân hàng</p>
                </a>
            </li>
            <li class="nav-item {{  url()->current() == route('promotion') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('promotion') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Khuyến mãi</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-controller-modern"></i>
                    <p>Vào chơi</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
