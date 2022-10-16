//* open/close nav bar
function handleClick() {
  const navBar = document.getElementById("navDash");
  const headerBar = document.getElementById("headerDash");
  const mainBar = document.getElementById("mainDash");
  navBar.classList.toggle("active-bar");
  headerBar.classList.toggle("active-bar");
  mainBar.classList.toggle("active-bar");
}
//* open home admin in new tab
function changeTab() {
  // sessionStorage.setItem("user_name", "admin");
  window.open("../index.php");
}
