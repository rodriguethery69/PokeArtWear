<?php

require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../function/database.fn.php';
require_once __DIR__ . '../../../function/pokemons.fn.php';
 
$db = getPDOlink($config);
$pokemons = getPokemons($db);

?>;

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
<link rel="stylesheet" href="/assets/CSS/slider.css">
<section class="slider">
  <div class="swiper">
    <div class="swiper-wrapper">
      <?php foreach ($pokemons as $pokemon) : ?>
        <div class="swiper-slide">
          <div class="slider-container">
            <img src="<?= $pokemon['pokemon_image']; ?>" alt="<?= $pokemon['pokemon_nom']; ?>" class="img-fluid rounded-3">
            <span style="background-color: <?= $pokemon['type_couleur']; ?>"><?= $pokemon['pokemon_nom']; ?></span>
            <h2>N°<?= $pokemon['pokemon_id']; ?></h2>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</section>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
<script src="/assets/JS/slider.js"></script>

</body>

</html>