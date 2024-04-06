var navLinks = document.querySelectorAll(".nav-item a");

navLinks.forEach(function (link) {
  link.addEventListener("click", function (e) {
    navLinks.forEach(function (navLink) {
      navLink.classList.remove("active");
    });

    link.classList.add("active");
  });
});
