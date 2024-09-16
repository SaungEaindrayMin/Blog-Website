const navIcon = document.getElementById("navIcon");
const navBar = document.getElementById("navBar");

navIcon.addEventListener("click", () => {
  navBar.classList.toggle("navClose");
});

// For Sign up modal

const openModal = document.getElementById("openModal");
const closeModal = document.getElementById("closeModal");
const modal = document.getElementById("modal");

openModal.addEventListener("click", () => {
  modal.classList.remove("hidden");
});

closeModal.addEventListener("click", () => {
  modal.classList.add("hidden");
});

// For Login Modal

const loginOpenModal = document.getElementById("loginOpenModal");
const loginCloseModal = document.getElementById("loginCloseModal");
const loginModal = document.getElementById("loginModal");

loginOpenModal.addEventListener("click", () => {
  loginModal.classList.remove("hidden");
});

loginCloseModal.addEventListener("click", () => {
  loginModal.classList.add("hidden");
});
