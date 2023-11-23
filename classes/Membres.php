<?php

class Membres
{
    /**
     * fonction permettant de récupérer des informations pour la liste des joueurs  
     * @param [objet] $connexion 
     */
    public function showListeMembre($connexion)
    {
        try {
            $sql = " SELECT 
            count(partie.id) AS nbr_partie , 
            pseudo ,
            FLOOR(AVG(elo_utilisateur)) AS moyenneElo,
            partie.id_utilisateur
            FROM partie INNER JOIN utilisateur ON utilisateur.id = partie.id_utilisateur
            GROUP BY partie.id_utilisateur";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * fonction permettant de récupérer des informations pour le compte du joueur  
     * @param [objet] $connexion 
     */
    public function oneAccount($connexion, $id)
    {
        try {
            $sql = "SELECT 
        count(partie.id) AS nbr_partie , 
        pseudo ,
        utilisateur.id,
        FLOOR(AVG(elo_utilisateur)) AS moyenneElo,
        partie.id_utilisateur
        FROM partie INNER JOIN utilisateur ON utilisateur.id = partie.id_utilisateur
        WHERE utilisateur.id = $id";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * fonction permettant de récupérer des informations pour le compte du joueur  
     * @param [objet] $connexion integrer $id
     */

    public function updateLog($connexion, $id)
    {
        try {
            $sql = " UPDATE utilisateur SET pseudo=? , mot_de_passe=? WHERE id=? ";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array(
                strip_tags($_POST['newpseudo']),
                hash('sha256', $_POST['newpassword']),
                $id
            ));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
}
