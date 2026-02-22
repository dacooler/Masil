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
        <h3> Please DO login </h3>
        <form id="createUserForm" method="post">
          <div class="imgcontainer">
            <img src="assets/images/flen.jpg" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <label for="email"><b>E-mail address</b></label>
            <input type="text" placeholder="Enter e-mail address" name="email" required>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>

            <button type="submit">Create account</button>
            <button type="button" onclick="location.href = 'index.php';" class="button-back">Back</button>
          </div>
        </form>
      </div>
    </div>
    <script>
    document.getElementById("createUserForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("create_user.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Redirect after successful login
          window.location.href = "nav/";
        } else {
          alert("Account creation failed: " + (data.message || ""));
        }
      })
      .catch(error => {
        console.error(error);
        alert("Account creation failed");
      });
    });
    </script>
  </body>
</html>
