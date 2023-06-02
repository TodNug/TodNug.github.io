const button = document.querySelector("button");
const title = document.querySelector(".title");
const namee = document.querySelector("#name");
const mail = document.querySelector("#email");
const phone = document.querySelector("#phone");
const date = document.querySelector(".date");
const texta = document.querySelector("textarea");
const confirm = document.querySelector(".after-submit");
const form = document.querySelector("#form1");

form.addEventListener("submit", () => {
  title.style.display = "none";
  namee.style.display = "none";
  mail.style.display = "none";
  phone.style.display = "none";
  date.style.display = "none";
  texta.style.display = "none";
  button.style.display = "none";
  confirm.style.display = "block";
  confirm.style.marginTop = "10px";
});
