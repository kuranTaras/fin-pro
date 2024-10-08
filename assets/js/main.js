// news slider
const swiperNews = new Swiper('.news__slider', {
    pagination: {
        el: '.news__pagination',
        clickable: true,
    }
});


// more btn news
let btnNews = document.querySelectorAll('.news__slide-btn')
let btnP = document.querySelectorAll('.news__slide-text > p')

btnNews?.forEach(function (item, index) {
    item.addEventListener('click', () => {
        if (!item.classList.contains('active')) {
            btnP[index].classList.add('active')
            btnNews.forEach(function (item) {
                item.classList.remove('active')
            })
            item.classList.add('active')
            item.innerHTML = item.getAttribute('data-less')
        } else {
            btnP[index].classList.remove('active')
            btnNews.forEach(function (item) {
                item.classList.remove('active')
                item.innerHTML = item.getAttribute('data-more')
            })
        }
    })
})




// all articles slider
const swiperAll = new Swiper('.all__slider', {
    slidesPerView: 1,
    spaceBetween: 26,
    pagination: {
        el: '.all__pagination',
        clickable: true,
    },
    breakpoints: {
        1000: {
            slidesPerView: 4
        },
        760: {
            slidesPerView: 3,
        }
    }
});


// custom checkbox

let check = document.querySelector('.footer__form input[type=checkbox]')
let arrowCheck = document.querySelector('.footer__form .check-arrow')
check.addEventListener('change', (e) => {
    if (e.target.checked) {
        arrowCheck.classList.add('active')
    } else {
        arrowCheck.classList.remove('active')
    }
})


// best sliders
document.querySelectorAll('.best__tab').forEach(function (item, index) {
    const swiperBest = new Swiper(`.best__tab:nth-child(${index+1}) .best__slider`, {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: `.best__tab:nth-child(${index+1}) .best__pagination`,
            clickable: true,
        },
        navigation: {
            nextEl: `.best__tab:nth-child(${index+1}) .best__next`,
            prevEl: `.best__tab:nth-child(${index+1}) .best__prev`,
        },
        breakpoints: {
            1000: {
                slidesPerView: 3,
                spaceBetween: 34,
            },
            760: {
                slidesPerView: 2,
            }
        }
    });
})


// best tabs

let bestBtns = document.querySelectorAll('.best .rating__filter')
let bestTabs = document.querySelectorAll('.best__tab')

bestBtns.forEach(function (item, index) {
    item.addEventListener('click', () => {
        bestBtns.forEach(function (item, index) {
            item.classList.remove('active')
        })
        bestTabs.forEach(function (item, index) {
            item.classList.remove('active')
        })
        bestTabs[index].classList.add('active')
        item.classList.add('active')
    })
})


// rating numbers


function setIndex() {
    let ratingIndex = document.querySelectorAll('.rating__casino.active .rating__casino-num')

    ratingIndex.forEach(function (item, index) {
        item.innerHTML = index+1
    })
}
setIndex();



// sort functionality

let RateCasino = document.querySelectorAll('.rating__casino')
let RateBtns = document.querySelectorAll('.rating .rating__filter')

RateBtns[0]?.classList.add('active')
document.querySelectorAll('.best .rating__filter')[0]?.classList.add('active')
RateBtns.forEach(function (item, index) {
    item.addEventListener('click', () => {
        RateBtns.forEach(function (item) {
            item.classList.remove('active')
        })
        item.classList.add('active')


        RateCasino.forEach(function (itemCasino) {
            itemCasino.classList.remove('active')
            if (itemCasino.classList.contains(`${item.getAttribute('data-sort')}`)) {
                itemCasino.classList.add('active')
            }
        })
        setIndex();
    })
})



// rating number stars

function ratingStars(number, star) {

    number.forEach(function (item, indexNum) {
        let num = Math.round(Number(item.innerHTML))

        for (let i = 0; i<num; i++) {

            star[indexNum].children[i].classList.add('active')
        }
    })
}

ratingStars(document.querySelectorAll('.rating__casino-rating > span'), document.querySelectorAll('.rating__casino-rating-stars'));
ratingStars(document.querySelectorAll('.top__item-rating-num'), document.querySelectorAll('.top__item-rating-stars'));



// cf7 settings

$('.footer__form-btn').on('click', () => {
    if ($('.footer__check input[type=checkbox]').is(':checked')) {
        $('.footer__check').removeClass('check-error')
    } else {
        $('.footer__check').addClass('check-error')
    }
})

$('.wpcf7-form').on('wpcf7mailsent', () => {
    $('.check-arrow').removeClass('active')
})

$('.footer__check input[type=checkbox]').on('change', () => {
    if ($('.footer__check input[type=checkbox]').is(':checked')) {
        $('.footer__check').removeClass('check-error')
    } else {
        $('.footer__check').addClass('check-error')
    }
})


// burger

let burger = document.querySelector('.header__burger')
let menu = document.querySelector('.menu')
let body = document.querySelector('body')

burger.addEventListener('click', () => {
    burger.classList.toggle('active')
    menu.classList.toggle('active')
})

body.addEventListener('click', (e) => {
    if (!e.target.closest('.menu') && !e.target.closest('.header__burger')) {
        burger.classList.remove('active')
        menu.classList.remove('active')
    }
})


// casino reviews slider

const swiperReviews = new Swiper('.reviews-small .reviews__slider', {
    slidesPerView: 1,
    spaceBetween: 26,
    pagination: {
        el: '.reviews__pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.reviews__next',
        prevEl: '.reviews__prev',
    },
    breakpoints: {
        1000: {
            slidesPerView: 3.4,
            spaceBetween: 60,
        },
        760: {
            slidesPerView: 2,
            spaceBetween: 30,
        }
    }
});

let reviewsSlider = document.querySelector('.reviews__slider')
let reviewsNext = document.querySelector('.reviews__next')
swiperReviews.on('slideChange', () => {
    if (reviewsNext.getAttribute('aria-disabled') === 'true') {
        reviewsSlider.classList.remove('blur')
    } else {
        reviewsSlider.classList.add('blur')
    }
})


// comments form

document.querySelector('.reviews-btn')?.addEventListener('click', () => {
    document.querySelector('.reviews-btn').style.display = 'none';
    document.querySelector('.reviews__comments').classList.add('active')
})


// reviews big slider

const swiperReviewsBig = new Swiper('.reviews-big .reviews__slider', {
    slidesPerView: 1,
    grid: {
        rows: 2,
    },
    fill: "row",
    breakpoints: {
        999: {
            slidesPerView: 3.5,
            grid: {
                rows: 3,
            },
        },
        760: {
            slidesPerView: 2,
            grid: {
                rows: 2,
            },
        }
    },
    pagination: {
        el: '.reviews__pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.reviews__next',
        prevEl: '.reviews__prev',
    },
});
swiperReviewsBig.on('slideChange', () => {
    if (reviewsNext.getAttribute('aria-disabled') === 'true') {
        reviewsSlider.classList.remove('blur')
    } else {
        reviewsSlider.classList.add('blur')
    }
})

// fix form
document.querySelector('.header form').setAttribute('action', '/')