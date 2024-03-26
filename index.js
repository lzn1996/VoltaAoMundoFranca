const jumbotronContainer = document.querySelectorAll(".jumbotron");

const randomIntFromInterval = (min, max) => {
  const randomInt = Math.floor(Math.random() * (max - min + 1) + min);
  return randomInt;
};

const rndInt = randomIntFromInterval(1, 4);

localStorage.setItem("chosen", rndInt);
const chosen = localStorage.getItem("chosen");

if (rndInt === chosen) {
  jumbotronContainer.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(./assets/img/${rndInt}.jpg)`
    );
  });
} else {
  const rndInt = randomIntFromInterval(1, 4);
  jumbotronContainer.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(./assets/img/${rndInt}.jpg)`
    );
  });
}

const randomAgain = () => {
  const rndInt = randomIntFromInterval(1, 4);
  jumbotronContainer.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(./assets/img/${rndInt}.jpg)`
    );
  });
};

setInterval(randomAgain, 5000);
