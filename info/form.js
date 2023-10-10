const button = document.querySelector("button");
const title = document.querySelector(".title");
const namee = document.querySelector("#name");
const mail = document.querySelector("#email");
const phone = document.querySelector("#phone");
const date = document.querySelector(".date");
const texta = document.querySelector("textarea");
const confirm = document.querySelector(".after-submit");
const form = document.querySelector("#form1");
const getback = document.querySelector("#backarrow");
const email = document.querySelector("#email");
const logo = document.getElementById("logo1");

logo.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  window.open("/", "_self");
});

getback.addEventListener("click", () => {
  document.body.style.animation = "zoomOut 0.3s forwards";
  history.go(-1);
});

$("form").submit(function () {
  $.post($(this).attr("action"), $(this).serialize());
  return false;
});

function sendEmail() {
  Email.send({
    SecureToken: "c4013222-5fa5-4e0a-a3e8-5cc55d95b661",
    To: "lechaletdelatouveille@gmail.com",
    From: "lechaletdelatouveille@gmail.com",
    Subject: "Nouvelle Réservation !",
    Body:
      "Nom : " +
      document.getElementById("name").value +
      "<br> Email : " +
      document.getElementById("email").value +
      "<br> Téléphone : " +
      document.getElementById("phone").value +
      "<br> Date de réservation du : " +
      document.getElementById("date1").value +
      "<br> jusqu'au : " +
      document.getElementById("date2").value +
      "<br> <br> Message de " +
      document.getElementById("name").value +
      " : " +
      document.getElementById("message").value,
  });
}

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
  sendEmail();
});
