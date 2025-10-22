document.getElementById("menuToggle").addEventListener("click", function () {
const nav = document.querySelector("nav");
nav.classList.toggle("active");
if (nav.classList.contains("active")) {
this.textContent = "\u2716";
} else {
this.textContent = "\u2630";
}
});