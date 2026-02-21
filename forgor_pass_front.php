<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./assets/homeStyle.css">
</head>
  <body>
    <div class="main">
      <div class="header">
        <h1> MASIL </h1>
      </div>
      <div class="login">
        <h3> Recover password </h3>
        <form action="forgor_pass.php" method="post">
          <div class="imgcontainer">
            <img src="assets/images/flen.jpg" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <label for="email"><b>E-mail address</b></label>
            <input type="text" placeholder="E-mail address" name="email" required>
            <button type="submit">Send</button>
            <button type="button" onclick="location.href = 'index.php';" class="button-back">Back</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
