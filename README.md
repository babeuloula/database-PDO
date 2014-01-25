database-PDO
============

Classe PHP de connexion simplifiée à une base de données via PDO MySQL


Utilisation
===========

    $config = new database();
    
    if($config) {
        $db = $config->getDataBase();

        $requete = $db->prepare("REQUETE");
        if($requete->execute()) {
            // Traitement
        } else {
            $config->getErreur();
        }

        $requete->closeCursor();
    } else {
        $config->getErreur();
    }
