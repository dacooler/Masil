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
        <form id="forgorForm" method="post">
          <div class="container">
            <label for="email"><b>E-mail address</b></label>
            <input type="text" placeholder="E-mail address" name="email" required>
            <button type="submit">Send</button>
            <button type="button" onclick="location.href = 'index.php';" class="button-back">Back</button>
          </div>
        </form>
      </div>
    </div>
    <script>
    document.getElementById("forgorForm").addEventListener("submit", async function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const email = encodeURIComponent(formData.get("email"));

      try {
        const response = await fetch(`http://toglivvilgot.pythonanywhere.com/mail/${email}`, {
          method: "GET",
          credentials: "include"
        });

        const data = await response.json();

        if (response.ok) {
          alert("Account recovery e-mail sent.");
        } else {
          alert("Account recovery failed: " + (data.message || ""));
        }
      } catch (err) {
        console.error(err);
        alert("Account recovery failed");
      }
    });
    </script>
  </body>
</html>
