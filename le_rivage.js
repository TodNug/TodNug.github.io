const toto1 = document.querySelector("#pic1");
const toto2 = document.querySelector("#pic2");
const toto3 = document.querySelector("#pic3");
const toto4 = document.querySelector("#pic4");
const toto5 = document.querySelector("#pic5");
const toto6 = document.querySelector("#pic6");
const toto7 = document.querySelector("#pic7");
const toto8 = document.querySelector("#pic8");
const toto9 = document.querySelector("#pic9");
const toto10 = document.querySelector("#pic10");
const toto11 = document.querySelector("#pic11");
const toto12 = document.querySelector("#pic12");

const next1 = document.querySelector("#nextbutt");
const prev1 = document.querySelector("#prevbutt");

const getback = document.querySelector("#backarrow");

const logo = document.getElementById("logo1");

const rsv = document.getElementById("RSV");

rsv.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("/info/", "_self");
});

logo.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("/", "_self");
});

getback.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 500ms forwards";
  setTimeout(function () {
    history.go(-1);
  }, 500);
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
}
