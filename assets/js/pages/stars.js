function generateStars(count, max) {
  let shadows = [];
  for (let i = 0; i < count; i++) {
    shadows.push(
      `${Math.random() * max}px ${Math.random() * max}px #fff`
    );
  }
  return shadows.join(", ");
}

document.documentElement.style.setProperty(
  "--stars-small",
  generateStars(700, 2000)
);
document.documentElement.style.setProperty(
  "--stars-medium",
  generateStars(200, 2000)
);
document.documentElement.style.setProperty(
  "--stars-large",
  generateStars(100, 2000)
);


var element = document.getElementById("hero");

function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
}