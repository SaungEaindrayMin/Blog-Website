const modal = document.getElementById("modal");
const LoginopenModal = document.getElementById("loginOpenModal");
const closeModal = document.getElementById("closeModal");
const LoginModal = document.getElementById("loginModal");
const signupOpenModal = document.getElementById("openModal");

signupOpenModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

LoginopenModal.addEventListener("click",() => {
    LoginModal.classList.remove("hidden");
});


closeModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});





