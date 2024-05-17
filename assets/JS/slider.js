document.addEventListener('DOMContentLoaded', function() {
  var swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 2,
      slideShadows: true
    },
    keyboard: {
      enabled: true
    },
    mousewheel: false, // Désactive la fonctionnalité de la molette de la souris

    spaceBetween: 60,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });

  swiper.on('slideChange', function() {
    const activeSlide = swiper.slides[swiper.activeIndex];
    const pokemonName = activeSlide.querySelector('span').innerText;
    const superposedImage = document.querySelector('.superposed-image');

    if (superposedImage) {
        superposedImage.src = `/assets/Pokemon/${pokemonName}.jpg`;
    }
  });

});





// document.addEventListener("DOMContentLoaded", function () {
//   var swiper = new Swiper(".swiper", {
//     effect: "coverflow",
//     grabCursor: true,
//     centeredSlides: true,
//     slidesPerView: "auto",
//     coverflowEffect: {
//       rotate: 0,
//       stretch: 0,
//       depth: 100,
//       modifier: 2,
//       slideShadows: true,
//     },
//     keyboard: {
//       enabled: true,
//     },
//     mousewheel: {
//       thresholdDelta: 70,
//     },
//     spaceBetween: 60,
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//   });

//   swiper.on("slideChange", function () {
//   const activeSlide = swiper.slides[swiper.activeIndex];
//   const pokemonName = activeSlide.querySelector("span").innerText;
//   let Pokemon = pokemonName.charAt(0).toUpperCase() + str.slice(1);
//   console.log(Pokemon);
//   const superposedImage = document.querySelector(".superposed-image");

//   // Mettre à jour l'image superposée
//   superposedImage.src = `https://theryrodrigue.fr/assets/Pokemon/${pokemonName}.jpg`;
// });
// });
