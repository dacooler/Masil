var dx = 0;
var dy = 0;
var dz = 0;
var dForward = 0;
var dSide = 0;
var posX = 0;
var posY = 0;
var posZ = 0;
var rotateZ = 0;
var rotateY = 0;
const sense = 0.6;
var r = document.querySelector(':root');

function mainLoop() {
  posZ += dForward * Math.cos(rotateZ * Math.PI/180);
  posX += dForward * Math.sin(rotateZ * Math.PI/180);
  posX += dSide * Math.sin((rotateZ + 90) * Math.PI/180);
  posZ += dSide * Math.cos((rotateZ + 90) * Math.PI/180);
  posY += dy;
  r.style.setProperty('--posX', posX);
  r.style.setProperty('--posY', posY);
  r.style.setProperty('--posZ', posZ);
  r.style.setProperty('--rotateZ', rotateZ);
  r.style.setProperty('--rotateY', rotateY);
  lockChangeAlert();

}

setInterval(mainLoop, 20);


document.addEventListener("keydown", (event) => {
  console.log("hej");

  const keyName = event.key;

  if (keyName === "w") {
    dForward = 1;
    return;
  }
  if (keyName === "s"){
    dForward = -1;
    return;
  }
  if (keyName === "a"){
    dSide = 1;
    return;
  }
  if (keyName === "d"){
    dSide = -1;
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
  console.log("HEJ");
  if (!main.pointerLockElement) {
    await main.requestPointerLock({
      unadjustedMovement: true,
    });
  }

});
 document.addEventListener("mousemove", updatePosition);

function lockChangeAlert() {
  if (document.pointerLockElement === main) {
    console.log("The pointer lock status is now locked");
    document.addEventListener("mousemove", updatePosition);
  } else {
    console.log("The pointer lock status is now unlocked");
    document.removeEventListener("mousemove", updatePosition);
  }
}

function updatePosition(e) {
  rotateZ -= e.movementX * sense;
  console.log(rotateY);
    rotateY -= e.movementY * sense;
  if (rotateY > 90){
    rotateY = 90;
  }
  if (rotateY < -90){
    rotateY = -90;
  }

}
