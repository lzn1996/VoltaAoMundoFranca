const jumbotronContainer = document.querySelectorAll(".jumbotron");
const jumbotronCopy = document.querySelectorAll(".jumbotron-copy");

const randomIntFromInterval = (min, max) => {
  const randomInt = Math.floor(Math.random() * (max - min + 1) + min);
  return randomInt;
};

const generateImage = () => {
  const rndInt = randomIntFromInterval(1, 5);

  jumbotronContainer.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(../assets/img/${rndInt}.jpg)`
    );
  });
  
  jumbotronCopy.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(../assets/img/${rndInt}.jpg)`
    );
  });

  
};

setInterval(generateImage, 15000);

$(document).ready(function () {
  $(".navbar-collapse").on("show.bs.collapse", function () {
    $(".logo").addClass("show-border");
  });

  $(".navbar-collapse").on("hide.bs.collapse", function () {
    $(".logo").removeClass("show-border");
  });
});
