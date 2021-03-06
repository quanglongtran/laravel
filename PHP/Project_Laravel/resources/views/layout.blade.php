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
                <h1 class="text">????ng k?? t??i kho???n</h1>
                <div class="close" onclick="closeRegisterForm()">&times;</div>
            </div>
            <form action="{{route('users.store')}}" method="POST" id="register" class="user-submit">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control-lg" placeholder="T??n ????ng nh???p *"
                        value="{{old('username')}}">
                    @error('username')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control-lg" placeholder="?????a ch??? email *"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group password">
                    <div>
                        <input type="text" name="password" class="form-control-lg" placeholder="M???t kh???u *"
                            value="{{old('password')}}" id="register-password">
                        @error('username')
                        <div class="text-danger">{{$password}}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="password_confirmation" class="form-control-lg"
                            placeholder="Nh???p l???i m???t kh???u *">
                        @error('password_confirmation')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group label">
                    <div>Th??ng tin c?? nh??n</div>
                </div>
                <div class="form-group">
                    <input type="text" name="fullname" class="form-control-lg" placeholder="T??n ?????y ????? *"
                        value="{{old('fullname')}}">
                    @error('fullname')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control-lg" placeholder="Ng??y sinh" id="register-birthday"
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
                        display-target="cities">T???nh/Th??nh</div>
                    <ul class="select-list" passive-target="cities" style="min-width: 370px;">
                        <li vl="0" class="advance-options current">T???nh/Th??nh</li>
                        <li vl="SG" class="advance-options">H??? Ch?? Minh</li>
                        <li vl="HN" class="advance-options">H?? N???i</li>
                        <li vl="DDN" class="advance-options">???? N???ng</li>
                        <li vl="BD" class="advance-options">B??nh D????ng</li>
                        <li vl="DNA" class="advance-options">?????ng Nai</li>
                        <li vl="KH" class="advance-options">Kh??nh H??a</li>
                        <li vl="HP" class="advance-options">H???i Ph??ng</li>
                        <li vl="LA" class="advance-options">Long An</li>
                        <li vl="QNA" class="advance-options">Qu???ng Nam</li>
                        <li vl="VT" class="advance-options">B?? R???a V??ng T??u</li>
                        <li vl="DDL" class="advance-options">?????k L???k</li>
                        <li vl="CT" class="advance-options">C???n Th??</li>
                        <li vl="BTH" class="advance-options">B??nh Thu???n </li>
                        <li vl="LDD" class="advance-options">L??m ?????ng</li>
                        <li vl="TTH" class="advance-options">Th???a Thi??n Hu???</li>
                        <li vl="KG" class="advance-options">Ki??n Giang</li>
                        <li vl="BN" class="advance-options">B???c Ninh</li>
                        <li vl="QNI" class="advance-options">Qu???ng Ninh</li>
                        <li vl="TH" class="advance-options">Thanh H??a</li>
                        <li vl="NA" class="advance-options">Ngh??? An</li>
                        <li vl="HD" class="advance-options">H???i D????ng</li>
                        <li vl="GL" class="advance-options">Gia Lai</li>
                        <li vl="BP" class="advance-options">B??nh Ph?????c</li>
                        <li vl="HY" class="advance-options">H??ng Y??n</li>
                        <li vl="BDD" class="advance-options">B??nh ?????nh</li>
                        <li vl="TG" class="advance-options">Ti???n Giang</li>
                        <li vl="TB" class="advance-options">Th??i B??nh</li>
                        <li vl="BG" class="advance-options">B???c Giang</li>
                        <li vl="HB" class="advance-options">H??a B??nh</li>
                        <li vl="AG" class="advance-options">An Giang</li>
                        <li vl="VP" class="advance-options">V??nh Ph??c</li>
                        <li vl="TNI" class="advance-options">T??y Ninh</li>
                        <li vl="TN" class="advance-options">Th??i Nguy??n</li>
                        <li vl="LCA" class="advance-options">L??o Cai</li>
                        <li vl="NDD" class="advance-options">Nam ?????nh</li>
                        <li vl="QNG" class="advance-options">Qu???ng Ng??i</li>
                        <li vl="BTR" class="advance-options">B???n Tre</li>
                        <li vl="DNO" class="advance-options">?????k N??ng</li>
                        <li vl="CM" class="advance-options">C?? Mau</li>
                        <li vl="VL" class="advance-options">V??nh Long</li>
                        <li vl="NB" class="advance-options">Ninh B??nh</li>
                        <li vl="PT" class="advance-options">Ph?? Th???</li>
                        <li vl="NT" class="advance-options">Ninh Thu???n</li>
                        <li vl="PY" class="advance-options">Ph?? Y??n</li>
                        <li vl="HNA" class="advance-options">H?? Nam</li>
                        <li vl="HT" class="advance-options">H?? T??nh</li>
                        <li vl="DDT" class="advance-options">?????ng Th??p</li>
                        <li vl="ST" class="advance-options">S??c Tr??ng</li>
                        <li vl="KT" class="advance-options">Kon Tum</li>
                        <li vl="QB" class="advance-options">Qu???ng B??nh</li>
                        <li vl="QT" class="advance-options">Qu???ng Tr???</li>
                        <li vl="TV" class="advance-options">Tr?? Vinh</li>
                        <li vl="HGI" class="advance-options">H???u Giang</li>
                        <li vl="SL" class="advance-options">S??n La</li>
                        <li vl="BL" class="advance-options">B???c Li??u</li>
                        <li vl="YB" class="advance-options">Y??n B??i</li>
                        <li vl="TQ" class="advance-options">Tuy??n Quang</li>
                        <li vl="DDB" class="advance-options">??i???n Bi??n</li>
                        <li vl="LCH" class="advance-options">Lai Ch??u</li>
                        <li vl="LS" class="advance-options">L???ng S??n</li>
                        <li vl="HG" class="advance-options">H?? Giang</li>
                        <li vl="BK" class="advance-options">B???c K???n</li>
                        <li vl="CB" class="advance-options">Cao B???ng</li>
                    </ul>
                </div>
                <div class="form-group">
                    <div class="select form-control-lg" id="register-district" data-type="show"
                        control-target="district" display-target="district">Qu???n/Huy???n</div>
                    @include('blocks.district')
                </div>
                <div class="form-group">
                    <div class="select form-control-lg" id="register-ward" data-type="show" control-target="ward"
                        display-target="ward">Ph?????ng/X??</div>
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
                        <span>N???</span>
                    </label>
                </div>
                <div class="form-group label">B???n l???</div>
                <div class="form-group">
                    <label class="gender">
                        <input type="radio" name="account_type" value="personal" checked>
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>C?? nh??n</span>
                    </label>
                    <label class="gender">
                        <input type="radio" name="account_type" value="enterprise">
                        <i class="fa-light fa-circle-dot">
                            <div class="dot"></div>
                        </i>
                        <span>C??ng ty</span>
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" name="identity_number" class="form-control-lg"
                        placeholder="M?? s??? thu??? c?? nh??n/ CMND *" value="{{old('identity_number')}}"
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
                    T??i ?????ng ?? v???i c??c ??i???u kho???n, ??i???u ki???n, & ch??nh s??ch c???a Batdongsan.com.vn
                </label>

                <div class="form-group">
                    <input type="submit" value="????ng k??" class="submit form-control-lg">
                </div>
                <div class="form-group note">
                    <strong>Ch?? ??:</strong>
                    <span>Th??ng tin t??n ????ng nh???p, email kh??ng th??? thay ?????i sau khi ????ng k??.</span>
                    <p>????? ???????c tr??? gi??p, vui l??ng li??n h??? t???ng ????i CSKH <a href="tel:1900 1881">1900 1881</a> ho???c email
                        <a href="mailto:hotro@batdongsan.com.vn">hotro@batdongsan.com.vn</a>
                    </p>
                </div>
                <div class="form-group footer">
                    ???? l?? th??nh vi??n? <span class="go-to-login" onclick="goToLogin()">????ng nh???p</span> t???i ????y
                </div>
            </form>
        </div>
    </div>

    @if(session('msg'))
    <div class="popup text-center d-flex">
        <div class="popup-body">
            <span class="alert alert-success">Th??m ng?????i d??ng th??nh c??ng</span>
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
                <h1 class="text">????ng nh???p</h1>
                <div class="close" onclick="closeLoginForm()">&times;</div>
            </div>
            <form action="{{route('user.login')}}" method="POST" id="login" class="user-submit">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control-lg" placeholder="T??n ????ng nh???p *"
                        value="{{Cookie::get('username')}}">
                </div>
                <div class="form-group password">
                    <input type="text" name="password" class="form-control-lg" placeholder="M???t kh???u *"
                        value="{{Cookie::get('password')}}">
                </div>
                <div class="form-group submit">
                    <input type="submit" value="????ng nh???p" class="submit form-control-lg">
                </div>
                <div class="form-group">
                    <input type="checkbox" checked="{{Cookie::get('checked')}}" id="login-remember-me" name="remember">
                    <label class="form-group remember-me-label" for="login-remember-me">
                        <i class="fa-regular fa-square"></i>
                        <i class="fa-solid fa-square-check"></i>
                        Nh??? t??i kho???n
                    </label>
                    <div class="forgot-password">Qu??n m???t kh???u?</div>
                </div>
                <div class="form-group login-social-title">Ho???c</div>
                <div class="form-group login-by">
                    <div class="form-control-lg"><i class="icon fa-brands fa-facebook-f"></i> Facebook</div>
                    <div class="form-control-lg"><i class="icon fa-brands fa-google"></i> Google</div>
                </div>
                <div class="form-group footer">
                    Ch??a l?? th??nh vi??n? <span class="go-to-login" onclick="goToRegister()">????ng k??</span> t???i ????y
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

                <div class="re__typo-expressive">C??NG TY C??? PH???N PROPERTYGURU VI???T NAM</div>
                <div class="d-flex re__address">
                    <ion-icon name="location-outline"></ion-icon>
                    <div class="re__typo-expressive">T???ng 31, Keangnam Hanoi Landmark, Ph???m H??ng, Nam T??? Li??m, H?? N???i
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
                            <span class="re__typo-body--sm">H??? tr??? kh??ch h??ng</span>
                            <span class="re__typo-heading--xs">hotro@batdongsan.com.vn</span>
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-5">
                    <div class="re__hotline mgt-lg-0">
                        <i class="fal fa-headphones"></i>
                        <div class="re__right">
                            <span class="re__typo-body--sm">Ch??m s??c kh??ch h??ng</span>
                            <span class="re__typo-heading--xs">cskh@batdongsan.com.vn </span>
                        </div>
                    </div>
                </div>

                <div class="re__link re__link-tablet">
                    <div class="re__col--lg-3 p-0 dp-md-lg-none">
                        <div class="re__typo-expressive--md re__title" data-toggle="collapse" data-target="#huongdan">
                            H?????NG D???N
                            <i class="fa fa-chevron-right icon-abs"></i>
                        </div>
                        <div class="re__list-menu--footer collapse" id="huongdan">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">B??o gi?? & h??? tr???</a></li>
                                <li><a  class="re__link-se">C??u h???i th?????ng g???p</a></li>
                                <li><a  class="re__link-se">Th??ng b??o</a></li>
                                <li><a  class="re__link-se">Li??n h???</a></li>
                                <li><a  class="re__link-se">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 p-0 dp-md-none">
                        <div class="re__typo-expressive--md re__title">H?????NG D???N</div>
                        <div class="re__list-menu--footer">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">B??o gi?? & h??? tr???</a></li>
                                <li><a  class="re__link-se">C??u h???i th?????ng g???p</a></li>
                                <li><a  class="re__link-se">Th??ng b??o</a></li>
                                <li><a  class="re__link-se">Li??n h???</a></li>
                                <li><a  class="re__link-se">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 pl-0 dp-md-lg-none">
                        <div class="re__typo-expressive--md re__title" data-toggle="collapse" data-target="#quydinh">Quy
                            ?????nh
                            <i class="fa fa-chevron-right icon-abs"></i>
                        </div>
                        <div class="re__list-menu--footer collapse" id="quydinh">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Quy ?????nh ????ng tin</a></li>
                                <li><a  class="re__link-se">Quy ch??? ho???t ?????ng</a></li>
                                <li><a  class="re__link-se">??i???u kho???n th???a thu???n</a></li>
                                <li><a  class="re__link-se">Ch??nh s??ch b???o m???t</a></li>
                                <li><a  class="re__link-se">Gi???i quy???t khi???u n???i</a></li>
                                <li><a  class="re__link-se">G??p ?? b??o l???i</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="re__col--lg-3 pl-0 dp-md-none">
                        <div class="re__typo-expressive--md re__title">Quy ?????nh</div>
                        <div class="re__list-menu--footer">
                            <ul class="pl-0" style="margin-top: 12px;">
                                <li><a  class="re__link-se">Quy ?????nh ????ng tin</a></li>
                                <li><a  class="re__link-se">Quy ch??? ho???t ?????ng</a></li>
                                <li><a  class="re__link-se">??i???u kho???n th???a thu???n</a></li>
                                <li><a  class="re__link-se">Ch??nh s??ch b???o m???t</a></li>
                                <li><a  class="re__link-se">Gi???i quy???t khi???u n???i</a></li>
                                <li><a  class="re__link-se">G??p ?? b??o l???i</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="full-width dp-md-inline-block dp-md-lg-none" data-toggle="collapse"
                        data-target="#xemchinhanh"
                        style="border-bottom: 1px solid #ccc; padding-top: 12px; cursor: pointer;">
                        <div class="re__branch-show re__typo-expressive--md" style="font-weight: 500;">
                            <span style="">CHI NH??NH Batdongsan.com.vn</span>
                        </div>
                        <i class="fa fa-chevron-right icon-abs" style="top: 6286px; width: 14px; right: 10px;"></i>

                        <div class="full-width dp-lg-inline-block collapse" id="xemchinhanh">
                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini"
                                style="display: block;">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh TP. H??? Ch?? Minh</div>
                                    <div class="re__typo-body--sm">
                                        T???ng 9, t??a nh?? V??nh Trung Plaza, s??? 255 ??? 257 H??ng V????ng, ph?????ng V??nh Trung,
                                        qu???n Thanh Kh??, TP. ???? N???ng
                                        <br> ??i???n tho???i: 0904 893 279 - 0904 946 163
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh ???? N???ng</div>
                                    <div class="re__typo-body--sm">
                                        T???ng 3, T??a nh?? Viettel Complex, 285 C??ch M???ng Th??ng T??m, Ph?????ng 12, Qu???n 10,
                                        TP. H??? Ch?? Minh
                                        <br> ??i???n tho???i: (0236) 3 666 968 - Mobile: 0904 907 279
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh Nha Trang</div>
                                    <div class="re__typo-body--sm">
                                        T???ng 6, T??a nh?? CTCP ??i???n L???c Kh??nh H??a, 11 L?? Th??nh T??n, Ph?????ng V???n Th???nh, TP
                                        Nha Trang, Kh??nh H??a
                                        <br> ??i???n tho???i: (0258) 3 818 886 - Mobile: 0902 169 295
                                    </div>
                                </div>
                            </div>

                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh H???i Ph??ng</div>
                                    <div class="re__typo-body--sm">
                                        Ph??ng 502, TD Business Center, l?? 20A L?? H???ng Phong, Qu???n Ng?? Quy???n, TP.H???i
                                        Ph??ng
                                        <br> ??i???n tho???i: (0225) 3 246 848 - Mobile: 0903 456 322
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh C???n Th??</div>
                                    <div class="re__typo-body--sm">
                                        L???u 8, s??? 8 ???????ng Phan V??n Tr???, ph?????ng An Ph??, qu???n Ninh Ki???u, TP.C???n Th??
                                        <br> ??i???n tho???i: (0292) 3 837 838 - Mobile: 0902 229 697
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh V??ng T??u</div>
                                    <div class="re__typo-body--sm">
                                        T???ng 4, t??a nh?? ACB, s??? 111 Ho??ng Hoa Th??m, ph?????ng 2, TP.V??ng T??u, t???nh B?? R???a -
                                        V??ng T??u
                                        <br> ??i???n tho???i: (0254) 3 511 339 - Mobile: 0904 509 293
                                    </div>
                                </div>
                            </div>

                            <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches float-md-ini">
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh B??nh D????ng</div>
                                    <div class="re__typo-body--sm">
                                        Ph??ng 10, t???ng 16, Becamex Tower, s??? 230 ?????i l??? B??nh D????ng, P.Ph?? H??a, TP.Th???
                                        D???u M???t, t???nh B??nh D????ng
                                        <br> ??i???n tho???i: (0274) 22 21 201, Mobile: 0919 255 580
                                    </div>
                                </div>
                                <div class="re__branch" style="padding-left: 8px;">
                                    <div class="re__typo-expressive--sm">Chi nh??nh ?????ng Nai</div>
                                    <div class="re__typo-body--sm">
                                        L???u 18, t??a Pegasus, s??? 53-55 ???????ng V?? Th??? S??u, ph?????ng Quy???t Th???ng, TP.Bi??n H??a,
                                        t???nh ?????ng Nai
                                        <br> ??i???n tho???i: 0906 282 428
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="re__branch-tablet-none"></div>
                    <div class="re__col--lg-6 p-0">
                        <div class="re__col--footer-mail ">
                            <div class="re__typo-expressive--md">????NG K?? NH???N TIN</div>
                            <div class="re__input--md re__input-btn-icon-right--md"
                                style="position: relative; width: 100%;">
                                <input type="text" name="email-footer" id="email-footer"
                                    placeholder="Nh???p email c???a b???n">
                                <span class="re__input-close re__hidden-icon">
                                    <ion-icon name="add-outline" class="path1 icon"></ion-icon>
                                </span>
                                <i class="fal fa-paper-plane re__input-icon re__icon-send"
                                    id="newsletterRegister-footer"></i>
                            </div>
                        </div>
                        <div class="re__footer-international">
                            <div class="re__typo-expressive--md">QU???C GIA & NG??N NG???</div>
                            <div class="re__list-international">
                                <div class="re__select">
                                    <div class="re__select--sm" id="divLanguage">
                                        <span class="re__filter-label select-text">
                                            <ion-icon name="globe-outline" class="icon" style="font-size: 22px;">
                                            </ion-icon>
                                            <span class="select-text-content">Vi???t Nam</span>
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
                    <span>Xem chi nh??nh c???a Batdongsan.com.vn</span>
                </div>
                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh TP. H??? Ch?? Minh</div>
                        <div class="re__typo-body--sm">
                            T???ng 9, t??a nh?? V??nh Trung Plaza, s??? 255 ??? 257 H??ng V????ng, ph?????ng V??nh Trung, qu???n Thanh
                            Kh??, TP. ???? N???ng
                            <br> ??i???n tho???i: 0904 893 279 - 0904 946 163
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh ???? N???ng</div>
                        <div class="re__typo-body--sm">
                            T???ng 3, T??a nh?? Viettel Complex, 285 C??ch M???ng Th??ng T??m, Ph?????ng 12, Qu???n 10, TP. H??? Ch??
                            Minh
                            <br> ??i???n tho???i: (0236) 3 666 968 - Mobile: 0904 907 279
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh Nha Trang</div>
                        <div class="re__typo-body--sm">
                            T???ng 6, T??a nh?? CTCP ??i???n L???c Kh??nh H??a, 11 L?? Th??nh T??n, Ph?????ng V???n Th???nh, TP Nha Trang,
                            Kh??nh H??a
                            <br> ??i???n tho???i: (0258) 3 818 886 - Mobile: 0902 169 295
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh H???i Ph??ng</div>
                        <div class="re__typo-body--sm">
                            Ph??ng 502, TD Business Center, l?? 20A L?? H???ng Phong, Qu???n Ng?? Quy???n, TP.H???i Ph??ng
                            <br> ??i???n tho???i: (0225) 3 246 848 - Mobile: 0903 456 322
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh C???n Th??</div>
                        <div class="re__typo-body--sm">
                            L???u 8, s??? 8 ???????ng Phan V??n Tr???, ph?????ng An Ph??, qu???n Ninh Ki???u, TP.C???n Th??
                            <br> ??i???n tho???i: (0292) 3 837 838 - Mobile: 0902 229 697
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh V??ng T??u</div>
                        <div class="re__typo-body--sm">
                            T???ng 4, t??a nh?? ACB, s??? 111 Ho??ng Hoa Th??m, ph?????ng 2, TP.V??ng T??u, t???nh B?? R???a - V??ng T??u
                            <br> ??i???n tho???i: (0254) 3 511 339 - Mobile: 0904 509 293
                        </div>
                    </div>
                </div>

                <div class="re__col--lg-4 overflow-hidden pl-0 seeMoreBranches slideUp">
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh B??nh D????ng</div>
                        <div class="re__typo-body--sm">
                            Ph??ng 10, t???ng 16, Becamex Tower, s??? 230 ?????i l??? B??nh D????ng, P.Ph?? H??a, TP.Th??? D???u M???t, t???nh
                            B??nh D????ng
                            <br> ??i???n tho???i: (0274) 22 21 201, Mobile: 0919 255 580
                        </div>
                    </div>
                    <div class="re__branch" style="padding-left: 8px;">
                        <div class="re__typo-expressive--sm">Chi nh??nh ?????ng Nai</div>
                        <div class="re__typo-body--sm">
                            L???u 18, t??a Pegasus, s??? 53-55 ???????ng V?? Th??? S??u, ph?????ng Quy???t Th???ng, TP.Bi??n H??a, t???nh ?????ng
                            Nai
                            <br> ??i???n tho???i: 0906 282 428
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 100%; margin-bottom: 24px;">
            <div class="d-inline-block re__bottom-footer re__border-tablet">
                <div class="re__col--lg-8 d-inline-block p-0">
                    <div class="re__typo-body--sm re__col--left">
                        <span class="re__typo-body--sm d-inline-block" style="margin-bottom: 8px;">Copyright ?? 2007 -
                            2022 Batdongsan.com.vn</span>
                        <br> Gi???y ??KKD s??? 0104630479 do S??? KH??T TP H?? N???i c???p l???n ?????u ng??y 02/06/2010
                        <br> Gi???y ph??p ICP s??? 2399/GP-STTTT do S??? TTTT H?? N???i c???p ng??y 4/9/2014
                        <br> Gi???y ph??p GH ICP s??? 3832/GP-TT??T do S??? TTTT H?? N???i c???p ng??y 8/8/2019
                        <br> Gi???y ph??p S??, BS GP ICP s??? 3833/GP-TT??T do S??? TTTT H?? N???i c???p ng??y 8/8/2019
                        <br> Gi???y x??c nh???n s??? 1728/GXN-TT??T do S??? TTTT H?? N???i c???p ng??y 23/6/2020
                    </div>

                    <div class="re__typo-body--sm re__col--right">
                        Ch???u tr??ch nhi???m n???i dung GP ICP: B?? ?????ng Th??? H?????ng
                        <br> Ch???u tr??ch nhi???m s??n GDTM??T: ??ng V?? Tri???u V????ng
                        <br> Quy ch???, quy ?????nh giao d???ch c?? hi???u l???c t??? 23/02/2020
                        <br>Ghi r?? ngu???n "Batdongsan.com.vn" khi ph??t h??nh l???i th??ng tin t??? website n??y.
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