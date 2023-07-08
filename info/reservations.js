const getback = document.querySelector("#backarrow");
let articles = document.querySelectorAll("article");

getback.addEventListener("click", () => {
  history.go(-1);
});
