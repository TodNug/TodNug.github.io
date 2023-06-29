const nav = document.querySelector("nav");

const allCross = document.querySelectorAll(".visible-pannel img");

const grid1 = document.querySelector(".grid2");
const grid2 = document.querySelector(".grid3");
const grid3 = document.querySelector(".grid4");

var text1 = document.querySelector("#grid1Desc");
var oldText1 = text1.innerHTML;
var text2 = document.querySelector("#grid2Desc");
var oldText2 = text2.innerHTML;
var text3 = document.querySelector("#grid3Desc");
var oldText3 = text3.innerHTML;

console.log(text2);
// Window opener //

grid1.addEventListener("click", () => {
  window.open("chambre1.html", "_self");
});

grid2.addEventListener("click", () => {
  window.open("chambre2.html", "_self");
});

grid3.addEventListener("click", () => {
  window.open("chambre3.html", "_self");
});

// FAQ //

allCross.forEach((element) => {
  element.addEventListener("click", function () {
    const height = this.parentNode.parentNode.childNodes[3].scrollHeight;
    const currentChoice = this.parentNode.parentNode.childNodes[3];

    if (this.src.includes("plus")) {
      this.src = "/icons/minus.png";
      gsap.to(currentChoice, {
        duration: 0.2,
        height: height + 40,
        opacity: 1,
        padding: "20px 15px",
      });
    } else if (this.src.includes("minus")) {
      this.src = "/icons/plus.png";
      gsap.to(currentChoice, {
        duration: 0.2,
        height: 0,
        opacity: 0,
        padding: "0px 15px",
      });
    }
  });
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
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
