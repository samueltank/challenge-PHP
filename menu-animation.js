const containerMenu = document.getElementById("container-menu");
const list          = document.getElementById("list");

containerMenu.classList.remove("active");
list.classList.remove("active");

containerMenu.addEventListener("click", () => {
  containerMenu.classList.toggle("active");
  list.classList.toggle("active");
});