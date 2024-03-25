<?php include 'onglets.php'; ?>

<?php
// Boucle à travers chaque élément du tableau $onglets
foreach ($onglets as $value) {
    // Affichage de chaque onglet sous forme d'un élément de liste
  echo '<li class="nav-item">
            <a class="nav-link text-white rounded-top" href="' . $value['href'] . '">' . $value['onglet'] . '</a>
        </li>';
}
?>
