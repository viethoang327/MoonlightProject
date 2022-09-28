document.querySelector('.search-btn').addEventListener('click', function() {
        this.parentElement.classList.toggle('open')
        this.previousElementSibling.focus()
    })
    // animation slide
$('.next-animation').on('click', function() {
    setTimeout(function() {
        $('.animation-slide').css('animation', 'zoomInDown 1.5s linear');
    }, 100);
    $('.animation-slide').removeAttr('style');
});
// keos thar anmation
// setInterval(function () {
//   if($('.swiper-wrapper').attr('style') !=undefined){
//     console.log($('.swiper-wrapper').attr('style','translate'));
//   }
// },1000);

// console.log($('.swiper-wrapper').attr('style'));

var navarr = document.querySelectorAll('#nav li');
let checkedindex;
navarr.forEach(function(element, index) {
    element.addEventListener('click', function(e) {
        e.target.parentElement.classList.add('nav-active');
        console.log(e.target.parentElement);
        checkedindex = index;
        navarr.forEach(function(element, index) {
            if (checkedindex != index) {
                element.classList.remove('nav-active');
            }
        });
        console.log(checkedindex);
    });

});
const Top = document.querySelector(".header")
window.addEventListener("scroll", function() {
        const x = this.pageYOffset;
        // console.log(x);
        if (x > 80) {
            Top.classList.add("active")
        } else {
            Top.classList.remove("active")
        }
    })
    // slice show 1

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// slice show 2
var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var appendNumber = 4;
var prependNumber = 1;
// document
//     .querySelector(".prepend-2-slides")
//     .addEventListener("click", function(e) {
//         e.preventDefault();
//         swiper.prependSlide([
//             '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
//             '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
//         ]);
//     });
document
    .querySelector(".prepend-slide")
    .addEventListener("click", function(e) {
        e.preventDefault();
        swiper.prependSlide(
            '<div class="swiper-slide">Slide ' + --prependNumber + "</div>"
        );
    });
document
    .querySelector(".append-slide")
    .addEventListener("click", function(e) {
        e.preventDefault();
        swiper.appendSlide(
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>"
        );
    });
document
    .querySelector(".append-2-slides")
    .addEventListener("click", function(e) {
        e.preventDefault();
        swiper.appendSlide([
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
        ]);
    });