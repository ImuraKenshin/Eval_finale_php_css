<header>
    <?php
        if(!session_isconnected()){
    ?>
            <a href="ouvrir_session.php" title="connexion"><button>Se connecter</button></a>
    <?php
        } else {
    ?>
            <a href="fermer_session.php" title="deconnexion"><button>Se deconnecter</button></a>
    <?php
        }
    ?>

</header>