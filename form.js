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

getback.addEventListener("click", () => {
  history.go(-1);
});

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

function sendEmail() {
  Email.send({
    SecureToken: "0189205d-81b8-429a-8e8e-cda90c16e446",
    To: "yannlefebvre0@gmail.com",
    From: "yannlefebvre0@gmail.com",
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
