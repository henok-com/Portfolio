const headerLogo = document.querySelector("header .logo");
const menuOpen = document.querySelector("header .menu_open");
const menuClose = document.querySelector("header .menu_close");
const links = document.querySelector("header .links");
const portfolioImg = document.querySelector(".portfolio_img");
const portfolioIillustration = document.querySelector(
    ".portfolio_illustration"
);
const skills = document.querySelectorAll(".skill");
const showModal = document.querySelectorAll(".view");
const modal = document.querySelector(".modal");
const modalImg = document.querySelector(".modal img");
const closeModal = document.querySelector(".close_modal");
const passwordField = document.querySelector(".passwordField");
const showPassword = document.querySelector(".showPassword");
const nav = document.querySelector("nav");
const nav_cta = document.querySelector(".nav_cta");
const header = document.querySelector("header");

window.addEventListener("resize", () => {
    if (window.matchMedia("screen and (min-width: 620px)").matches) {
        header.appendChild(nav);
        header.appendChild(nav_cta);
        links.remove();
    }
});

if (window.matchMedia("screen and (min-width: 620px)").matches) {
    header.appendChild(nav);
    header.appendChild(nav_cta);
    links.remove();
}

menuOpen.addEventListener("click", () => {
    links.classList.add("active");
});

menuClose.addEventListener("click", () => {
    links.classList.remove("active");
});

skills.forEach((elem) => {
    const progressBar = elem.querySelector(".progressThumb");
    const percent = elem.querySelector(".percent");
    progressBar.style.width = percent.innerHTML;
});

showModal.forEach((elem) => {
    elem.addEventListener("click", (e) => {
        const work = e.target.parentElement.parentElement.parentElement;
        const imgSrc = work.querySelector(".workImg").src;
        modalImg.src = imgSrc;
        modal.classList.add("active");
    });
});

if (showPassword) {
    showPassword.addEventListener("click", (e) => {
        if (e.target.classList.value.includes("fa-eye-slash")) {
            e.target.classList.remove("fa-eye-slash");
            e.target.classList.add("fa-eye");
            passwordField.type = "password";
        } else {
            passwordField.type = "text";
            e.target.classList.remove("fa-eye");
            e.target.classList.add("fa-eye-slash");
        }
    });
}

closeModal.addEventListener("click", () => {
    modal.classList.remove("active");
});
