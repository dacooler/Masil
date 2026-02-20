var dx = 0;
var dy = 0;
var dz = 0;
var posX = 0;
var posY = 0;
var posZ = 0;
var rotateZ = 0;
var rotateY = 0;
var r = document.querySelector(':root');

function mainLoop() {
  posX += dx;
  posY += dy;
  posZ += dz;
  r.style.setProperty('--posX', posX);


}

setInterval(mainLoop, 20);


document.addEventListener("keydown", (event) => {
  console.log("hej");

  const keyName = event.key;

  if (keyName === "w") {
    dx = 1;
    return;
  }

});

document.addEventListener("keyup", (event) => {
  const keyName = event.key;

  // As the user releases the Ctrl key, the key is no longer active,
  // so event.ctrlKey is false.
  if (keyName === "w") {
    dx = 0;
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

}
