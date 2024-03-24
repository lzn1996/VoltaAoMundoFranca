const jumbotronContainer = document.querySelector(".jumbotron");

const randomIntFromInterval = (min, max) => {
  const randomInt = Math.floor(Math.random() * (max - min + 1) + min);
  return randomInt;
};

const rndInt = randomIntFromInterval(1, 4);

localStorage.setItem("chosen", rndInt);
const chosen = localStorage.getItem("chosen");

if (rndInt === chosen) {
  jumbotronContainer.setAttribute(
    "style",
    `background-image: url(./assets/img/${rndInt}.jpg)`
  );
} else {
  const rndInt = randomIntFromInterval(1, 4);
  jumbotronContainer.setAttribute(
    "style",
    `background-image: url(./assets/img/${rndInt}.jpg)`
  );
}

const randomAgain = () => {
  const rndInt = randomIntFromInterval(1, 4);
  jumbotronContainer.setAttribute(
    "style",
    `background-image: url(./assets/img/${rndInt}.jpg)`
  );
};

setInterval(randomAgain, 2000);
