var dx = 0;
var dy = 0;
var dz = 0;
var dForward = 0;
var dSide = 0;
var posX = -200;
var posY = 0;
var posZ = -200;
var camera_radius = 10;
var rotateZ = 0;
var rotateY = 0;
const sense = 0.6;
var r = document.querySelector(':root');
var ground = document.querySelector('.ground');
var boxes = [];

class Box {
  constructor({
    position = { x: 200, y: 200 },
    width = 100,
    height = 100,
    hclass = '',
  }) {
    this.position = position
    this.width = width
    this.height = height
    this.class = hclass
}
  get_element() {
    var temp = document.createElement('div');
    temp.className = this.class + " cubed";
    temp.style.setProperty('--cWidth', this.width + 'px');
    temp.style.setProperty('--cHeight', this.height + 'px');
    temp.style.setProperty('top', this.position.x + 'px');
    temp.style.setProperty('left', this.position.y + 'px');
    temp.style.setProperty('position', 'absolute');
    for (let i = 0; i < 6; i++) {
      temp.appendChild(document.createElement('div'));
    }
    return temp;
  }
}

var box1 = new Box({
  position: { x: 500, y: 500 },
  width: 100,
  height: 100,
  hclass: 'navThing',
});
var elem = box1.get_element();
var child = elem.children[1];
var iframe = document.createElement('iframe');
iframe.src = "../course/ingproff.php"
child.appendChild(iframe);
ground.appendChild(elem);
boxes.push(box1);

var newsBox = new Box({
  position: { x: 3000, y: 500 },
  width: 100,
  height: 100,
  hclass: 'navThing',
});
ground.appendChild(newsBox.get_element());
boxes.push(newsBox);

var wall1 = new Box({
  position: { x: -100, y: -100},
  width: 5100,
  height: 100,
  hclass: 'wall',
});
ground.appendChild(wall1.get_element());
boxes.push(wall1);

var wall2 = new Box({
  position: { x: 4000, y: 0},
  width: 4100,
  height: 100,
  hclass: 'wall',
});
ground.appendChild(wall2.get_element());
boxes.push(wall2);

var wall3 = new Box({
  position: { x: 0, y: -100},
  width: 100,
  height: 4100,
  hclass: 'wall',
});
ground.appendChild(wall3.get_element());
boxes.push(wall3);

var wall4 = new Box({
  position: { x: -100, y: 4000},
  width: 100,
  height: 4100,
  hclass: 'wall',
});
ground.appendChild(wall4.get_element());
boxes.push(wall4);


function collision({Box: box }) {
  return (
    -(posX) + camera_radius > box.position.y && // box1 right collides with box2 left
    -(posX) - camera_radius < box.position.y + box.width && // box2 right collides with box1 left
    -(posZ) + camera_radius > box.position.x && // box1 bottom collides with box2 top
    -(posZ) - camera_radius < box.position.x + box.height// box1 top collides with box2 bottom
  )
}


function mainLoop() {
  var prevPosZ = posZ;
  var prevPosX = posX;
  posZ += dForward * Math.cos(rotateZ * Math.PI/180);
  posX += dForward * Math.sin(rotateZ * Math.PI/180);
  posX += dSide * Math.sin((rotateZ + 90) * Math.PI/180);
  posZ += dSide * Math.cos((rotateZ + 90) * Math.PI/180);
  posY += dy;
  for (let i = 0; i < boxes.length; ++i) {
    if (collision({Box: boxes[i]})) {
      posX = prevPosX;
      posZ = prevPosZ;
      console.log("colision");
    }
  }
  r.style.setProperty('--posX', posX);
  r.style.setProperty('--posY', posY);
  r.style.setProperty('--posZ', posZ);
  r.style.setProperty('--rotateZ', rotateZ);
  r.style.setProperty('--rotateY', rotateY);
}

setInterval(mainLoop, 20);


document.addEventListener("keydown", (event) => {

  const keyName = event.key;

  if (keyName === "w") {
    dForward = 10;
    return;
  }
  if (keyName === "s"){
    dForward = -10;
    return;
  }
  if (keyName === "a"){
    dSide = 10;
    return;
  }
  if (keyName === "d"){
    dSide = -10;
    return;
  }

});

document.addEventListener("keyup", (event) => {
  const keyName = event.key;

  // As the user releases the Ctrl key, the key is no longer active,
  // so event.ctrlKey is false.
  if (keyName === "w") {
    dForward = 0;
    return;
  }
  if (keyName === "s") {
    dForward = 0;
    return;
  }
  if (keyName === "a") {
    dSide = 0;
    return;
  }
  if (keyName === "d") {
    dSide = 0;
    return;
  }
});
const main = document.getElementById("main");

main.addEventListener("click", async () => {
  if (!main.pointerLockElement) {
    await main.requestPointerLock({
      unadjustedMovement: true,
    });
  }

});
 document.addEventListener("mousemove", updatePosition);

function lockChangeAlert() {
  if (document.pointerLockElement === main) {
    document.addEventListener("mousemove", updatePosition);
  } else {
    document.removeEventListener("mousemove", updatePosition);
  }
}
document.addEventListener("pointerlockchange", lockChangeAlert);
lockChangeAlert();

function updatePosition(e) {
  rotateZ -= e.movementX * sense;
    rotateY -= e.movementY * sense;
  if (rotateY > 90){
    rotateY = 90;
  }
  if (rotateY < -90){
    rotateY = -90;
  }

}
