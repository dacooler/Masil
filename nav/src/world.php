<?php
$buttons = [
    ['label' => 'Like', 'api' => 'http://toglivvilgot.pythonanywhere.com/like/0'],
];
?>

<!DOCTYPE html>
<html>
<div class="welcome"><div class="spinner"><h1>Courses and programs</h1></div></div>
<div class="like">
  
  <?php foreach ($buttons as $btn): ?>
    <button class="likeBtn"
      data-api="<?= $btn['api'] ?>">
      <?= $btn['label'] ?>
    </button>
  <?php endforeach; ?>

  <script>
    const buttons = document.querySelectorAll('.likeBtn');

    buttons.forEach(button => {
    button.addEventListener('click', () => {
      const apiUrl = button.dataset.api; // read data-api attribute
      fetch(apiUrl, { method: 'GET' })
      });
    });
  </script>
</div>
<div class="news"><div class="spinner"><h1>Masil News</h1></div></div>
<div class="leeHolder"><div class="lee"> <p> Would you like som help?</p></div></div>
</html>
