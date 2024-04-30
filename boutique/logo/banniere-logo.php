<?php include 'tablogo.php'; ?>

<section class="centre rounded-3">
    <div class="row justify-content-between">
        
<?php
// Boucle à travers chaque élément du tableau $tablogo
foreach ($logo as $value) {

        echo '<div class="col-xs-6 col-md-3 text-center fw-semibold fs-5">
                   <img src="' . $value['img'] . '" class="img-fluid" width="' . $value['largeur'] . '" height="' . $value['hauteur'] . '" alt="' . $value['alt'] . '">
                    <div class="text-dark">' . $value['texte'] . '</div>
               </div>';

}  
  
?>      
        
    </div>
</section>