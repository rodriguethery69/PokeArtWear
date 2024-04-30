<?php include 'tabs/tabliste.php'; ?>

</main>

<footer>
    <section class="footer">
        <container class="d-flex justify-content-around align-items-center">
            <ul class="list-group text-white">
            <?php
// Boucle à travers chaque élément du tableau $listes
foreach ($listes as $value) {
    // Affichage de chaque onglet sous forme d'un élément de liste
  echo '<a href="' . $value['href'] . '">
            <li class="text-white">' . $value['texte'] . '</li>
        </a>';
}
?>
            </ul>

            <div class="image mb-5">
                <img src="/assets/footer/footer.png" class="img-fluid" alt="image de trois pokeballs">
                <div class="text-center">
                    <a href="#" onclick="showOrejime()" class="text-white">Modifier vos préférences de Cookies</a>
                    <script>
                        function showOrejime() {
                            Orejime.show();
                        }
                    </script>
                </div>
            </div>

            <div class="list mt-3">
                <ul class="list-group d-flex flex-row gap-3">
            <?php
                // Boucle à travers chaque élément du tableau $tablogo
                foreach ($icones as $value) {
                    echo '<a href="' . $value['href'] . '"><img src="' . $value['img'] . '" class="img-fluid" alt="' . $value['alt'] . '"
                        width="' . $value['largeur'] . '" height="' . $value['hauteur'] . '"></a>';
        }  
        ?> 
                </ul>
            </div>
        </container>
    </section>
</footer>
</body>

</html>