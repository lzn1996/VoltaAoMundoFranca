const navbarLinks = document.querySelectorAll(".link-underline");
const currentPage = window.location.href;
const pageName = currentPage.split("/").pop().split(".")[0];

navbarLinks.forEach((link) => {
  const linkHref = link.href.split("/").pop().split(".")[0];

  if (!linkHref && pageName === "index") {
    link.setAttribute(
      "style",
      "text-decoration: underline; text-underline-offset: 4px"
    );
    return;
  }

  if (linkHref === pageName) {
    link.setAttribute(
      "style",
      "text-decoration: underline; text-underline-offset: 4px"
    );
  }
});
