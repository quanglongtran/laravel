document.addEventListener('scroll', function() {
    if (window.innerWidth > 1128) {
        if (window.pageYOffset > 0 || document.documentElement.scrollTop > 0) {
            $('.sticky-navbar-top').css('height', '56px')
        } else {
            $('.sticky-navbar-top').css('height', '96px')
        }
    }
})
$(document).ready(function() {

    function showTabItem(tabItem, contentItem) {
        $(contentItem + '.active').fadeIn().css('display', 'flex');
        $(tabItem).click(function() {
            $(tabItem).removeClass('active');
            $(this).addClass('active');
            let id_tab_content = $(this).attr('data-tab-target');
            $(contentItem).hide();
            $(id_tab_content).fadeIn()
            $(id_tab_content).css('display', 'flex')
                // return false;
        })
    }
    showTabItem('.nav-tabs li', '.tab-content-item');
    showTabItem('.hot-news-tab-item', '.hot-news-content');

    var menu = document.getElementsByClassName('menu')[0];
    var menu_li = menu.getElementsByTagName('li');
    var li = [menu_li[0], menu_li[12], menu_li[23], menu_li[34], menu_li[56], menu_li[67]];
    for (let i of li) {
        i.style.padding = '12px 0 12px';
        i.style.marginLeft = '8px';
    }
    var count = 0;
    var li_hover;
    var i = li[0];
    $(li).hover(function() {
        i = this;
        li_hover = setInterval(() => {
            count += 100;
            if (count >= 400) {
                clearInterval(li_hover);
                i.getElementsByTagName('ul')[0].style.display = 'block';
            }
        }, 100)
    }, function() {
        count = 0;
        clearInterval(li_hover);
        i.getElementsByTagName('ul')[0].style.display = 'none';
    })

    $('.menu ul li').hover(function() {
        $(this).find('ul:first').css('display', 'block').css('top', '-11px')
    }, function() {
        $(this).find('ul:first').css('display', 'none')
    })

    var TopScroll = window.pageYOffset || document.documentElement.scrollTop;
    var LeftScroll = window.pageXOffset || document.documentElement.scrollLeft;

    function disableScroll() {
        TopScroll = window.pageYOffset || document.documentElement.scrollTop;
        LeftScroll = window.pageXOffset || document.documentElement.scrollLeft;
        window.onscroll = function() {
            window.scrollTo(LeftScroll, TopScroll);
        };
    }

    function enableScroll() {
        window.onscroll = function() {};
    }

    var hideSelect = true;

    function showContent(element, display) {
        $(element + ' .content-display').text($(element + ' .content-item:first').text().trim())
        $(element + ' .select').click(function() {
            $(element + ' .content-list').fadeIn(100);
            disableScroll();
        })
        $(element + ' .content-item').click(function() {
            $(element + ' .content-display').text($(this).text().trim())
            $(element + ' .content-list').fadeOut(100);
            enableScroll();
        })
        $(element + ' .option').css('display', 'none')
        $(element + ' .' + display + '-display').click(function() {
            $(element + ' .option.' + display + '-option').fadeIn(100)
            disableScroll();
        })
        $(element + ' .' + display + '-advance-option-list' + ' .advance-option-item').click(function() {
            console.log(element + ' .' + display + '-advance-option-list' + ' .advance-option-item')
            $(element + ' .' + display + '-display .dash').text($(this).text().trim())
            $(element + ' .' + display + '-display .' + display + '-display-from').text('')
            $(element + ' .' + display + '-display .' + display + '-display-to').text('')
            $(element + ' .option.' + display + '-option').fadeOut(100)
        })
        $(element + ' .select').hover(function() {
            hideSelect = false;
        }, function() {
            hideSelect = true;
            document.addEventListener('click', function() {
                if (hideSelect) {
                    $(element + ' .content-list').css('display', 'none')
                    enableScroll();
                }
            })
        })
        $(element + ' .' + display + '-display').hover(function() {
            hideSelect = false;
        }, function() {
            hideSelect = true;
            $(element + ' .custom-slider').hover(function() {
                hideSelect = false;
            }, function() {
                hideSelect = true;
                document.addEventListener('click', function() {
                    if (hideSelect) {
                        $(element + ' .option.' + display + '-option').css('display', 'none')
                        enableScroll();
                    }
                })
            })
        })
    }

    showContent('#tab1', 'price')
    showContent('#tab1', 'acreage')

    showContent('#tab2', 'price')
    showContent('#tab2', 'acreage')

    showContent('#tab3', 'price')
    showContent('#tab3', 'acreage')



    function priceRangeSlider(parent, id) {
        var optionInput_1 = document.querySelector(parent + ' .price-option-input-1');
        var optionInput_2 = document.querySelector(parent + ' .price-option-input-2');
        var rangeInput_1 = document.querySelector(parent + ' .price-range-1');
        var rangeInput_2 = document.querySelector(parent + ' .price-range-2');
        var displayFrom = document.querySelector(parent + ' .price-display-from');
        var displayTo = document.querySelector(parent + ' .price-display-to');
        var dash = document.querySelector(parent + ' .dash');
        var slideOne = document.querySelector(parent + ' .price-range-1');
        var slideTwo = document.querySelector(parent + ' .price-range-2');
        var minGap = 100;
        var clientX;
        var percent;
        $(parent + ` .price-range-${id}`).on('mousemove', function(e) {
            var left = this.getBoundingClientRect().left;
            var width = this.getBoundingClientRect().width;
            clientX = e.clientX;
            percent = Math.round(((clientX - left) / width) * 20000);
            if (Math.abs(slideOne.value - percent) <= Math.abs(slideTwo.value - percent)) {
                $(parent + ' .price-range-1').css('zIndex', '1')
            } else {
                $(parent + ' .price-range-1').css('zIndex', '0')
            }
        })

        $(parent + ` .price-range-${id}`).on('input changeproperty', function() {
            function currencyUnitFn(param) {
                if (param == 0) {
                    return '0 đồng'
                } else if (param >= 1000) {
                    return param / 1000 + ' tỷ'
                } else if (param < 1000) {
                    return param + ' triệu'
                }
            }

            $(parent + ` .price-option-input-${id}`).val($(this).val())

            displayFrom.innerText = currencyUnitFn(rangeInput_1.value);
            displayTo.innerText = currencyUnitFn(rangeInput_2.value);
            dash.innerText = '-';
            $(parent + ` .price-option-input-1`).val(slideOne.value)
            $(parent + ` .price-option-input-2`).val(slideTwo.value)
            slideOne.addEventListener('input', function() {
                if (parseInt(slideTwo.value) - parseInt(slideOne.value) <= minGap) {
                    slideOne.value = parseInt(slideTwo.value) - minGap;
                }

            })
            slideTwo.addEventListener('input', function() {
                if (parseInt(slideTwo.value) - parseInt(slideOne.value) <= minGap) {
                    slideTwo.value = parseInt(slideOne.value) + minGap;
                }
            })
            if (id == 1) {
                if ($(parent + ' .price-range-1').val() >= Number($(parent + ' .price-range-2').val()) - minGap) {
                    $(parent + ' .price-range-1').val(Number($(parent + ' .price-range-2').val()) - minGap);
                    if (Number($(parent + ' .price-range-1').val()) >= 1000) {
                        $(parent + ' .price-display-from').text(Number($(parent + ' .price-range-1').val()) / 1000 + ' tỷ');
                    } else {
                        $(parent + ' .price-display-from').text(Number($(parent + ' .price-range-1').val()) + ' triệu');
                    }

                    $(parent + ` .price-option-input-${id}`).val($(parent + ' .price-range-1').val());
                }
            }
            if (id == 2) {
                if ($(parent + ' .price-range-2').val() < Number($(parent + ' .price-range-1').val()) + minGap) {
                    $(parent + ' .price-range-2').val(Number($(parent + ' .price-range-1').val()) + minGap);
                    if (Number($(parent + ' .price-range-2').val()) >= 1000) {
                        $(parent + ' .price-display-to').text(Number($(parent + ' .price-range-2').val()) / 1000 + ' tỷ');
                    } else {
                        $(parent + ' .price-display-to').text(Number($(parent + ' .price-range-2').val()) + ' triệu');
                    }
                    $(parent + ` .price-option-input-${id}`).val($(parent + ' .price-range-2').val());
                }
            }
        })

        $(parent + ` .price-option-input-${id}`).on('input changeproperty', function() {

            function checkMoney() {

                function findStr(str, id) {
                    if (str.search(' ') != -1 || str.search('.') != -1 || str.search(',') != -1 && id == 1) {
                        optionInput_1.value = optionInput_1.value.replace(' ', '')
                        optionInput_1.value = optionInput_1.value.replace('.', '')
                        optionInput_1.value = optionInput_1.value.replace(',', '')
                    }
                    if (str.search('-') != -1 || isNaN(Number(str)) && id == 1) {
                        optionInput_1.value = str.replace(/[^0-9]/g, '')
                        $(parent + ' .price-range-1').val(optionInput_1.value)
                    }
                    if (str.search('-') != -1 || isNaN(Number(str)) && id == 2) {
                        optionInput_2.value = str.replace(/[^0-9]/g, '')
                        $(parent + ' .price-range-2').val(optionInput_2.value)
                    }

                    if (str.search(' ') != -1 || str.search('.') != -1 || str.search(',') != -1 && id == 2) {
                        optionInput_2.value = optionInput_2.value.replace(' ', '')
                        optionInput_2.value = optionInput_2.value.replace('.', '')
                        optionInput_2.value = optionInput_2.value.replace(',', '')
                    }

                }

                if (optionInput_1.value.length > 6) {
                    optionInput_1.value = optionInput_1.value.substr(0, optionInput_1.value.length - 1)
                }

                if (optionInput_2.value.length > 6) {
                    optionInput_2.value = optionInput_2.value.substr(0, optionInput_2.value.length - 1)
                }

                findStr(optionInput_1.value, 1)
                findStr(optionInput_2.value, 2)
                var isHollow1 = optionInput_1.value + 0 != '00' && optionInput_2.value + 0 != '00';

                function currencyUnitFn(param) {
                    if (param == 0) {
                        return '0 đồng'
                    } else if (param >= 1000) {
                        return param / 1000 + ' tỷ'
                    } else if (param < 1000) {
                        return Number(param) + ' triệu'
                    }
                }

                if (optionInput_1.value == '' && optionInput_2.value == '' && isHollow1) {
                    displayFrom.innerText = '';
                    displayTo.innerText = '';
                    dash.innerText = 'Mức giá';
                }

                if (optionInput_1.value == '' && optionInput_2.value != '') {
                    displayFrom.innerText = '';
                    displayTo.innerText = currencyUnitFn(optionInput_2.value);
                    dash.innerText = '<';
                }

                if (optionInput_2.value == '' && optionInput_1.value != '') {
                    displayFrom.innerText = '';
                    displayTo.innerText = currencyUnitFn(optionInput_1.value);
                    dash.innerText = '>=';
                }

                if (optionInput_1.value != '' && optionInput_2.value != '') {
                    displayFrom.innerText = currencyUnitFn(optionInput_1.value);
                    displayTo.innerText = currencyUnitFn(optionInput_2.value);
                    dash.innerText = '-';
                }
            }

            if (id == 1) {
                slideOne.value = Number(this.value);
                checkMoney();
            } else if (id == 2) {
                slideTwo.value = Number(this.value);
                checkMoney();
            }
        })
    }
    priceRangeSlider('#tab1', '1');
    priceRangeSlider('#tab1', '2');
    priceRangeSlider('#tab2', '1');
    priceRangeSlider('#tab2', '2');
    priceRangeSlider('#tab3', '1');
    priceRangeSlider('#tab3', '2');

    function acreageRangeSlider(parent, id) {
        var optionInput_1 = document.querySelector(parent + ' .acreage-option-input-1');
        var optionInput_2 = document.querySelector(parent + ' .acreage-option-input-2');
        var rangeInput_1 = document.querySelector(parent + ' .acreage-range-1')
        var rangeInput_2 = document.querySelector(parent + ' .acreage-range-2')
        var displayFrom = document.querySelector(parent + ' .acreage-display-from');
        var displayTo = document.querySelector(parent + ' .acreage-display-to');
        var dash = document.querySelector(parent + ' .acreage-display .dash');
        var slideOne = document.querySelector(parent + ' .acreage-range-1');
        var slideTwo = document.querySelector(parent + ' .acreage-range-2');
        var minGap = 10;
        var clientX;
        var percent;
        var width;
        var left;

        $(parent + ` .acreage-range-${id}`).on('mousemove', function(e) {
            left = this.getBoundingClientRect().left;
            width = this.getBoundingClientRect().width;
            clientX = e.clientX;
            percent = ((clientX - left) / width) * 500;

            if (Math.abs(slideOne.value - percent) <= Math.abs(slideTwo.value - percent)) {
                $(parent + ' .acreage-range-1').css('zIndex', '1')
            } else {
                $(parent + ' .acreage-range-1').css('zIndex', '0')
            }
        })

        $(parent + ` .acreage-range-${id}`).on('input changeproperty', function() {
            $(parent + ` .acreage-option-input-1`).val(slideOne.value)
            $(parent + ` .acreage-option-input-2`).val(slideTwo.value)

            displayFrom.innerText = $(parent + ' .acreage-range-1').val();
            displayTo.innerText = $(parent + ' .acreage-range-2').val() + 'm²';
            dash.innerText = '-';

            slideOne.addEventListener('input', function() {
                if (parseInt(slideTwo.value) - parseInt(slideOne.value) <= minGap) {
                    slideOne.value = parseInt(slideTwo.value) - minGap;
                    $(parent + ' .acreage-option-input-1').val($(parent + ' .acreage-range-1').val());
                    displayFrom.innerText = $(parent + ' .acreage-range-1').val();
                }

            })
            slideTwo.addEventListener('input', function() {
                    if (parseInt(slideTwo.value) - parseInt(slideOne.value) <= minGap) {
                        slideTwo.value = parseInt(slideOne.value) + minGap;
                        $(parent + ' .acreage-option-input-2').val($(parent + ' .acreage-range-2').val());
                        displayTo.innerText = $(parent + ' .acreage-range-2').val() + 'm²';
                    }
                })
                // if (id == 1) {
                //     if ($(parent + ' .acreage-range-1').val() >= Number($(parent + ' .acreage-range-2').val()) - minGap) {
                //         $(parent + ' .acreage-option-input-1').val($(parent + ' .acreage-range-1').val());
                //     }
                // }
                // if (id == 2) {
                //     if ($(parent + ' .acreage-range-2').val() < Number($(parent + ' .acreage-range-1').val()) + minGap) {
                //         $(parent + ' .acreage-option-input-2').val($(parent + ' .acreage-range-2').val());
                //     }
                // }
        })

        $(parent + ` .acreage-option-input-${id}`).on('input changeproperty', function() {

            function checkMoney() {

                function findStr(str, id) {
                    if (str.search(' ') != -1 || str.search('.') != -1 || str.search(',') != -1 && id == 1) {
                        optionInput_1.value = optionInput_1.value.replace(' ', '')
                        optionInput_1.value = optionInput_1.value.replace('.', '')
                        optionInput_1.value = optionInput_1.value.replace(',', '')
                    }
                    if (str.search('-') != -1 || isNaN(Number(str)) && id == 1) {
                        optionInput_1.value = str.replace(/[^0-9]/g, '')
                        $(parent + ' .price-range-1').val(optionInput_1.value)
                    }
                    if (str.search('-') != -1 || isNaN(Number(str)) && id == 2) {
                        optionInput_2.value = str.replace(/[^0-9]/g, '')
                        $(parent + ' .price-range-2').val(optionInput_2.value)
                    }

                    if (str.search(' ') != -1 || str.search('.') != -1 || str.search(',') != -1 && id == 2) {
                        optionInput_2.value = optionInput_2.value.replace(' ', '')
                        optionInput_2.value = optionInput_2.value.replace('.', '')
                        optionInput_2.value = optionInput_2.value.replace(',', '')
                    }

                }

                if (optionInput_1.value.length > 6) {
                    optionInput_1.value = optionInput_1.value.substr(0, optionInput_1.value.length - 1)
                }

                if (optionInput_2.value.length > 6) {
                    optionInput_2.value = optionInput_2.value.substr(0, optionInput_2.value.length - 1)
                }

                findStr(optionInput_1.value, 1)
                findStr(optionInput_2.value, 2)
                var isHollow1 = optionInput_1.value + 0 != '00' && optionInput_2.value + 0 != '00';

                if (optionInput_1.value == '' && optionInput_2.value == '' && isHollow1) {
                    displayFrom.innerText = '';
                    displayTo.innerText = '';
                    dash.innerText = 'Dien tich';
                }

                if (optionInput_1.value == '' && optionInput_2.value != '') {
                    displayFrom.innerText = '';
                    displayTo.innerText = optionInput_2.value + 'm²';
                    dash.innerText = '<';
                }

                if (optionInput_2.value == '' && optionInput_1.value != '') {
                    displayFrom.innerText = '';
                    displayTo.innerText = optionInput_1.value + 'm²';
                    dash.innerText = '>=';
                }

                if (optionInput_1.value != '' && optionInput_2.value != '') {
                    displayFrom.innerText = optionInput_1.value;
                    displayTo.innerText = optionInput_2.value + 'm²';
                    dash.innerText = '-';
                }
            }

            if (id == 1) {
                slideOne.value = Number(this.value);
                checkMoney();
            } else if (id == 2) {
                slideTwo.value = Number(this.value);
                checkMoney();
            }
        })
    }

    acreageRangeSlider('#tab1', '1')
    acreageRangeSlider('#tab1', '2')
    acreageRangeSlider('#tab2', '1')
    acreageRangeSlider('#tab2', '2')

    function moreOption(parent) {
        var count = 0;
        $(parent + ' .filter-input-group.line-2').fadeOut()
        $(parent + ' .filter-more').click(function() {
            $(parent + ' .filter-input-group.line-2').fadeToggle('fast')
            count++
            if (count == 1) {
                $(parent + ' .more-option').addClass('active')
                $(parent + ' .filter-more-text').text('Thu gọn')
                $(parent + ' .more-option .angle-down').css('top', '2px')
                $(parent + ' .more-option .angle-down').css('transform', 'rotate(135deg)')
                count++
            } else {
                $(parent + ' .more-option').removeClass('active')
                $(parent + ' .filter-more-text').text('Mở rộng')
                $(parent + ' .more-option .angle-down').css('transform', 'rotate(315deg)')
                $(parent + ' .more-option .angle-down').css('top', '-2px')
                count = 0
            }

        })

        $(parent + ' .refresh').click(function() {
            $(parent + ' .search-input').val('')
            $(parent + ' input').val('')

            $(parent + ' .price-display-from').text('')
            $(parent + ' .price-dash').text('Mức giá')
            $(parent + ' .price-display-to').text('')
            $(parent + ' .price-range-1').val('0')
            $(parent + ' .price-range-2').val('20000')

            $(parent + ' .acreage-display-from').text('')
            $(parent + ' .acreage-dash').text('Diện tích')
            $(parent + ' .acreage-display-to').text('')
            $(parent + ' .acreage-range-1').val('0')
            $(parent + ' .acreage-range-2').val('500')
        })
    }

    moreOption('#tab1');
    moreOption('#tab2');
    moreOption('#tab3');
    $('[data-toggle="tooltip"]').tooltip()

    $('.re__for_you .card').each(function(index) {
        $(this).attr('title', $(this).children('')[1].getElementsByClassName('card-title')[0].innerText)
        $(this).children('')[1].getElementsByClassName('card-contact-btn')[0].setAttribute('data-toggle', 'tooltip')
        $(this).children('')[1].getElementsByClassName('card-contact-btn')[0].setAttribute('title', 'Bấm để lưu tin')

    })

})


function viewMoreProducts() {
    document.querySelector('.btn.re__for_you-container-view_more-btn.expand').style.display = 'none'
    document.querySelector('.btn.re__for_you-container-view_more-btn.disabled .fas.fa-chevron-down').classList.add('disabled')
    document.querySelector('.btn.re__for_you-container-view_more-btn.disabled').classList.remove('disabled')
    $('.re__for_you .card').each(function(index) {
        $(this).css('display', 'flex')
    })
}

$('#slick-slider').owlCarousel({
    loop: true,
    // margin: 3.75,
    items: 4,
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
        1140: {
            nav: true,
            navText: ['<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
                '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right"></i></button>'
            ],

        }
    },
})

$('.re__home-tag-container.swipe').owlCarousel({
    loop: false,
    dots: false,
    items: 7,
    lazyLoad: true,
    autoWidth: true,
})

$('#main-news').owlCarousel({
    loop: false,
    items: 3,
    lazyLoad: true,
    responsive: {
        1140: {
            nav: true,
            navText: ['<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
                '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right"></i></button>'
            ],

        }
    },
    smartSpeed: 1000,
})

$('#typical-enterprise').owlCarousel({
    loop: true,
    items: 4,
    autoplay: true,
    autoplayTimeout: 4000,
    smartSpeed: 1000,
    dots: false,
    margin: 32,
    responsive: {
        1140: {
            items: 6,
            nav: true,
            navText: ['<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
                '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right"></i></button>'
            ],

        },
    }
})

$('#social-media').owlCarousel({
    loop: true,
    margin: 32,
    items: 3,
    dots: false,
    responsive: {
        1: {
            items: 1,
        },
        600: {
            items: 3
        },
        1140: {
            items: 4,
            nav: true,
            navText: ['<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
                '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right"></i></button>'
            ],

        },
    }
    // autoHeight: true,
})
var test = 100;
var clearSeeMoreBranches;

function seeMoreBranchesFn() {
    for (let element of document.getElementsByClassName('seeMoreBranches')) {
        element.classList.toggle('slideUp')
    }
}
$('[data-toggle]').on('click', function() {
    $(this).children('.icon-abs').toggleClass('down')
})
$('#email-footer').on('focus', () => {
    if ($('#email-footer').val() != '') {
        $('#email-footer~.re__input-close').removeClass('re__hidden-icon')
    }
})
$('#email-footer').on('input changeproperty', () => {
    if ($('#email-footer').val() != '') {
        $('#email-footer~.re__input-close').removeClass('re__hidden-icon')
    }
})
$('#email-footer').on('blur', () => {
    setTimeout(() => {
            $('#email-footer~.re__input-close').addClass('re__hidden-icon')
        },
        200)

})
$('#email-footer~.re__input-close').click(() => {
    $('#email-footer').val('')
})