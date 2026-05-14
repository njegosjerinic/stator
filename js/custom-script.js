document.addEventListener("DOMContentLoaded", function () {
  const rightArrow = document.getElementById("rightArrow");
  const leftArrow = document.getElementById("leftArrow");
  const hamburger = document.querySelector(".hamburger");
  const headerMenu = document.querySelector(".header-menu");
  const carousel = document.querySelector(".ana-caurousel");
  let anaCarouselItems = document.querySelectorAll(".ana-carousel-item");
  let caoruselDots = document.querySelectorAll(".ana-dot");

  let currentIndex = 0;
  let startX = 0;
  let endX = 0;

  function showSlides(index) {
    if (index >= anaCarouselItems.length) index = 0;
    if (index < 0) index = anaCarouselItems.length - 1;

    for (let i = 0; i < anaCarouselItems.length; i++) {
      anaCarouselItems[i].style.display = "none";
      if (caoruselDots[i]) {
        caoruselDots[i].classList.remove("active");
      }
    }

    if (anaCarouselItems[index]) {
      anaCarouselItems[index].style.display = "block";
    }

    if (caoruselDots[index]) {
      caoruselDots[index].classList.add("active");
    }

    currentIndex = index;
  }

  if (rightArrow) {
    rightArrow.addEventListener("click", () => {
      showSlides(currentIndex + 1);
    });
  }

  if (leftArrow) {
    leftArrow.addEventListener("click", () => {
      showSlides(currentIndex - 1);
    });
  }

  for (let i = 0; i < caoruselDots.length; i++) {
    caoruselDots[i].addEventListener("click", function () {
      showSlides(i);
    });
  }
  if (carousel) {
    carousel.addEventListener("touchstart", (e) => {
      startX = e.touches[0].clientX;
    });

    carousel.addEventListener("touchend", (e) => {
      endX = e.changedTouches[0].clientX;

      if (startX - endX > 50) {
        showSlides(currentIndex + 1);
      }

      if (endX - startX > 50) {
        showSlides(currentIndex - 1);
      }
    });
  }

  showSlides(0);

  if (hamburger) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      headerMenu.classList.toggle("active");
    });
  }
});
