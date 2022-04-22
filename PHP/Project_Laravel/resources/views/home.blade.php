@extends('layout')
@section('title')
Website số 1 về bất động sản – Mua, bán, cho thuê nhà đất toàn quốc
@endsection

@section('content')

<div class="banner">
    <div style="background-image: url(./assets/images/banner.png); width: 100%; height: 400px; position: relative;" class="banner-background">
        <!-- <div class="col-sm-9 offset-lg-4"> -->
        <div class="tabs">
            <ul class="nav-tabs">
                <li class="active" data-tab-target="#tab1"><a>Nhà đất bán</a></li>
                <li data-tab-target="#tab2"><a>Nhà đất cho thuê</a></li>
                <li data-tab-target="#tab3"><a>Dự án</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab-content-item active">
                    <form class="search-group" method="post" action="#">
                        <div style="display: flex; width: 100%;">
                            <div class="select">
                                <p class="content-display"></p>
                            </div>

                            <ul class="content-list">
                                <li class="content-item">
                                    <span class="icon" style="--pos: 0;">
                                                <i class="far fa-house"></i>
                                            </span> <span class="text" style="--pos: 15px;">Tất cả nhà đất</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon" style="--pos: 0;">
                                                <i class="fas fa-house-building"></i>
                                                <i class="fa-solid fa-house-building"></i>
                                            </span>
                                    <span class="text" style="--pos: 15px;">Căn hộ chung cư</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-chimney-user"></i>
                                            </span>
                                    <span class="text">Các loại nhà bán</span>
                                    <!-- <ul> -->
                                    <li class="content-item child">Nhà riêng</li>
                                    <li class="content-item child">Nhà biệt thự, liền kề</li>
                                    <li class="content-item child">Nhà mặt phố</li>
                                    <li class="content-item child">Shophouse, nhà phố thương mại</li>
                                    <!-- </ul> -->
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Các loại đất bán</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-farm"></i>
                                            </span>
                                    <span class="text">Trang trại, khu nghỉ dưỡng</span>
                                    <li class="content-item child">Condotel</li>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Kho, nhà xưởng</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Bất động sản khác</span>
                                </li>
                            </ul>
                            <input type="text" class="search-input">
                            <button class="btn-submit d-flex justify-content-between align-items-center">
                                        <i class="fal fa-search" style="margin-right: 11px;"></i>Tìm kiếm
                                    </button>
                        </div>

                        <div class="filter">
                            <div style="display: flex; flex-wrap: wrap;" class="filter-left">
                                <input type="checkbox" id="tab1_filter_input_group-line_2" class="checkbox-toggle">
                                <div class="filter-input-group left line-1">
                                    <input type="text" class="filter-input" placeholder="Trên toàn quốc">
                                    <span></span>
                                </div>

                                <div class="filter-input-group mr-md-0" style="margin-right: 8px;">
                                    <span class="filter-input price-display">
                                    <span class="price-display-from"></span>
                                    <span class="dash price-dash">Mức giá</span>
                                    <span class="price-display-to"></span>
                                    <span class="angle-down">&#8735;</span>
                                    </span>

                                    <div class="option price-option">
                                        <div class="custom-slider">
                                            <div style="display: flex; justify-content: space-evenly; padding-top: 15px;">
                                                <input type="text" class="option-input price-option-input-1" placeholder="Từ" autocomplete="off" max="" min="0">
                                                <span class="icon fal fa-arrow-right"></span>
                                                <input type="number" class="option-input price-option-input-2" placeholder="Đến" autocomplete="off" max="" min="0">
                                            </div>

                                            <div class="range">
                                                <input type="range" class="range-input price-range-1" min="0" max="20000" value="0" step="100">
                                                <input type="range" class="range-input price-range-2" min="0" max="20000" value="200000" step="100">
                                            </div>
                                        </div>
                                        <ul class="advance-option-list price-advance-option-list">
                                            <li class="advance-option-item">Tất cả mức giá</li>
                                            <li class="advance-option-item">Thỏa thuận</li>
                                            <li class="advance-option-item">
                                                < 500 triệu</li>
                                                    <li class="advance-option-item">500 - 800 triệu</li>
                                                    <li class="advance-option-item">800 triệu - 1 tỷ</li>
                                                    <li class="advance-option-item">1 - 2 tỷ</li>
                                                    <li class="advance-option-item">2 - 3 tỷ</li>
                                                    <li class="advance-option-item">3 - 5 tỷ</li>
                                                    <li class="advance-option-item">5 - 7 tỷ</li>
                                                    <li class="advance-option-item">7 - 10 tỷ</li>
                                                    <li class="advance-option-item">10 - 20 tỷ</li>
                                                    <li class="advance-option-item">20 - 30 tỷ</li>
                                                    <li class="advance-option-item">&#8805; 30 tỷ</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="filter-input-group left line mg-md-8" style="margin-right: 8px;">
                                    <span class="filter-input acreage-display">
                                    <span class="acreage-display-from"></span>
                                    <span class="dash acreage-dash">Diện tích</span>
                                    <span class="acreage-display-to"></span>
                                    <span class="angle-down">&#8735;</span>
                                    </span>

                                    <div class="option acreage-option">
                                        <div class="custom-slider">
                                            <div style="display: flex; justify-content: space-evenly; padding-top: 15px;">
                                                <input type="number" class="option-input acreage-option-input-1" placeholder="Từ" autocomplete="off" min="0" maxlength="6">
                                                <span class="icon fal fa-arrow-right"></span>
                                                <input type="number" class="option-input acreage-option-input-2" placeholder="Đến" autocomplete="off" min="0" maxlength="6">
                                            </div>

                                            <div class="range">
                                                <input type="range" class="range-input acreage-range-1" min="0" max="500" step="5" value="0">
                                                <input type="range" class="range-input acreage-range-2" min="0" max="500" step="5" value="500">
                                            </div>

                                            <ul class="advance-option-list acreage-advance-option-list">
                                                <li class="advance-option-item">Tất cả diện tích</li>
                                                <li class="advance-option-item">≤ 30m²</li>
                                                <li class="advance-option-item">30 - 35m²</li>
                                                <li class="advance-option-item">50 - 80m²</li>
                                                <li class="advance-option-item">80 - 100m²</li>
                                                <li class="advance-option-item">100 - 150m²</li>
                                                <li class="advance-option-item">150 - 200m²</li>
                                                <li class="advance-option-item">200 - 250m²</li>
                                                <li class="advance-option-item">250 - 300m²</li>
                                                <li class="advance-option-item">300 - 500m²</li>
                                                <li class="advance-option-item">> 500 m²</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="filter-input-group mg-md-8 ml-md-0 " style="margin-left: 8px;">
                                    <input type="text" class="filter-input" placeholder="Dự án">
                                    <span></span>
                                </div>

                                <div class="filter-input-group line-2 ml-md-0 mr-md-0" style="margin-right: 8px;">
                                    <input type="text" class="filter-input" placeholder="Phường/Xã">
                                </div>

                                <div class="filter-input-group line-2" style="margin-right: 8px;">
                                    <input type="text" class="filter-input" placeholder="Đường/Phố">
                                </div>

                                <div class="filter-input-group line-2 ml-md-0">
                                    <input type="text" class="filter-input" placeholder="Số phòng ngủ">
                                </div>

                                <div class="filter-input-group line-2" style="margin-left: 8px;">
                                    <input type="text" class="filter-input" placeholder="Hướng nhà">
                                </div>
                            </div>

                            <div style="display: flex; margin-left: 5px;" class="more-option">
                                <label for="tab1_filter_input_group-line_2" class="filter-more">
                                    <span class="filter-more-text">Mở rộng</span> 
                                    <span class="angle-down">&#8735;</span>
                                </label>
                                <div class="separate"></div>
                                <div class="refresh">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="tab2" class="tab-content-item">
                    <form class="search-group" method="post" action="#">
                        <div style="display: flex; width: 100%;">
                            <div class="select">
                                <p class="content-display"></p>
                            </div>

                            <ul class="content-list">
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="far fa-house"></i>
                                            </span> <span class="text">Tất cả nhà đất</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-building"></i>
                                                <i class="fa-solid fa-house-building"></i>
                                            </span>
                                    <span class="text">Căn hộ chung cư</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-building"></i>
                                                <i class="fa-solid fa-house-building"></i>
                                            </span>
                                    <span class="text">Nhà riêng</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-building"></i>
                                                <i class="fa-solid fa-house-building"></i>
                                            </span>
                                    <span class="text">Nhà biệt thự, liền kề</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-building"></i>
                                                <i class="fa-solid fa-house-building"></i>
                                            </span>
                                    <span class="text">Nhà mặt phố</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-house-chimney-user"></i>
                                            </span>
                                    <span class="text">Shophouse, nhà phố thương mại</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Nhà trọ, phòng trọ</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fas fa-farm"></i>
                                            </span>
                                    <span class="text">Văn phòng</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Cửa hàng ki ốt</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Kho, nhà xưởng, đất</span>
                                </li>
                                <li class="content-item">
                                    <span class="icon">
                                                <i class="fal fa-land-map"></i>
                                            </span>
                                    <span class="text">Bất động sản khác</span>
                                </li>
                            </ul>
                            <input type="text" class="search-input">
                            <button class="btn-submit d-flex justify-content-between align-items-center">
                                        <i class="fal fa-search" style="margin-right: 11px;"></i>Tìm kiếm
                                    </button>
                        </div>

                        <div class="filter">
                            <div style="display: flex;" class="filter-left">
                                <div class="filter-input-group line-1 left">
                                    <input type="text" class="filter-input" placeholder="Trên toàn quốc">
                                    <span></span>
                                </div>

                                <div class="filter-input-group mr-md-0" style="margin-right: 8px;">
                                    <span class="filter-input price-display">
                                    <span class="price-display-from"></span>
                                    <span class="dash price-dash">Mức giá</span>
                                    <span class="price-display-to"></span>
                                    <span class="angle-down">&#8735;</span>
                                    </span>

                                    <div class="option price-option">
                                        <div class="custom-slider">
                                            <div style="display: flex; justify-content: space-evenly; padding-top: 15px;">
                                                <input type="text" class="option-input price-option-input-1" placeholder="Từ" autocomplete="off" max="" min="0">
                                                <span class="icon fal fa-arrow-right"></span>
                                                <input type="number" class="option-input price-option-input-2" placeholder="Đến" autocomplete="off" max="" min="0">
                                            </div>

                                            <div class="range">
                                                <input type="range" class="range-input price-range-1" min="0" max="20000" value="0" step="100">
                                                <input type="range" class="range-input price-range-2" min="0" max="20000" value="200000" step="100">
                                            </div>
                                        </div>
                                        <ul class="advance-option-list price-advance-option-list">
                                            <li class="advance-option-item">Tất cả mức giá</li>
                                            <li class="advance-option-item">Thỏa thuận</li>
                                            <li class="advance-option-item">
                                                <i class="fas fa-angle-left"></i> 500 triệu
                                            </li>
                                            <li class="advance-option-item">500 - 800 triệu</li>
                                            <li class="advance-option-item">800 triệu - 1 tỷ</li>
                                            <li class="advance-option-item">1 - 2 tỷ</li>
                                            <li class="advance-option-item">2 - 3 tỷ</li>
                                            <li class="advance-option-item">3 - 5 tỷ</li>
                                            <li class="advance-option-item">5 - 7 tỷ</li>
                                            <li class="advance-option-item">7 - 10 tỷ</li>
                                            <li class="advance-option-item">10 - 20 tỷ</li>
                                            <li class="advance-option-item">20 - 30 tỷ</li>
                                            <li class="advance-option-item">&#8805; 30 tỷ</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mg-md-8 filter-input-group line-1 left">
                                    <div>
                                        <span class="filter-input acreage-display">
                                                    <span class="acreage-display-from"></span>
                                        <span class="dash acreage-dash">Diện tích</span>
                                        <span class="acreage-display-to"></span>
                                        <span class="angle-down">&#8735;</span>
                                        </span>

                                        <div class="option acreage-option">
                                            <div class="custom-slider">
                                                <div style="display: flex; justify-content: space-evenly; padding-top: 15px;">
                                                    <input type="number" class="option-input acreage-option-input-1" placeholder="Từ" autocomplete="off" min="0" maxlength="6">
                                                    <span class="icon fal fa-arrow-right"></span>
                                                    <input type="number" class="option-input acreage-option-input-2" placeholder="Đến" autocomplete="off" min="0" maxlength="6">
                                                </div>

                                                <div class="range">
                                                    <input type="range" class="range-input acreage-range-1" min="0" max="500" step="5" value="0">
                                                    <input type="range" class="range-input acreage-range-2" min="0" max="500" step="5" value="500">
                                                </div>

                                                <ul class="advance-option-list acreage-advance-option-list">
                                                    <li class="advance-option-item">Tất cả diện tích</li>
                                                    <li class="advance-option-item">≤ 30m²</li>
                                                    <li class="advance-option-item">30 - 35m²</li>
                                                    <li class="advance-option-item">50 - 80m²</li>
                                                    <li class="advance-option-item">80 - 100m²</li>
                                                    <li class="advance-option-item">100 - 150m²</li>
                                                    <li class="advance-option-item">150 - 200m²</li>
                                                    <li class="advance-option-item">200 - 250m²</li>
                                                    <li class="advance-option-item">250 - 300m²</li>
                                                    <li class="advance-option-item">300 - 500m²</li>
                                                    <li class="advance-option-item">> 500 m²</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mg-md-8 filter-input-group">
                                    <input type=" text " class="filter-input " placeholder="Dự án ">
                                    <span></span>
                                </div>

                                <div class="filter-input-group line-2 ml-md-0 mr-lg-8">
                                    <input type="text" class="filter-input " placeholder="Phường/Xã ">
                                </div>

                                <div class="filter-input-group line-2 mr-lg-8">
                                    <input type="text" class="filter-input " placeholder="Đường/Phố ">
                                </div>

                                <div class="filter-input-group line-2 mr-lg-8">
                                    <input type="text" class="filter-input " placeholder="Số phòng ngủ ">
                                </div>

                                <div class="filter-input-group line-2 ">
                                    <input type="text" class="filter-input " placeholder="Hướng nhà ">
                                </div>

                            </div>

                            <div style="display: flex; margin-left: 5px; " class="more-option ">
                                <div class="filter-more ">Mở rộng <span class="angle-down ">&#8735;</span>
                                </div>
                                <div class="separate "></div>
                                <div class="refresh ">
                                    <i class="fas fa-sync-alt "></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="tab3" class="tab-content-item">
                    <form class="search-group " method="post " action="# ">
                        <div style="display: flex; width: 100%; ">
                            <div class="select ">
                                <p class="content-display "></p>
                            </div>

                            <ul class="content-list ">
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="far fa-house "></i>
                                            </span> <span class="text ">Tất cả dự án</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-house-building "></i>
                                                <i class="fa-solid fa-house-building "></i>
                                            </span>
                                    <span class="text ">Căn hộ, Chung cư</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-house-building "></i>
                                                <i class="fa-solid fa-house-building "></i>
                                            </span>
                                    <span class="text ">Cao ốc văn phòng</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-house-building "></i>
                                                <i class="fa-solid fa-house-building "></i>
                                            </span>
                                    <span class="text ">Trung tâm thương mại</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-house-building "></i>
                                                <i class="fa-solid fa-house-building "></i>
                                            </span>
                                    <span class="text ">Khu đô thị mới</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-house-chimney-user "></i>
                                            </span>
                                    <span class="text ">Khu phức tạp</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fal fa-land-map "></i>
                                            </span>
                                    <span class="text ">Nhà ở xã hội</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fas fa-farm "></i>
                                            </span>
                                    <span class="text ">Khu nghỉ dưỡng, Sinh thái</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fal fa-land-map "></i>
                                            </span>
                                    <span class="text ">Khu công nghiệp</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fal fa-land-map "></i>
                                            </span>
                                    <span class="text ">Dự án khác</span>
                                </li>
                                <li class="content-item ">
                                    <span class="icon ">
                                                <i class="fal fa-land-map "></i>
                                            </span>
                                    <span class="text ">Biệt thự liền kề</span>
                                </li>
                            </ul>
                            <input type="text" class="search-input ">
                            <button class="btn-submit d-flex justify-content-between align-items-center ">
                                        <i class="fal fa-search " style="margin-right: 11px; "></i>Tìm kiếm
                                    </button>
                        </div>

                        <div class="filter ">
                            <div style="display: flex; " class="filter-left ">
                                <div class="filter-input-group line-1 left">
                                    <input type="text" class="filter-input " placeholder="Trên toàn quốc ">
                                    <span></span>
                                </div>

                                <div class="filter-input-group mr-md-0" style="display: flex;">
                                    <span class="filter-input price-display ">
                                                <span class="price-display-from "></span>
                                    <span class="dash price-dash ">Mức giá</span>
                                    <span class="price-display-to "></span>
                                    <span class="angle-down ">&#8735;</span>
                                    </span>

                                    <div class="option price-option ">
                                        <div class="custom-slider ">
                                            <div style="display: flex; justify-content: space-evenly; padding-top: 15px; ">
                                                <input type="text" class="option-input price-option-input-1" placeholder="Từ" autocomplete="off" min="0">
                                                <span class="icon fal fa-arrow-right "></span>
                                                <input type="number" class="option-input price-option-input-2" placeholder="Đến" autocomplete="off" min="0">
                                            </div>

                                            <div class="range">
                                                <input type="range" class="range-input price-range-1" min="0" max="20000" value="0" step="100">
                                                <input type="range" class="range-input price-range-2" min="0" max="20000" value="200000" step="100">
                                            </div>
                                        </div>
                                        <ul class="advance-option-list price-advance-option-list">
                                            <li class="advance-option-item ">Tất cả mức giá</li>
                                            <li class="advance-option-item ">Thỏa thuận</li>
                                            <li class="advance-option-item ">
                                                <i class="fas fa-angle-left "></i> 500 triệu
                                            </li>
                                            <li class="advance-option-item ">500 - 800 triệu</li>
                                            <li class="advance-option-item ">800 triệu - 1 tỷ</li>
                                            <li class="advance-option-item ">1 - 2 tỷ</li>
                                            <li class="advance-option-item ">2 - 3 tỷ</li>
                                            <li class="advance-option-item ">3 - 5 tỷ</li>
                                            <li class="advance-option-item ">5 - 7 tỷ</li>
                                            <li class="advance-option-item ">7 - 10 tỷ</li>
                                            <li class="advance-option-item ">10 - 20 tỷ</li>
                                            <li class="advance-option-item ">20 - 30 tỷ</li>
                                            <li class="advance-option-item ">&#8805; 30 tỷ</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="filter-input-group left mt-md-8 ml-md-0" style="margin-left: 8px;">
                                    <span class="filter-input ">Trạng thái <span
                                                    class="angle-down ">&#8735;</span></span>
                                </div>
                            </div>

                            <div style="align-items: flex-start; right: 0; margin-left: auto;" class="refresh">
                                <i class="fas fa-sync-alt" style=" font-weight: 400;"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>

<div class="hot-news ">

    <div class="hot-news-tab ">
        <div class="left ">
            <div class="hot-news-tab-item active" data-tab-target="#hot-news-tab1">
                <h2>Tin nổi bật
                    <div class="line-bottom "></div>
                </h2>
            </div>
            <div class="hot-news-tab-item" data-tab-target="#hot-news-tab2">
                <h2>Tin tức
                    <div class="line-bottom "></div>
                </h2>
            </div>
            <div class="hot-news-tab-item" data-tab-target="#hot-news-tab3">
                <h2>Tư vấn
                    <div class="line-bottom"></div>
                </h2>
            </div>
            <div class="hot-news-tab-item" data-tab-target="#hot-news-tab4">
                <h2>Phong thủy
                    <div class="line-bottom "></div>
                </h2>
            </div>
        </div>

        <div class="right ">
            <a href="# " class="view-more ">
                <span>Xem thêm</span>
                <span class="fas fa-arrow-right "></span>
            </a>
        </div>
    </div>

    <div style="display: flex; ">
        <div class="hot-news-content active" id="hot-news-tab1">
            <a href="# " class="hot-new-content-item active ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/akCJKkFO/20220216072610-0bd2.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/PHJN6Zw0/20220216144544-5f52.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Loạt dự án BĐS mới được duyệt chủ trương, quy hoạch đầu năm 2022
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/FTnaKngu/20220216084243-85f1.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Sóng “săn” biệt thự/nhà liền kề bùng nổ tại nhiều thị trường phía Nam
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/wxbwknn6/20220216085823-96d5.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Lần đầu tiên Việt Nam có chỉ số tâm lý người tiêu dùng BĐS
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/15/FTnaKngu/20220215145928-ee94.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Giá BĐS tại các tỉnh Tây Nam Bộ tăng 35% trong 2-3 năm qua
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/15/wxbwknn6/20220215151344-3a8f.jpg" class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Lượng tin đăng đất nền Hà Nội tăng vọt
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <div class="col-md-5 ">
                <div class="hot-news-title ">
                    <div class="hot-news-title-item ">
                        <a href="# ">Có gì ở Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Giá BĐS tại các tỉnh Tây Nam Bộ tăng 35% trong 2 - 3 năm qua</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lần đầu tiên Việt Nam có chỉ số tâm lý người tiêu dùng BĐS</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Sóng "săn " biệt thự/nhà liền kề bùng nổ tại nhiều thị trường phía Nam</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Thị trường nhà trọ khởi sắc sau Tết</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lượng tin đăng đất nền Hà Nội tăng vọt</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hot-news-content" id="hot-news-tab2">
            <a href="# " class="hot-new-content-item active ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/akCJKkFO/20220216072610-0bd2.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/PHJN6Zw0/20220216144544-5f52.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/FTnaKngu/20220216084243-85f1.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/wxbwknn6/20220216085823-96d5.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/15/FTnaKngu/20220215145928-ee94.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <div class="col-md-5 ">
                <div class="hot-news-title ">
                    <div class="hot-news-title-item ">
                        <a href="# ">Có gì ở Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Giá BĐS tại các tỉnh Tây Nam Bộ tăng 35% trong 2 - 3 năm qua</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lần đầu tiên Việt Nam có chỉ số tâm lý người tiêu dùng BĐS</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Sóng "săn " biệt thự/nhà liền kề bùng nổ tại nhiều thị trường phía Nam</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Thị trường nhà trọ khởi sắc sau Tết</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lượng tin đăng đất nền Hà Nội tăng vọt</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hot-news-content" id="hot-news-tab3">
            <a href="# " class="hot-new-content-item active ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/akCJKkFO/20220216072610-0bd2.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/PHJN6Zw0/20220216144544-5f52.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/FTnaKngu/20220216084243-85f1.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/wxbwknn6/20220216085823-96d5.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/15/FTnaKngu/20220215145928-ee94.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <div class="col-md-5 ">
                <div class="hot-news-title ">
                    <div class="hot-news-title-item ">
                        <a href="# ">Có gì ở Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Giá BĐS tại các tỉnh Tây Nam Bộ tăng 35% trong 2 - 3 năm qua</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lần đầu tiên Việt Nam có chỉ số tâm lý người tiêu dùng BĐS</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Sóng "săn " biệt thự/nhà liền kề bùng nổ tại nhiều thị trường phía Nam</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Thị trường nhà trọ khởi sắc sau Tết</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lượng tin đăng đất nền Hà Nội tăng vọt</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hot-news-content" id="hot-news-tab4">
            <a href="# " class="hot-new-content-item active ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/akCJKkFO/20220216072610-0bd2.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/PHJN6Zw0/20220216144544-5f52.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/FTnaKngu/20220216084243-85f1.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/16/wxbwknn6/20220216085823-96d5.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <a href="# " class="hot-new-content-item ">
                <img src="https://file4.batdongsan.com.vn/crop/450x265/2022/02/15/FTnaKngu/20220215145928-ee94.jpg " class="hot-news-thumbnail ">
                <div class="title-right">
                    <span class="hot-news-thumbnail-title ">
                        Có gì ở The Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?
                    </span>
                    <div class="article-time ">
                        <span class="fal fa-clock "></span>
                        <span>1 ngày trước</span>
                    </div>
                </div>
            </a>

            <div class="col-md-5 ">
                <div class="hot-news-title ">
                    <div class="hot-news-title-item ">
                        <a href="# ">Có gì ở Mizuki - Biệt thự compound hạng sang phiên bản giới hạn khu Nam Sài Gòn?</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Giá BĐS tại các tỉnh Tây Nam Bộ tăng 35% trong 2 - 3 năm qua</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lần đầu tiên Việt Nam có chỉ số tâm lý người tiêu dùng BĐS</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Sóng "săn " biệt thự/nhà liền kề bùng nổ tại nhiều thị trường phía Nam</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Thị trường nhà trọ khởi sắc sau Tết</a>
                    </div>
                    <div class="hot-news-title-item ">
                        <a href="# ">Lượng tin đăng đất nền Hà Nội tăng vọt</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="ads ">
        <a href="# " class="image ">
            <img src="./assets/images/tamlybatdongsan.PNG ">
        </a>

        <a href="# " class="image image-2 ">
            <img src="./assets/images/donlocnammoibds.jpg ">
        </a>
    </div>
</div>

<div class="re__for_you ">
    <div class="re__for_you-container ">
        <div class="re__for_you-container-top ">
            <h2 class="re__for_you-container-top-label ">
                Bất động sản dành cho bạn
            </h2>
            <div class="re__for_you-container-top-link ">
                <a href="# ">Tin nhà đất bán mới nhất</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="# ">Tin nhà đất cho thuê mới nhất</a>
            </div>
        </div>
        <div class="re__for_you-container-products">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/01/19/20220119154351-ce78_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Sắp ra mắt dự án đại đô thị cách thành phố Vinh 6,4km - đầu tư lượt 1 cực kỳ tốt chỉ vào 1 tỷ/1 lô</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">45 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">100 m²</span>
                        </p>
                        <span class="card-text-location ">Vinh, Nghệ An</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn " data-placement="bottom ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/12/24/20211224085922-7b53_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Bán căn hộ cao cấp quận 10 - Xi Grand Court - 70 m2, 2 PN giá: 4.5 tỷ (sổ hồng)</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">4.5 tỷ</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">70 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 10, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/14/20220214195809-34ab_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Eco Green Sai Gon, căn hộ 2PN new 100%, full nội thất giá 15tr/tháng</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">15 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">65 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 7, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/14/20220214194620-3ab8_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Eco Green Sài Gòn, căn hộ 2 PN full nội thất 14tr/th, căn góc view đẹp mê ly</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">14 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">65 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 7, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/12/20220212203814-e444_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Eco Green Sài Gòn, hướng Đông đón gió cho thuê 2 pn 2wc 9.5tr/th, new 100%</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">9.5 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">65 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 7, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/12/24/20211224152716-0602_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Bán căn hộ chung cư 3PN tại 87 Lĩnh Nam, HM, 101m2 giá 3.3 tỷ. Lh 0987 819 699</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">4.5 tỷ</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">70 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 10, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/16/20220216171411-c0db_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Cho thuê căn hộ chung cư Tràng Thi, Minh Khai, 2PN giá 7.5tr/th. LH 0987 819 ***</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">29 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">127 m²</span>
                        </p>
                        <span class="card-text-location ">Vinh, Nghệ An</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/11/02/20211102192138-d791_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Cho thuê căn hộ Sarina Khu Sala Quận 2 - CH 3 phòng ngủ 127m2 full nội thất giá 29 triệu /tháng</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">29 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">127 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 2, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/11/20220211070236-4575_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Từ đất ra QL 17 đường thẳng rộng 3.5m, tiền, hậu 4.2m, CC bán 45m2 đất học viện Tòa Án, Giao Tất A</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">Thỏa thuận</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">45 m²</span>
                        </p>
                        <span class="card-text-location ">Gia Lâm, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/12/07/20211207094729-dc63_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Cho thuê căn hộ Sora Garden loại 2 và 3 phòng ngủ, đầy đủ tiện nghi cao cấp. Giá 11 - 18 triệu/th</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">11 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage "></span>
                        </p>
                        <span class="card-text-location ">Thủ Dầu Một, Bình Dương</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/08/20220208105648-56ed_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Eco Green giỏ hàng 100 căn, căn hộ 2 PN, 2WC 9.5tr/tháng, liên hệ: 0902802***</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">9 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">65 m²</span>
                        </p>
                        <span class="card-text-location ">Quận 7, Hồ Chí Minh</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/17/20220217195535-2675_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Cơn sốt 2n1vs giá siêu rẻ, s=55m2, chuyển nhượng nhanh chỉ 1.58 tỷ BT - Vinhomes Ocean Park Gia Lâm</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">1.58 tỷ</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">55.6 m²</span>
                        </p>
                        <span class="card-text-location ">Gia Lâm, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/10/18/20211018132716-7907_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Sắp ra mắt dự án đại đô thị cách thành phố Vinh 6,4km - đầu tư lượt 1 cực kỳ tốt chỉ vào 1 tỷ/1 lô</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">13 triệu/tháng</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">76 m²</span>
                        </p>
                        <span class="card-text-location ">Thủ Dầu Một, Bình Dương</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/01/10/20220110094418-8d28_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Lô góc, hoa hậu, đất đô thị giá đầu tư, đường ô tô tránh chỉ 25.x triệu/m2</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">25.5 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">87 m²</span>
                        </p>
                        <span class="card-text-location ">Thanh Oai, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/01/04/20220104221733-8b19_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Bán đất dịch vụ X1 Lê Xá, Mai Lâm, đường quy hoạch 40m. Kết nối với cầu Tứ Liên và Vin Cổ Loa</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">75 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">80 m²</span>
                        </p>
                        <span class="card-text-location ">Đông Anh, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/12/24/20211224210355-931e_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Đất phân lô, Thôn Kim Bài, thị trấn Kim Bài - Thanh Oai, chỉ 9.5 triệu/m2</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">9.5 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">162 m²</span>
                        </p>
                        <span class="card-text-location ">Thanh Oai, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://staticfile.batdongsan.com.vn/images/Product/no-image/card-compact-no-image.png " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Bán mảnh đất thôn Lê Xá, Mai Lâm. Sát đường 40m</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">38 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">67 m²</span>
                        </p>
                        <span class="card-text-location ">Vinh, Nghệ An</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/14/20220214155938-c9ba_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Căn hộ chung cư cao cấp thanh toán siêu nhẹ - cho đến khi nhận nhà chỉ thanh toán 30%</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">2.5 tỷ</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">70 m²</span>
                        </p>
                        <span class="card-text-location ">Thuận An, Bình Dương</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2022/02/17/20220217210658-8951_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Mặt Phố Trần Thái Tông,Cầu Giấy,35m*5T*MT4m, 17 tỷ,Vị Trí Đẹp Nhất Phố.LH: 0397194***</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">17 tỷ</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">35 m²</span>
                        </p>
                        <span class="card-text-location ">Cầu Giấy, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <img src="https://file4.batdongsan.com.vn/crop/257x147/2021/12/29/20211229205851-cece_wm.jpg " class="card-img-top ">
                <div class="card-body ">
                    <h3 class="card-title ">Chính chủ bán gấp 400m2 (7tr/m2) đối diện khu công nghệ cao nằm TP vệ tinh Hòa Lạc</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">7 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">400 m²</span>
                        </p>
                        <span class="card-text-location ">Thạch Thất, Hà Nội</span>
                    </p>
                    <div class="card-contact ">
                        <span class="card-contact-published-info ">Hôm nay</span>
                        <div class="card-contact-btn ">
                            <span class="fal fa-heart "></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__for_you-container-view_more ">
            <div class="btn re__for_you-container-view_more-btn expand " onclick="viewMoreProducts() ">
                <span>Mở rộng</span>
                <div class="fas fa-chevron-down " style="font-weight: 400; "></div>
            </div>
            <div class="btn re__for_you-container-view_more-btn disabled ">
                <a href="https://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-duong-quoc-lo-13-phuong-hiep-binh-phuoc-prj-khu-do-thi-van-phuc-city ">
                    <span>Xem tiếp</span>
                    <div class="fas fa-chevron-down " style="font-weight: 400; "></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="re__content-container">
    <h2 class="re__content-container-label">Dự án nổi bật</h2>
    <a href="#" class="re__content-container-link">Xem thêm <span class="fas fa-arrow-right"></span></a>
    <div class="clear-both"></div>
    <div class="re__home-project owl-carousel" id="slick-slider">
        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2022/01/07/20220107163344-a021.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-open">Đang mở bán</span>
                    <h3 class="card-title ">King Crown Infinity</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">90 triệu/m²</span>
                            <span class="card-text-config-dot "></span>
                            <span class="card-text-config-acreage ">1.27 ha</span>
                        </p>
                        <span class="card-text-location ">Thủ Đức, Hồ Chí Minh</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2021/06/13/20210613155351-c517.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-finish">Đã bàn giao</span>
                    <h3 class="card-title ">The Metropole Thủ Thiêm</h3>
                    <p class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">160 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">7.6 ha</span>
                        </p>
                        <span class="card-text-location ">Quận 2, Hồ Chí Minh</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2022/01/07/20220107163344-a021.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-finish">Đã bàn giao</span>
                    <h3 class="card-title ">Sunwah Pearl</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">82 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">1.91 ha</span>
                        </p>
                        <span class="card-text-location ">Bình Thạnh, Hồ Chí Minh</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2021/11/30/20211130150059-da83.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-open">Đang mở bán</span>
                    <h3 class="card-title ">Heritage West Lake</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">124 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">8,970 m²</span>
                        </p>
                        <span class="card-text-location ">Tây Hồ, Hà Nội</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2022/02/13/20220213163119-9a48.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-open">Đang mở bán</span>
                    <h3 class="card-title ">The Glen - Celadon City</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">5.5 ha</span>
                            <span class="card-text-config-dot "></span>
                            <span class="card-text-config-acreage "></span>
                        </p>
                        <span class="card-text-location ">Tân Phú, Hồ Chí Minh</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2018/09/07/hmcVYWuR/20180907114345-cb54.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-open">Đang mở bán</span>
                    <h3 class="card-title ">The Grand Manhattan</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">220 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">1.4 ha</span>
                        </p>
                        <span class="card-text-location ">Quận 1, Hồ Chí Minh</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/260x146/2021/05/25/akCJKkFO/20210525104508-d5aa.jpg" class="card-img-top ">
                <div class="card-body ">
                    <span class="re__project-tag-info re__project-open">Đang mở bán</span>
                    <h3 class="card-title ">Khu đô thị ID Junction</h3>
                    <div class="card-text ">
                        <p class="card-text-config ">
                            <span class="card-text-config-price ">55 triệu/m²</span>
                            <span class="card-text-config-dot ">·</span>
                            <span class="card-text-config-acreage ">41 ha</span>
                        </p>
                        <span class="card-text-location ">Long Thành, Đồng Nai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a class="banner dp-lg-none" href="#" style="display: flex;justify-content: center;align-items: center; margin: 55px auto 0;">
    <img src="https://file4.batdongsan.com.vn/2022/02/06/UVSXfqBy/20220206154341-aa7c.jpg">
</a>

<div class="re__content-container">
    <h2 class="re__content-container-label">Bất động sản theo địa điểm</h2>
    <div class="clear-both"></div>
    <div class="re__home-place-container">
        <div class="re__home-place-item re__place-big" style="background-image: url(https://file4.batdongsan.com.vn/images/newhome/cities1/HCM-web-1.jpg);">
            <a href="#" class="re__place-info">
                <p class="place-name">TP.Hồ Chí Minh</p>
                <p class="place-number">64046 tin đăng</p>
            </a>
        </div>
        <div class="re__home-place-item re__place-small">
            <div style="background-image: url(https://file4.batdongsan.com.vn/images/newhome/cities1/HN-web-1.jpg);">
                <a href="#" class="re__place-info">
                    <p class="place-name">Hà Nội</p>
                    <p class="place-number">61030 tin đăng</p>
                </a>
            </div>
            <div style="background-image: url(https://file4.batdongsan.com.vn/images/newhome/cities1/DDN-web-1.jpg);">
                <a href="#" class="re__place-info">
                    <p class="place-name">Đà Nẵng</p>
                    <p class="place-number">8848 tin đăng</p>
                </a>
            </div>
            <div style="background-image: url(https://file4.batdongsan.com.vn/images/newhome/cities1/BD-web-1.jpg);">
                <a href="#" class="re__place-info">
                    <p class="place-name">Bình Dương</p>
                    <p class="place-number">8048 tin đăng</p>
                </a>
            </div>
            <div style="background-image: url(https://file4.batdongsan.com.vn/images/newhome/cities1/DNA-web-1.jpg);">
                <a href="#" class="re__place-info">
                    <p class="place-name">Đồng Nai</p>
                    <p class="place-number">7156 tin đăng</p>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="re__home-tag-container swipe owl-carousel">
    <a href="#">
        <h3 class="re__home-tag-item">Vinhomes Central Park</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Vinhomes Grand Park</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Vinhomes Smart City</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Vinhomes Ocean Park</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Vũng Tàu Pearl</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Bcons Green View</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Grandeur Palace</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Diamond Island</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Hado Centrosa Garden</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">The Sun Avanue</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Nhà đất Hải Phòng</h3>
    </a>
    <a href="#">
        <h3 class="re__home-tag-item">Nhà đất Quy Nhơn</h3>
    </a>
</div>

@include('blocks.feedback')

<div class="re__content-container">
    <div class="re__content-container-label">Tin tức tiêu điểm</div>
    <div class="clear-both"></div>
    <div class="re__home-project owl-carousel" id="main-news">
        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/16/wxbwknn6/20220216173552-7c7a.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">01</div>
                    <h3 class="card-title ">Loạt dự án BĐS mới được duyệt chủ trương, quy hoạch đầu năm 2022</h3>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/14/wxbwknn6/20220214165958-57bc.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">02</div>
                    <h3 class="card-title ">Công khai 8 dự án "ảo", 25 dự án chưa được huy động vốn tại Hòa Bình</h3>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/14/wxbwknn6/20220214122232-d6eb.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">03</div>
                    <h3 class="card-title ">TP.HCM quyết tâm khởi động lại dự án đường vành đai 2</h3>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/07/FTnaKngu/20220207103137-8d18.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">04</div>
                    <h3 class="card-title ">Thị trường BĐS “khai xuân” với loạt nguồn cung mới</h3>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/08/FTnaKngu/20220208101949-6a0b.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">05</div>
                    <h3 class="card-title ">Đất nền vùng ven dự báo tiếp tục nóng sốt trong năm 2022</h3>
                </div>
            </div>
        </div>

        <div class="re__home-project-item">
            <div class="card">
                <img src="https://file4.batdongsan.com.vn/crop/354x200/2022/02/08/wxbwknn6/20220208090840-7e54.jpg" class="card-img-top ">
                <div class="card-body ">
                    <div class="index">06</div>
                    <h3 class="card-title ">Phong thủy khai xuân, xem tuổi làm nhà, hướng nhà đẹp 2022</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="re__content-block home__utility-block">
    <div class="re__content-container">
        <div class="re__content-container-label">Hỗ trợ tiện ích</div>
        <div class="clear-both"></div>
        <div class="re__utility-container">
            <div class="re__utility-item">Xem tuổi xây nhà</div>
            <div class="re__utility-item">Chi phí làm nhà</div>
            <div class="re__utility-item">Tính lãi suất</div>
            <div class="re__utility-item">Tư vấn phong thủy</div>
        </div>
    </div>
</div>

<div class="re__content-block re__home-enterprise-block">
    <div class="re__content-container">
        <div class="re__content-container-label">Doanh nghiệp tiêu biểu</div>
        <div class="clear-both"></div>
        <div class="typical-enterprise-container owl-carousel" id="typical-enterprise">
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/12/03/hmcVYWuR/20201203133559-6ec6.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/12/07/RUFz0fap/20201207135042-b1f0.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/11/18/hmcVYWuR/20201118143341-43eb.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/12/18/hmcVYWuR/20201218134831-48bb.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/09/15/PGsxuI1y/20200915154813-0430.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2022/01/25/20220125113950-181d.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2021/10/27/20211027081258-eb6e.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2021/12/28/20211228101112-7abe.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2021/03/15/hmcVYWuR/20210315115758-8278.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2021/03/31/PGsxuI1y/20210331083455-ba40.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2020/09/28/PGsxuI1y/20200928152939-aa13.jpg"></a>
            </div>
            <div class="typical-enterprise-item">
                <a href="#"><img src="https://file4.batdongsan.com.vn/2021/03/30/PGsxuI1y/20210330141501-3d16.jpg"></a>
            </div>
        </div>
    </div>
</div>

<div class="re__content-block re__home-social-media-block">
    <div class="re__content-container">
        <div class="re__content-container-label">Báo chí nói về Batdongsan.com.vn</div>
        <a href="#" class="re__content-container-link">Triệu lựa chọn nhà, một kênh tìm kiếm</a>
        <div class="clear-both"></div>
        <div class="re__home-social-media-container owl-carousel" id="social-media">
            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/2.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://file4.batdongsan.com.vn/images/newhome/bao3/icon_CafeF.png">
                    <span href="#" class="label">CEO Batdongsan.com.vn: "Tập trung vào trải nghiệm người dùng là yếu tố sống còn của các nền tảng công nghệ</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/3.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-vnexpress.png">
                    <span href="#" class="label">VRES 2021 đi tìm "vaccine" cho thị trường bất động sản</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/4.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-tien-phong.png">
                    <span href="#" class="label">Chuyên trang Dự án: nơi có "tất cả trong 1" dành cho người tìm kiếm BĐS</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/5.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-soha.png">
                    <span href="#" class="label">Thay đổi nhận diện thương hiệu, bước tiến mới của Batdongsan.com.vn</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/6.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://file4.batdongsan.com.vn/images/newhome/bao3/Icon_DanTri.png">
                    <span href="#" class="label">Chuyện tìm nhà hài hước của "Giáo sư Xoay"</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/7.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-lao-dong.png">
                    <span href="#" class="label">Vì sao nhu cầu giảm nhưng giá bất động sản vẫn tăng?</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/8.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-viet-nam-plus.png">
                    <span href="#" class="label">Giá bất động sản có xu hướng tăng do khan hiếm nguồn cung</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/9.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-cong-luan.png">
                    <span href="#" class="label">Nhà đầu tư vẫn tin tưởng vào sự phục hồi của thị trường bất động sản?</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/10.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-zing.png">
                    <span href="#" class="label">Hai giai đoạn tìm mua nhà phổ biến của người Việt</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/11.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-ndh.png">
                    <span href="#" class="label">Cuối năm, thị trường bất động sản sẽ phục hồi ra sao?</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/cong-nghe-bat-dong-san-giai-bai-toan-mua-nha.jpg">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-vnexpress.png">
                    <span href="#" class="label">Công nghệ bất động sản giải bài toán mua nhà</span>
                </a>
            </div>

            <div class="re__social-media-item">
                <a href="#" class="social-media-img">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/10-11-2021/1.png">
                </a>
                <a href="#" class="social-media-link">
                    <img src="https://staticfile.batdongsan.com.vn/images/article/icon-tuoi-tre.png">
                    <span href="#" class="label">Batdongsan.com.vn thay đổi nhận diện thương hiệu và ra mắt Chuyên trang Dự án</span>
                </a>
            </div>


        </div>
    </div>
</div>

<hr style="margin: 35px 0;">

<div class="re__box-link-footer">
    <div class="home-small">
        <div class="footer-middle">
            <div class="footer-middle-column">
                <h3 class="footer-middle-column-title">Nhà đất TP HCM</h3>
                <a class="footer-middle-column-link">Bán nhà Quận 1</a>
                <a class="footer-middle-column-link">Bán nhà Quận 2</a>
                <div class="footer-middle-column-link">Bán nhà Quận 3</div>
                <div class="footer-middle-column-link">Bán nhà Quận 4</div>
                <div class="footer-middle-column-link">Bán nhà Quận 6</div>
                <div class="footer-middle-column-link">Bán nhà Quận 7</div>
                <div class="footer-middle-column-link">Bán nhà Quận 8</div>
                <div class="footer-middle-column-link">Bán nhà Quận 9</div>
                <div class="footer-middle-column-link">Bán nhà Quận 10</div>
                <div class="footer-middle-column-link">Bán nhà Quận 11</div>
                <div class="footer-middle-column-link">Bán nhà Quận 12</div>
                <div class="footer-middle-column-link">Bán nhà Tân Phú</div>
                <div class="footer-middle-column-link">Bán nhà Thủ Đức</div>
                <div class="footer-middle-column-link">Bán nhà Bình Chánh</div>
                <div class="footer-middle-column-link">Bán nhà Bình Tân</div>
                <div class="footer-middle-column-link">Chung cư Thủ Đức</div>
                <div class="footer-middle-column-link">Chung cư Quận 9</div>
                <div class="footer-middle-column-link">Biệt thự Gò Vấp</div>
            </div>

            <div class="footer-middle-column">
                <h3 class="footer-middle-column-title">Nhà đất Hà Nội</h3>
                <a class="footer-middle-column-link">Bán nhà Hà Nội</a>
                <a class="footer-middle-column-link">Bán nhà chính chủ Hà Nội</a>
                <div class="footer-middle-column-link">Chung cư Bắc Từ Liêm</div>
                <div class="footer-middle-column-link">Nhà đất Long Biên</div>
                <div class="footer-middle-column-link">Nhà đất Hà Đông</div>
                <div class="footer-middle-column-link">Thuê chung cư Hà Nội</div>
                <div class="footer-middle-column-link">Bán nhà Bắc Từ Liêm</div>
                <div class="footer-middle-column-link">Thuê nhà Hà Nội</div>
                <div class="footer-middle-column-link">Thuê nhà Thanh Xuân</div>
                <div class="footer-middle-column-link">Chung cư Hà Đông</div>
                <div class="footer-middle-column-link">Nhà đất Đông Anh</div>
                <div class="footer-middle-column-link">Terra An Hưng</div>
                <div class="footer-middle-column-link">Thuê phòng trọ hà Nội</div>
                <div class="footer-middle-column-link">The Mattrix One</div>
                <div class="footer-middle-column-link">Vinhomes Ocean Park</div>
                <div class="footer-middle-column-link">Vinhomes Smart City</div>
                <div class="footer-middle-column-link">Mipec Rubik 360</div>
                <div class="footer-middle-column-link">Nhà phố Gò Vấp</div>
            </div>

            <div class="footer-middle-column">
                <h3 class="footer-middle-column-title">Mua bán nhà đất</h3>
                <a class="footer-middle-column-link">Nhà đất bán Hà Nội</a>
                <a class="footer-middle-column-link">Nhà đất Bình Dương</a>
                <div class="footer-middle-column-link">Nhà đất Đà Nẵng</div>
                <div class="footer-middle-column-link">Nhà đất Phú Thọ</div>
                <div class="footer-middle-column-link">Nhà đất Bà Rịa Vũng Tàu</div>
                <div class="footer-middle-column-link">Nhà đất Nam Định</div>
                <div class="footer-middle-column-link">Nhà đất Vĩnh Phúc</div>
                <div class="footer-middle-column-link">Nhà đất Bình Thuận</div>
                <div class="footer-middle-column-link">Nhà đất Gia Lai</div>
                <div class="footer-middle-column-link">Nhà đất Lâm Đồng</div>
                <div class="footer-middle-column-link">Nhà đất Quảng Bình</div>
                <div class="footer-middle-column-link">Nhà đất Bắc Giang</div>
                <div class="footer-middle-column-link">Nhà đất Bắc Ninh</div>
                <div class="footer-middle-column-link">Nhà đất Nghẹ An</div>
                <div class="footer-middle-column-link">Nhà đất Hải Phòng</div>
                <div class="footer-middle-column-link">Nhà đất Bạc Liêu</div>
                <div class="footer-middle-column-link">Nhà đất Quảng Nam</div>
                <div class="footer-middle-column-link">CityLand Park Hills</div>
            </div>

            <div class="footer-middle-column">
                <h3 class="footer-middle-column-title">Nhà đất cho thuê</h3>
                <a class="footer-middle-column-link">Cho thuê nhà Đà Nẵng</a>
                <a class="footer-middle-column-link">Cho thuê nhà Hà Nội</a>
                <div class="footer-middle-column-link">Cho thuê nhà Hồ Chí Minh</div>
                <div class="footer-middle-column-link">Cho thuê nhà Gò Vấp</div>
                <div class="footer-middle-column-link">Cho thuê nhà Thủ Đức</div>
                <div class="footer-middle-column-link">Cho thuê nhà Hải Phòng</div>
                <div class="footer-middle-column-link">Cho thuê nhà Quận 2</div>
                <div class="footer-middle-column-link">Chi thuê nhà Tân Phú</div>
                <div class="footer-middle-column-link">Cho thuê nhà Quận 12</div>
                <div class="footer-middle-column-link">Thuê nhà nguyên căn</div>
                <div class="footer-middle-column-link">Cho thuê nhà Quận 7</div>
                <div class="footer-middle-column-link">Cho thuê phòng trọ</div>
                <div class="footer-middle-column-link">Cho thuê nhà Tân Bình</div>
                <div class="footer-middle-column-link">Cho thuê nhà Bình Thạnh</div>
                <div class="footer-middle-column-link">Cho thuê nhà Quận 10</div>
                <div class="footer-middle-column-link">Cho thuê nhà Quận 8</div>
                <div class="footer-middle-column-link">Nhà trọ Quận 7</div>
                <div class="footer-middle-column-link">Charm Long Hải Resort</div>
            </div>

        </div>
    </div>
</div>
@endsection