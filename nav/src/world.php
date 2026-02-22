<?php
$buttons = [
  [
    'label' => 'Likes', 
    'like' => 'http://toglivvilgot.pythonanywhere.com/like/0', 
    'getlikes' => 'http://toglivvilgot.pythonanywhere.com/getlikes/0'
  ],
];
?>

<!DOCTYPE html>
<html>
<div class="welcome">
  <div class="spinner">
    <h1>Courses and programs</h1>
  </div>
</div>
<div class="like">
  <?php foreach ($buttons as $btn): ?>
    <button 
      class="likeBtn"
      data-like="<?= $btn['like'] ?>"
      data-getlikes="<?= $btn['getlikes'] ?>">
      <?= $btn['label'] ?> (0)
    </button>
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
</div>
<div class="news"><div class="spinner"><h1>Masil News</h1></div></div>
</html>