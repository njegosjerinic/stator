document.addEventListener("DOMContentLoaded", function () {

  const rightArrow = document.getElementById("rightArrow");
  const leftArrow = document.getElementById("leftArrow");
  const hamburger = document.querySelector(".hamburger");
  const headerMenu = document.querySelector(".header-menu");
  let anaCarouselItems = document.querySelectorAll(".ana-carousel-item");
  let caoruselDots = document.querySelectorAll(".ana-dot");

  let currentIndex = 0;

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

	for (let i = 0; i < caoruselDots.length; i++) {
  caoruselDots[i].addEventListener("click", function () {
	  console.log(currentIndex);
    showSlides(i);
	  
  });
		console.log(currentIndex);
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

  showSlides(0);

  if (hamburger) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      headerMenu.classList.toggle("active");
    });
  }

});
