<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/fonts/fontawesome-6-pro.css')}}">
    <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap4.6.0.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>

    <link rel="stylesheet"
        href="https://staticfile.batdongsan.com.vn/css/web/filestatic.ver202201270753.msvbds.home.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('css')
    <link href="https://staticfile.batdongsan.com.vn/images/logo/favicon_redesign_xl_1.ico" rel="shortcut icon"
        type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <title>@yield('title')</title>
    <style>
        .status-icon {
            display: table-cell;
            vertical-align: middle;
            position: relative;
            background: #E03C31;
            color: #FFF;
            font-weight: bold;
            font-size: 10px;
            line-height: 8px;
            float: right;
            text-align: center;
            border-radius: 4px;
            padding: 4px;
            margin-right: 16px;
            margin-top: 2px;
        }

        .form-group.remember-me-label {
            cursor: pointer;
        }

        .form-group.remember-me-label i {
            font-size: 21px;
        }

        .form-group.remember-me-label .fa-square-check {
            display: none;
        }
    </style>
</head>

<script src="https://www.google.com/recaptcha/api.js"></script>

<body scroll="no">
    @include('blocks.navbar')

    @yield('extra-navbar')
    @yield('content')
    <div class="re__form-popup-background">
        <div class="modal-form" onclick="closeRegisterForm()"></div>
        <div class="re__form-popup-background-container">
            <div class="re__form-popup-background-container-header">
                <h1 class="text">Đăng ký tài khoản</h1>
                <div class="close" onclick="closeRegisterForm()">&times;</div>
            </div>
            <form action="{{route('users.store')}}" method="POST" id="register" class="user-submit">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control-lg" placeholder="Tên đăng nhập *"
                        value="{{old('username')}}">
                    @error('username')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control-lg" placeholder="Địa chỉ email *"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group password">
                    <div>
                        <input type="text" name="password" class="form-control-lg" placeholder="Mật khẩu *"
                            value="{{old('password')}}" id="register-password">
                        @error('username')
                        <div class="text-danger">{{$password}}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="password_confirmation" class="form-control-lg"
                            placeholder="Nhập lại mật khẩu *">
                        @error('password_confirmation')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group label">
                    <div>Thông tin cá nhân</div>
                </div>
                <div class="form-group">
                    <input type="text" name="fullname" class="form-control-lg" placeholder="Tên đầy đủ *"
                        value="{{old('fullname')}}">
                    @error('fullname')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control-lg" placeholder="Ngày sinh" id="register-birthday"
                        value="{{old('birthday')}}" oninput="validateDate(this.value)" autocomplete="off"
                        name="str-birthday" value="{{old('str-birthday')}}">
                    <input type="hidden" name="birthday">
                    @error('birthday')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <span class="error birthday-format"></span>
                </div>
                <div class="form-group">
                    <div class="select form-control-lg" id="register-city" data-type="show" control-target="cities"
                        display-target="cities">Tỉnh/Thành</div>
                    <ul class="select-list" passive-target="cities" style="min-width: 370px;">
                        <li vl="0" class="advance-options current">Tỉnh/Thành</li>
                        <li vl="SG" class="advance-options">Hồ Chí Minh</li>
                        <li vl="HN" class="advance-options">Hà Nội</li>
                        <li vl="DDN" class="advance-options">Đà Nẵng</li>
                        <li vl="BD" class="advance-options">Bình Dương</li>
                        <li vl="DNA" class="advance-options">Đồng Nai</li>
                        <li vl="KH" class="advance-options">Khánh Hòa</li>
                        <li vl="HP" class="advance-options">Hải Phòng</li>
                        <li vl="LA" class="advance-options">Long An</li>
                        <li vl="QNA" class="advance-options">Quảng Nam</li>
                        <li vl="VT" class="advance-options">Bà Rịa Vũng Tàu</li>
                        <li vl="DDL" class="advance-options">Đắk Lắk</li>
                        <li vl="CT" class="advance-options">Cần Thơ</li>
                        <li vl="BTH" class="advance-options">Bình Thuận </li>
                        <li vl="LDD" class="advance-options">Lâm Đồng</li>
                        <li vl="TTH" class="advance-options">Thừa Thiên Huế</li>
                        <li vl="KG" class="advance-options">Kiên Giang</li>
                        <li vl="BN" class="advance-options">Bắc Ninh</li>
                        <li vl="QNI" class="advance-options">Quảng Ninh</li>
                        <li vl="TH" class="advance-options">Thanh Hóa</li>
                        <li vl="NA" class="advance-options">Nghệ An</li>
                        <li vl="HD" class="advance-options">Hải Dương</li>
                        <li vl="GL" class="advance-options">Gia Lai</li>
                        <li vl="BP" class="advance-options">Bình Phước</li>
                        <li vl="HY" class="advance-options">Hưng Yên</li>
                        <li vl="BDD" class="advance-options">Bình Định</li>
                        <li vl="TG" class="advance-options">Tiền Giang</li>
                        <li vl="TB" class="advance-options">Thái Bình</li>
                        <li vl="BG" class="advance-options">Bắc Giang</li>
                        <li vl="HB" class="advance-options">Hòa Bình</li>
                        <li vl="AG" class="advance-options">An Giang</li>
                        <li vl="VP" class="advance-options">Vĩnh Phúc</li>
                        <li vl="TNI" class="advance-options">Tây Ninh</li>
                        <li vl="TN" class="advance-options">Thái Nguyên</li>
                        <li vl="LCA" class="advance-options">Lào Cai</li>
                        <li vl="NDD" class="advance-options">Nam Định</li>
                        <li vl="QNG" class="advance-options">Quảng Ngãi</li>
                        <li vl="BTR" class="advance-options">Bến Tre</li>
                        <li vl="DNO" class="advance-options">Đắk Nông</li>
                        <li vl="CM" class="advance-options">Cà Mau</li>
                        <li vl="VL" class="advance-options">Vĩnh Long</li>
                        <li vl="NB" class="advance-options">Ninh Bình</li>
                        <li vl="PT" class="advance-options">Phú Thọ</li>
                        <li vl="NT" class="advance-options">Ninh Thuận</li>
                        <li vl="PY" class="advance-options">Phú Yên</li>
                        <li vl="HNA" class="advance-options">Hà Nam</li>
                        <li vl="HT" class="advance-options">Hà Tĩnh</li>
                        <li vl="DDT" class="advance-options">Đồng Tháp</li>
                        <li vl="ST" class="advance-options">Sóc Trăng</li>
                        <li vl="KT" class="advance-options">Kon Tum</li>
                        <li vl="QB" class="advance-options">Quảng Bình</li>
                        <li vl="QT" class="advance-options">Quảng Trị</li>
                        <li vl="TV" class="advance-options">Trà Vinh</li>
                        <li vl="HGI" class="advance-options">Hậu Giang</li>
                        <li vl="SL" class="advance-options">Sơn La</li>
                        <li vl="BL" class="advance-options">Bạc Liêu</li>
                        <li vl="YB" class="advance-options">Yên Bái</li>
                        <li vl="TQ" class="advance-options">Tuyên Quang</li>
                        <li vl="DDB" class="advance-options">Điện Biên</li>
                        <li vl="LCH" class="advance-options">Lai Châu</li>
                        <li vl="LS" class="advance-options">Lạng Sơn</li>
                        <li vl="HG" class="advance-options">Hà Giang</li>
                        <li vl="BK" class="advance-options">Bắc Kạn</li>
                        <li vl="CB" class="advance-options">Cao Bằng</li>
                    </ul>
                </div>
                <div class="form-group">
                    <div class="select form-control-lg" id="register-district" data-type="show"
                        control-target="district" display-target="district">Quận/Huyện</div>
                    @include('blocks.district')
                </div>
                <div class="form-group">
                    <div class="select form-control-lg" id="register-ward" data-type="show" control-target="ward"
                        display-target="ward">Phường/Xã</div>
                    @include('blocks.ward')
                </div>
                <input type="hidden" name="address">
                <div class="form-group">
                    <label class="gender">
                        <input type="radio" name="gender" value="male" checked>
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>Nam</span>
                    </label>
                    <label class="gender">
                        <input type="radio" name="gender" value="female">
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>Nữ</span>
                    </label>
                </div>
                <div class="form-group label">Bạn là?</div>
                <div class="form-group">
                    <label class="gender">
                        <input type="radio" name="account_type" value="personal" checked>
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>Cá nhân</span>
                    </label>
                    <label class="gender">
                        <input type="radio" name="account_type" value="enterprise">
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>Công ty</span>
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" name="identity_number" class="form-control-lg"
                        placeholder="Mã số thuế cá nhân/ CMND *" value="{{old('identity_number')}}"
                        id="register-identity_number">
                    @error('identity_number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeYpHcfAAAAAH2R5ZjD-Q5B76rdpPNUKuN8Hpqh"></div>
                    <span class="error recaptcha"></span>
                </div>
                <input type="checkbox" checked id="register-rule">
                <label class="form-group rule" for="register-rule">
                    <i class="fa-regular fa-square"></i>
                    <i class="fa-solid fa-square-check"></i>
                    Tôi đồng ý với các điều khoản, điều kiện, & chính sách của Batdongsan.com.vn
                </label>

                <div class="form-group">
                    <input type="submit" value="Đăng ký" class="submit form-control-lg">
                </div>
                <div class="form-group note">
                    <strong>Chú ý:</strong>
                    <span>Thông tin tên đăng nhập, email không thể thay đổi sau khi đăng ký.</span>
                    <p>Để được trợ giúp, vui lòng liên hệ tổng đài CSKH <a href="tel:1900 1881">1900 1881</a> hoặc email
                        <a href="mailto:hotro@batdongsan.com.vn">hotro@batdongsan.com.vn</a>
                    </p>
                </div>
                <div class="form-group footer">
                    Đã là thành viên? <span class="go-to-login" onclick="goToLogin()">Đăng nhập</span> tại đây
                </div>
            </form>
        </div>
    </div>

    @if(session('msg'))
    <div class="popup text-center d-flex">
        <div class="popup-body">
            <span class="alert alert-success">Thêm người dùng thành công</span>
        </div>
    </div>
    <script>
        setTimeout(() => {
            $('.popup').removeClass('d-flex').addClass('d-none')
        }, 3900);
    </script>
    @endif

    <div class="re__form-popup-background">
        <div class="modal-form" onclick="closeLoginForm()"></div>
        <div class="re__form-popup-background-container">
            <div class="re__form-popup-background-container-header">
                <h1 class="text">Đăng nhập</h1>
                <div class="close" onclick="closeLoginForm()">&times;</div>
            </div>
            <form action="{{route('user.login')}}" method="POST" id="login" class="user-submit">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control-lg" placeholder="Tên đăng nhập *"
                        value="{{Cookie::get('username')}}">
                </div>
                <div class="form-group password">
                    <input type="text" name="password" class="form-control-lg" placeholder="Mật khẩu *"
                        value="{{Cookie::get('password')}}">
                </div>
                <div class="form-group submit">
                    <input type="submit" value="Đăng nhập" class="submit form-control-lg">
                </div>
                <div class="form-group">
                    <input type="checkbox" checked="{{Cookie::get('checked')}}" id="login-remember-me" name="remember">
                    <label class="form-group remember-me-label" for="login-remember-me">
                        <i class="fa-regular fa-square"></i>
                        <i class="fa-solid fa-square-check"></i>
                        Nhớ tài khoản
                    </label>
                    <div class="forgot-password">Quên mật khẩu?</div>
                </div>
                <div class="form-group login-social-title">Hoặc</div>
                <div class="form-group login-by">
                    <div class="form-control-lg"><i class="icon fa-brands fa-facebook-f"></i> Facebook</div>
                    <div class="form-control-lg"><i class="icon fa-brands fa-google"></i> Google</div>
                </div>
                <div class="form-group footer">
                    Chưa là thành viên? <span class="go-to-login" onclick="goToRegister()">Đăng ký</span> tại đây
                </div>
            </form>
        </div>
    </div>

    <footer class="re__container re__footer mt-40">
        <div class="d-inline-block mg-0-auto re__container--lg" style=" flex-wrap: wrap;">
            <div class="re__col--lg-4 pl-0 width-md-lg-full">
                <div class="re__footer-logo">
                    <a >
                        <img src="https://staticfile.batdongsan.com.vn/images/logo/logo-black.svg">
                    </a>
                </div>

                <div class="re__typo-expressive">CÔNG TY CỔ PHẦN PROPERTYGURU VIỆT NAM</div>
                <div class="d-flex re__address">
                    <ion-icon name="location-outline"></ion-icon>
                    <div class="re__typo-expressive">Tầng 31, Keangnam Hanoi Landmark, Phạm Hùng, Nam Từ Liêm, Hà Nội
                    </div>
                </div>
                <div class="d-flex re__address">
                    <i class="fal fa-phone-volume"></i>
                    <div class="re__typo-expressive">(024) 3562 5939 - (024) 3562 5940</div>
                </div>
                <div class="mt-40 d-flex brand flex-center flex-start">
                    <a  style="margin-right: 12px;"><img
                            src="https://staticfile.batdongsan.com.vn/images/mobile/footer/google-play.png"></a>
                    <a ><img src="https://staticfile.batdongsan.com.vn/images/mobile/footer/app_store.png"></a>
                </div>
            </div>

            <div class="re__col--lg-8 pr-0 re__col-hotline pr-0 width-md-80p dp-md-flex"
                style="justify-content: space-between;">
                <div class="re__col--lg-3 re__padding-0">
                    <div class="re__hotline mgt-lg-0">
                        <i class="fal fa-phone-volume"></i>
                        <div class="re__right">
                            <span class="re__typo-body--sm">Hotline</span>
                            <span class="re__typo-heading--xs">1900 1881</span>
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-4 pl-0">
                    <div class="re__hotline mgt-lg-0">
                        <i class="fal fa-user"></i>
                        <div class="re__right">
                            <span class="re__typo-body--sm">Hỗ trợ khách hàng</span>
                            <span class="re__typo-heading--xs">hotro@batdongsan.com.vn</span>
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-5">
                    <div class="re__hotline mgt-lg-0">
                        <i class="fal fa-headphones"></i>
                        <div class="re__right">
                            <span class="re__typo-body--sm">Chăm sóc khách hàng</span>
                            <span class="re__typo-heading--xs">cskh@batdongsan.com.vn </span>
                        </div>
                    </div>
                </div>

                <div class="re__link re__link-tablet">
                    <div class="re__col--lg-3 p-0 dp-md-lg-none">
                        <div class="re__typo-expressive--md re__title" data-toggle="collapse" data-target="#huongdan">
                            HƯỚNG DẪN
                            <i class="fa fa-chevron-right icon-abs"></i>
                        </div>
                        <div class="re__list-menu--footer collapse" id="huongdan">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Báo giá & hỗ trợ</a></li>
                                <li><a  class="re__link-se">Câu hỏi thường gặp</a></li>
                                <li><a  class="re__link-se">Thông báo</a></li>
                                <li><a  class="re__link-se">Liên hệ</a></li>
                                <li><a  class="re__link-se">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 p-0 dp-md-none">
                        <div class="re__typo-expressive--md re__title">HƯỚNG DẪN</div>
                        <div class="re__list-menu--footer">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Báo giá & hỗ trợ</a></li>
                                <li><a  class="re__link-se">Câu hỏi thường gặp</a></li>
                                <li><a  class="re__link-se">Thông báo</a></li>
                                <li><a  class="re__link-se">Liên hệ</a></li>
                                <li><a  class="re__link-se">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 pl-0 dp-md-lg-none">
                        <div class="re__typo-expressive--md re__title" data-toggle="collapse" data-target="#quydinh">Quy
                            Định
                            <i class="fa fa-chevron-right icon-abs"></i>
                        </div>
                        <div class="re__list-menu--footer collapse" id="quydinh">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Quy định đăng tin</a></li>
                                <li><a  class="re__link-se">Quy chế hoạt động</a></li>
                                <li><a  class="re__link-se">Điều khoản thỏa thuận</a></li>
                                <li><a  class="re__link-se">Chính sách bảo mật</a></li>
                                <li><a  class="re__link-se">Giải quyết khiếu nại</a></li>
                                <li><a  class="re__link-se">Góp ý báo lỗi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 pl-0 dp-md-none">
                        <div class="re__typo-expressive--md re__title">Quy Định</div>
                        <div class="re__list-menu--footer">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Quy định đăng tin</a></li>
                                <li><a  class="re__link-se">Quy chế hoạt động</a></li>
                                <li><a  class="re__link-se">Điều khoản thỏa thuận</a></li>
                                <li><a  class="re__link-se">Chính sách bảo mật</a></li>
                                <li><a  class="re__link-se">Giải quyết khiếu nại</a></li>
                                <li><a  class="re__link-se">Góp ý báo lỗi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="full-width dp-md-inline-block dp-md-lg-none" data-toggle="collapse"
                        data-target="#xemchinhanh"
                        style="border-bottom: 1px solid #ccc; padding-top: 12px; cursor: pointer;">
                        <div class="re__branch-show re__typo-expressive--md" style="font-weight: 500;">
                            <span style="">CHI NHÁNH Batdongsan.com.vn</span>
                        </div>
                        <i class="fa fa-chevron-right icon-abs" style="top: 6286px; width: 14px; right: 10px;"></i>

                        <div class="full-width dp-lg-inline-block collapse" id="xemchinhanh">
                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini"
                                style="display: block;">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh TP. Hồ Chí Minh</div>
                                    <div class="re__typo-body--sm">
                                        Tầng 9, tòa nhà Vĩnh Trung Plaza, số 255 – 257 Hùng Vương, phường Vĩnh Trung,
                                        quận Thanh Khê, TP. Đà Nẵng
                                        <br> Điện thoại: 0904 893 279 - 0904 946 163
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Đà Nẵng</div>
                                    <div class="re__typo-body--sm">
                                        Tầng 3, Tòa nhà Viettel Complex, 285 Cách Mạng Tháng Tám, Phường 12, Quận 10,
                                        TP. Hồ Chí Minh
                                        <br> Điện thoại: (0236) 3 666 968 - Mobile: 0904 907 279
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Nha Trang</div>
                                    <div class="re__typo-body--sm">
                                        Tầng 6, Tòa nhà CTCP Điện Lực Khánh Hòa, 11 Lý Thánh Tôn, Phường Vạn Thạnh, TP
                                        Nha Trang, Khánh Hòa
                                        <br> Điện thoại: (0258) 3 818 886 - Mobile: 0902 169 295
                                    </div>
                                </div>
                            </div>

                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Hải Phòng</div>
                                    <div class="re__typo-body--sm">
                                        Phòng 502, TD Business Center, lô 20A Lê Hồng Phong, Quận Ngô Quyền, TP.Hải
                                        Phòng
                                        <br> Điện thoại: (0225) 3 246 848 - Mobile: 0903 456 322
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Cần Thơ</div>
                                    <div class="re__typo-body--sm">
                                        Lầu 8, số 8 đường Phan Văn Trị, phường An Phú, quận Ninh Kiều, TP.Cần Thơ
                                        <br> Điện thoại: (0292) 3 837 838 - Mobile: 0902 229 697
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Vũng Tàu</div>
                                    <div class="re__typo-body--sm">
                                        Tầng 4, tòa nhà ACB, số 111 Hoàng Hoa Thám, phường 2, TP.Vũng Tàu, tỉnh Bà Rịa -
                                        Vũng Tàu
                                        <br> Điện thoại: (0254) 3 511 339 - Mobile: 0904 509 293
                                    </div>
                                </div>
                            </div>

                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Bình Dương</div>
                                    <div class="re__typo-body--sm">
                                        Phòng 10, tầng 16, Becamex Tower, số 230 Đại lộ Bình Dương, P.Phú Hòa, TP.Thủ
                                        Dầu Một, tỉnh Bình Dương
                                        <br> Điện thoại: (0274) 22 21 201, Mobile: 0919 255 580
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nhánh Đồng Nai</div>
                                    <div class="re__typo-body--sm">
                                        Lầu 18, tòa Pegasus, số 53-55 đường Võ Thị Sáu, phường Quyết Thắng, TP.Biên Hòa,
                                        tỉnh Đồng Nai
                                        <br> Điện thoại: 0906 282 428
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="re__branch-tablet-none"></div>
                    <div class="re__col--lg-6 p-0">
                        <div class="re__col--footer-mail ">
                            <div class="re__typo-expressive--md">ĐĂNG KÝ NHẬN TIN</div>
                            <div class="re__input--md re__input-btn-icon-right--md"
                                style="position: relative; width: 100%;">
                                <input type="text" name="email-footer" id="email-footer"
                                    placeholder="Nhập email của bạn">
                                <span class="re__input-close re__hidden-icon">
                                    <ion-icon name="add-outline" class="path1 icon"></ion-icon>
                                </span>
                                <i class="fal fa-paper-plane re__input-icon re__icon-send"
                                    id="newsletterRegister-footer"></i>
                            </div>
                        </div>
                        <div class="re__footer-international">
                            <div class="re__typo-expressive--md">QUỐC GIA & NGÔN NGỮ</div>
                            <div class="re__list-international">
                                <div class="re__select">
                                    <div class="re__select--sm" id="divLanguage">
                                        <span class="re__filter-label select-text">
                                            <ion-icon name="globe-outline" class="icon" style="font-size: 22px;">
                                            </ion-icon>
                                            <span class="select-text-content">Việt Nam</span>
                                            <i class="fas fa-chevron-down icon"
                                                style="position: absolute; top: 8px; font-weight: 200;"></i>
                                        </span>
                                    </div>
                                </div>
                                <a  class="re__btn re__re-btn-se-border--sm re__btn-icon-right-sm"
                                    type="button">
                                    <div class="en-icon">
                                        <div class="cross cross-1" style="--deg: 0;"></div>
                                        <div class="cross cross-2" style="--deg: 90deg;"></div>
                                        <div class="cross cross-3" style="--deg: -45deg;"></div>
                                        <div class="cross cross-4" style="--deg: 45deg;"></div>
                                    </div>
                                    <span style="color: #2c2c2c;">EN</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="re__link">

                </div>
            </div>
            <hr style="width: 100%; margin-bottom: 24px; clear: both;" class="dp-md-none">
            <div class="full-width d-inline-block dp-md-none">
                <div class="re__branch-show re__typo-expressive--md" style="font-weight: 400;"
                    onclick="seeMoreBranchesFn()">
                    <i class="fas fa-chevron-right" style="font-weight: 400; margin-right: 8px;"></i>
                    <span>Xem chi nhánh của Batdongsan.com.vn</span>
                </div>
                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh TP. Hồ Chí Minh</div>
                        <div class="re__typo-body--sm">
                            Tầng 9, tòa nhà Vĩnh Trung Plaza, số 255 – 257 Hùng Vương, phường Vĩnh Trung, quận Thanh
                            Khê, TP. Đà Nẵng
                            <br> Điện thoại: 0904 893 279 - 0904 946 163
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Đà Nẵng</div>
                        <div class="re__typo-body--sm">
                            Tầng 3, Tòa nhà Viettel Complex, 285 Cách Mạng Tháng Tám, Phường 12, Quận 10, TP. Hồ Chí
                            Minh
                            <br> Điện thoại: (0236) 3 666 968 - Mobile: 0904 907 279
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Nha Trang</div>
                        <div class="re__typo-body--sm">
                            Tầng 6, Tòa nhà CTCP Điện Lực Khánh Hòa, 11 Lý Thánh Tôn, Phường Vạn Thạnh, TP Nha Trang,
                            Khánh Hòa
                            <br> Điện thoại: (0258) 3 818 886 - Mobile: 0902 169 295
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Hải Phòng</div>
                        <div class="re__typo-body--sm">
                            Phòng 502, TD Business Center, lô 20A Lê Hồng Phong, Quận Ngô Quyền, TP.Hải Phòng
                            <br> Điện thoại: (0225) 3 246 848 - Mobile: 0903 456 322
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Cần Thơ</div>
                        <div class="re__typo-body--sm">
                            Lầu 8, số 8 đường Phan Văn Trị, phường An Phú, quận Ninh Kiều, TP.Cần Thơ
                            <br> Điện thoại: (0292) 3 837 838 - Mobile: 0902 229 697
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Vũng Tàu</div>
                        <div class="re__typo-body--sm">
                            Tầng 4, tòa nhà ACB, số 111 Hoàng Hoa Thám, phường 2, TP.Vũng Tàu, tỉnh Bà Rịa - Vũng Tàu
                            <br> Điện thoại: (0254) 3 511 339 - Mobile: 0904 509 293
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Bình Dương</div>
                        <div class="re__typo-body--sm">
                            Phòng 10, tầng 16, Becamex Tower, số 230 Đại lộ Bình Dương, P.Phú Hòa, TP.Thủ Dầu Một, tỉnh
                            Bình Dương
                            <br> Điện thoại: (0274) 22 21 201, Mobile: 0919 255 580
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nhánh Đồng Nai</div>
                        <div class="re__typo-body--sm">
                            Lầu 18, tòa Pegasus, số 53-55 đường Võ Thị Sáu, phường Quyết Thắng, TP.Biên Hòa, tỉnh Đồng
                            Nai
                            <br> Điện thoại: 0906 282 428
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 100%; margin-bottom: 24px;">
            <div class="d-inline-block re__bottom-footer re__border-tablet">
                <div class="re__col--lg-8 d-inline-block p-0">
                    <div class="re__typo-body--sm re__col--left">
                        <span class="re__typo-body--sm d-inline-block" style="margin-bottom: 8px;">Copyright © 2007 -
                            2022 Batdongsan.com.vn</span>
                        <br> Giấy ĐKKD số 0104630479 do Sở KHĐT TP Hà Nội cấp lần đầu ngày 02/06/2010
                        <br> Giấy phép ICP số 2399/GP-STTTT do Sở TTTT Hà Nội cấp ngày 4/9/2014
                        <br> Giấy phép GH ICP số 3832/GP-TTĐT do Sở TTTT Hà Nội cấp ngày 8/8/2019
                        <br> Giấy phép SĐ, BS GP ICP số 3833/GP-TTĐT do Sở TTTT Hà Nội cấp ngày 8/8/2019
                        <br> Giấy xác nhận số 1728/GXN-TTĐT do Sở TTTT Hà Nội cấp ngày 23/6/2020
                    </div>

                    <div class="re__typo-body--sm re__col--right">
                        Chịu trách nhiệm nội dung GP ICP: Bà Đặng Thị Hường
                        <br> Chịu trách nhiệm sàn GDTMĐT: Ông Vũ Triệu Vương
                        <br> Quy chế, quy định giao dịch có hiệu lực từ 23/02/2020
                        <br>Ghi rõ nguồn "Batdongsan.com.vn" khi phát hành lại thông tin từ website này.
                    </div>
                </div>
                <div class="re__col--lg-4" style="padding-top: 24px;">
                    <a ><img src="https://staticfile.batdongsan.com.vn/images/newhome/da-dang-ki-bct.svg"
                            class="bct"></a>
                    <div class="re__right-fix" style="padding-top: 5px;">
                        <a >
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a  rel="nofollow" target="_blank" style="top: -2px;">
                            <i class="fab fa-youtube-square"></i>
                        </a>
                        <a  rel="nofollow" target="_blank" style="top: 3px;"
                            onmouseover="this.getElementsByTagName('img')[0].src = './assets/images/zalo-color.PNG'"
                            onmouseout="this.getElementsByTagName('img')[0].src = './assets/images/zalo.PNG'">
                            <img src="./assets/images/zalo.PNG" width="34px" height="34px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- <script
        src="https://staticfile.batdongsan.com.vn/lib/jquery-mCustomScrollbar/css/jquery.mCustomScrollbar.min.css">
    </script> --}}
    <script>

    </script>
    <script src="./assets/js/owl.carousel.min.js"></script>

</body>
<script src="./assets/js/main.js "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>