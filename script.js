const nav = document.querySelector("nav");

const allCross = document.querySelectorAll(".visible-pannel img");

const grid1 = document.querySelector(".grid2");
const grid2 = document.querySelector(".grid3");
const grid3 = document.querySelector(".grid4");

const loader = document.querySelector(".loader");
const bar = document.querySelector(".bar");
const ldrLogo = document.getElementById("ldrLogo");
const barCtn = document.querySelector(".bar-ctn");
const btn1 = document.getElementById("button1");
const btn1Mbl = document.getElementById("mob-res");

let lastScrollY = window.scrollY;

window.addEventListener("scroll", () => {
  if (lastScrollY < window.scrollY) {
    document.getElementById("animArrow").style.opacity = "0";
    document.getElementById("animArrow1").style.opacity = "0";
  }
});

if (sessionStorage.getItem("load") === "off") {
  loader.style.display = "none";
  document.body.style.animation = "none";
}

window.addEventListener("load", () => {
  bar.style.animation = "none";
  bar.style.width = "100%";
  setTimeout(function () {
    bar.style.width = "100%";
    ldrLogo.style.transform = "translateY(-100%)";
    ldrLogo.style.opacity = "0";
    barCtn.style.opacity = "0";
  }, 400);
  setTimeout(function () {
    loader.style.opacity = "0";
    document.body.style.overflow = "visible";
  }, 600);
  setTimeout(function () {
    loader.style.display = "none";
  }, 1100);
  sessionStorage.setItem("load", "off");
});

// Window opener //

btn1Mbl.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("/info/", "_self");
});

btn1.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("/info/", "_self");
});

grid1.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("le_frejo.html", "_self");
});

grid2.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("le_rivage.html", "_self");
});

grid3.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("le_cabanis.html", "_self");
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
