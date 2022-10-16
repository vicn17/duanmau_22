//* handle nav header when scroll
window.addEventListener("scroll", function () {
  var nav = document.querySelector(".menu_header");
  nav.classList.toggle("sticky", window.scrollY > 0);
});
