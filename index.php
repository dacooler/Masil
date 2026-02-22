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
        <form id="loginForm" method="post">
          <div class="imgcontainer">
            <img src="assets/images/flen.jpg" alt="Avatar" class="avatar">
          </div>
          <div class="container">
            <label for="uname"><b>Username or e-mail address</b></label>
            <input type="text" placeholder="Enter username or e-mail address" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>

            <button type="submit">Login</button>
            <button type="button" onclick="location.href = 'create_user_front.php';">Create account</button>
          </div>
        </form>
        <div style="text-align:center;">
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="location.href = 'forgor_pass_front.php';" class="forgorBtn">Forgot password?</button>
          </div>
        </div>
      </div>
    </div>
    <script>
    document.getElementById("loginForm").addEventListener("submit", async function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const uname = encodeURIComponent(formData.get("uname"));
      const psw = encodeURIComponent(formData.get("psw"));

      try {
        const response = await fetch(`http://toglivvilgot.pythonanywhere.com/users/login/${uname}/${psw}`, {
          method: "GET",
          credentials: "include"
        });

        const data = await response.json();

        if (response.ok) {
          window.location.href = "nav/";
        } else {
          alert("Login failed: " + (data.message || ""));
        }
      } catch (err) {
        console.error(err);
        alert("Login failed");
      }
    });
    </script>
  </body>
</html>
