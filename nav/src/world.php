<?php
$buttons = [
    ['label' => 'Like', 'api' => 'http://toglivvilgot.pythonanywhere.com/like/0'],
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
<div class="spin1 under"></div>
<div class="spin2 under">
</div>
<div class="like">
  
  <?php foreach ($buttons as $btn): ?>
    <button class="likeBtn noPress"
      data-api="<?= $btn['api'] ?>">
      <?= $btn['label'] ?>
    </button>
  <?php endforeach; ?>

  <script>
    const buttons = document.querySelectorAll('.likeBtn');
    buttons.forEach(button => {
    button.addEventListener('click', () => {
      const apiUrl = button.dataset.api; // read data-api attribute
      fetch(apiUrl, { 
        method: 'GET',
        credentials: 'include'
      })
      });
    });
  </script>
</div>
<div class="news"><div class="spinner"><h1>Masil News</h1></div></div>
<div class="leeHolder"><div class="lee "> <p id="quest"> Would you like some help?</p><input onkeydown="lee(this)" placeholder="Ask" class="noPress" ></input></div></div>
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
