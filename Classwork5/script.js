let picArray = ["./images/Black.jpg", "./images/Green", "./images/Red.jpg", "./images/Yellow.jpg"];
let index = 0;

function changeColor(color) {
    document.body.style.backgroundColor = color;
}
function changeRandom() {
    const colors = ["red", "yellow", "green", "black"];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    document.body.style.backgroundColor = randomColor;
}
function nextImage() {
    index = (index + 1) % picArray.length;
    document.getElementById('image').src = picArray[index];
}
function previousImage() {
    index = (index - 1 + picArray.length) % picArray.length;
    document.getElementById('image').src = picArray[index];
}

