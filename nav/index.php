<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="./src/camera.css">
  <link rel="stylesheet" href="./src/movement.css">
  <link rel="stylesheet" href="./src/index.css">
  <link rel="stylesheet" href="./src/ThreeDStyle.css">
  <link rel="stylesheet" href="./src/world.css">
  <link rel="stylesheet" href="./src/skybox.css">
  </head>
  <body>
    <div class="main" id="main">
      <?php
        require("src/skybox.php");
      ?>
      <?php
        require("src/camera.php");
      ?>
    </div>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
