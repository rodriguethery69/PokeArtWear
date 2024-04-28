<?php include 'tabcarousel.php'; ?>

<link rel="stylesheet" href="/assets/CSS/carousel.css">

<div class="product-carousel rounded-3 mb-5">
  
<?php
// Boucle à travers chaque élément du tableau $carouselcards
foreach ($carousel as $value) {


echo' <div class="product">
          <div class="product-top">
            <img class="product-image rounded-3" src="' . $value['img'] . '" />
            <!--div class="product-name">
              <p>Product Name</p>
            </div-->
          </div>
          <div class="product-bottom">
            <p class="product-prices">
              <!-- <span class="price-was">£22.00</span> -->
              <!-- <span class="price-save">£10.00</span> -->
              <span class="price">' . $value['prix'] . ' </span>
            </p>
            <button class="shop-now rounded-3">"' . $value['acheter'] . '" </button>
          </div>
      </div>';
}

?>

</div>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://kenwheeler.github.io/slick/slick/slick.js'></script><script  src="/assets/JS/carousel.js"></script>

</body>

</html>