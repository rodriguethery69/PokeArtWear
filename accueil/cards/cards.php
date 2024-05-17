<?php include 'tabscards.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="/assets/CSS/cards.css">


<?php
// Boucle à travers chaque élément du tableau $tabscards
foreach ($cards as $value) {

echo '<ol class="cards__container">
  <li class="card">
    <div class="card__thumb rounded-2"><img class="img-fluid" src="' . $value['img'] . '" /></div>
    <div class="card__content rounded-2">
      <h3 class="card__title">' . $value['card_title'] . '</h3>
      <p class="card__text">' . $value['card_text'] . '</p>
      <a button type="button" class="btn btn-dark btn-lg" href="' . $value['href'] . '">' . $value['titre'] . '</button></a>
    </div>
  </li>
</ol>';

}
?>
