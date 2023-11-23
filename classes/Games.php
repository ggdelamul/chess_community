<?php
class Games
{
    /**
     * fonction permettant de recupérer une partie grace a son id de la partie
     * @param [objet] $connexion integer $id
     */
    public function oneGame($connexion, $id)
    {
        try {
            $sql = "SELECT * FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE partie.id = ? AND  id_statut = 2 ;";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de récupérer les 4 dernières parties enregistré dans la base de donnée  
     * @param [objet] $connexion 
     */
    public function lastGames($connexion)
    {
        try {
            $sql = "SELECT * FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE id_statut = 2 order by partie.id DESC LIMIT 4";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * fonction permettant de récupérer toutes les  parties enregistré dans la base de donnée  
     * @param [objet] $connexion 
     */
    function allGames($connexion)
    {
        try {
            $sql = "SELECT * FROM partie INNER JOIN utilisateur  ON utilisateur.id=id_utilisateur WHERE id_statut = 2";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * fonction permettant de récupérer  les 4 dernières parties enregistré dans la base de donnée  
     * @param [objet] $connexion integer $id
     */
    function LastGamesByPlayer($connexion, $id)
    {
        try {
            $sql = "SELECT *, partie.id FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE utilisateur.id = ?  and id_statut = 2 order by partie.id DESC LIMIT 4 ;";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de récupérer toutes  les parties d'une couleur_joue  
     * @param [objet] $connexion string $id
     */
    public function colorGames($connexion, $color)
    {
        try {
            $sql = "SELECT * FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE couleur_joue = ?  and id_statut = 2;";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($color));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de récupérer toutes  les parties d'un joueur  
     * @param [objet] $connexion string $id
     */
    public function allGamesByPlayer($connexion, $id)
    {
        try {
            $sql = "SELECT *, utilisateur.pseudo, partie.id FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE id_utilisateur = ? and id_statut = 2";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de supprimer une partie
     * @param [objet] $connexion string $id
     */
    public function delete($connexion, $id)
    {
        try {
            $commentSql = "DELETE FROM commentaire WHERE id_partie=?";
            $rqtResultComment = $connexion->prepare($commentSql);
            $rqtResultComment->execute(array($id));
            $partieSql = "DELETE FROM partie WHERE id=?";
            $rqtResultPartie = $connexion->prepare($partieSql);
            $rqtResultPartie->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    /**
     * fonction permettant de supprimer une partie
     * @param [objet] $connexion integer $min integer $max
     */
    function gamesByElo($connexion, $min = 0, $max = 2000)
    {
        try {
            $sql = "SELECT *, partie.id FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE elo_utilisateur BETWEEN $min AND $max  and id_statut = 2";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de supprimer une partie
     * @param string $filePath
     */
    public function deleteFile($filePath)
    {
        $filePath = $filePath;
        // Vérifie si le fichier existe avant de le supprimer
        if (file_exists($filePath)) {
            // Supprime le fichier
            if (unlink($filePath)) {
                echo "Le fichier a été supprimé avec succès.";
            } else {
                echo "Impossible de supprimer le fichier.";
            }
        } else {
            echo "Le fichier n'existe pas.";
        }
    }
}
