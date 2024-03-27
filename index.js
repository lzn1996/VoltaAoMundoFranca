const jumbotronContainer = document.querySelectorAll(".jumbotron");

const randomIntFromInterval = (min, max) => {
  const randomInt = Math.floor(Math.random() * (max - min + 1) + min);
  return randomInt;
};

const generateImage = () => {
  const rndInt = randomIntFromInterval(1, 4);

  jumbotronContainer.forEach((item) => {
    item.setAttribute(
      "style",
      `background-image: url(../assets/img/${rndInt}.jpg)`
    );
  });
};

setInterval(generateImage, 5000);
