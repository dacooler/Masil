<?php
$buttons = [
  [
    'label' => 'Likes', 
    'like' => 'http://toglivvilgot.pythonanywhere.com/like/0', 
    'getlikes' => 'http://toglivvilgot.pythonanywhere.com/getlikes/0',
    'class' => 'button1'
  ],
  [
    'label' => 'Likes2', 
    'like' => 'http://toglivvilgot.pythonanywhere.com/like/1', 
    'getlikes' => 'http://toglivvilgot.pythonanywhere.com/getlikes/1',
    'class' => 'button2'
  ],
];
?>

<!DOCTYPE html>
<html>
<div class="stop stop1"></div>
<div class="stop stop2"></div>
<div class="stop stop3"></div>
<div class="stop stop4"></div>
<div class="welcome"><div class="spinner"><h1>Courses and programs</h1></div></div>
<div class="carpet"></div>
<div class="carpet2"></div>
<div class="spin1 under"><div class="text ingproff"><h3>Ingenjörsproffesionalism</h3></div></div>
<div class="spin2 under"></div>
<div class="spin3 under"><div class="text kurser"><h3>Courses</h3></div></div>
  <div class="leeHolder"><div class="lee "> <p id="quest"> Would you like some help?</p><input onkeydown="lee(this)" placeholder="Ask" class="noPress" ></input></div></div>
<div class="welcome">
  <div class="spinner">
    <h1>Courses and programs</h1>
  </div>
</div>
  <?php foreach ($buttons as $btn): ?>
<div class="like">
    <button 
      class="noPress likeBtn <?= $btn['class'] ?>"
      data-like="<?= $btn['like'] ?>"
      data-getlikes="<?= $btn['getlikes'] ?>">
      <?= $btn['label'] ?> (0)
    </button>
</div>
  <?php endforeach; ?>

  <script>
    const buttons = document.querySelectorAll('.likeBtn');
    buttons.forEach(button => {
      const likeUrl = button.dataset.like;
      const likesUrl = button.dataset.getlikes;

      // Function to update like count
      function updateLikes() {
        fetch(likesUrl)
          .then(response => response.text())
          .then(data => {
            button.textContent = `Likes: ${data}`;
          });
      }
      
      // Load likes when page loads
      updateLikes();

      // When button is clicked
      button.addEventListener('click', () => {
        fetch(likeUrl)
        .then(() => {
          updateLikes(); // refresh count after liking
        });
      });
    });
  </script>
<div class="news"><div class="spinner"><h1>Masil News</h1></div></div>
<script>
function lee(text){
  if(event.key === 'Enter') {
        text.value = "";
        var elem = document.createElement("p");
        const answers = ["Sorry, i cant help you with that.", "Please ask tommorrow.", "SERVICE DOWN", "Im here to help!", "What did you say?", "No.", "Okay, not my problem."]
        elem.innerHTML = answers[Math.floor(Math.random() * answers.length)];
        text.parentNode.appendChild(elem);
        var quest = document.getElementById("quest");
        quest.style.display = "none";
        setTimeout(function(){
          elem.remove();
          quest.style.display = "inline";
        }, 2000);
    }
}
</script>
</html>
