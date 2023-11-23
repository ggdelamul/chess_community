<?php
class Admin
{
    public function showGamesAdmin($connexion)
    {
        try {
            $sql = "SELECT *, partie.id FROM partie INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE id_statut = 1";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function valideGame($connexion, $id)
    {

        try {
            $sql = " UPDATE partie SET  id_statut = 2  WHERE id=? ";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array(
                $id
            ));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    public function showCommentAdmin($connexion)
    {
        try {
            $sql = "SELECT *,commentaire.id FROM commentaire INNER JOIN utilisateur ON utilisateur.id = id_utilisateur WHERE id_statut = 1";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function valideComment($connexion, $id)
    {

        try {
            $sql = " UPDATE commentaire SET  id_statut = 2  WHERE id=? ";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array(
                $id
            ));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    /**
     * fonction permettant de récupérer la liste de tout les joueurs  
     * @param [objet] $connexion 
     */
    public function getAdminAllUsers($connexion)
    {
        try {
            $sql = " SELECT * FROM utilisateur WHERE role_utilisateur = 'inscrit'";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * fonction permettant de supprimer un joueur de la liste des utilsiateurs  
     * @param [objet] $connexion integer $id
     */
    public function adminDelete($connexion, $id)
    {
        try {
            $commentSql = "DELETE FROM commentaire WHERE id_utilisateur=?";
            $rqtResultComment = $connexion->prepare($commentSql);
            $rqtResultComment->execute(array($id));
            $partieSql = "DELETE FROM partie WHERE id_utilisateur=?";
            $rqtResultPartie = $connexion->prepare($partieSql);
            $rqtResultPartie->execute(array($id));
            $userSql = "DELETE FROM utilisateur WHERE id=?";
            $rqtResultUser = $connexion->prepare($userSql);
            $rqtResultUser->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    /**
     * fonction permettant de recupérer une partie de joueur    
     * @param [objet] $connexion integer $id
     */
    public function oneAdminGame($connexion, $id)
    {
        try {
            $sql = "SELECT * FROM partie WHERE id_utilisateur = ?;";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant de supprimerle ficheir   
     * @param string $filePath
     */
    public function adminDeleteFile($filePath)
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
    /**
     * fonction permettant de supprimer la partie à la modération 
     * @param [objet] $connexion integer $id
     */
    public function moderateGame($connexion, $id)
    {
        try {

            $partieSql = "DELETE FROM partie WHERE id=?";
            $rqtResultPartie = $connexion->prepare($partieSql);
            $rqtResultPartie->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    /**
     * fonction permettant de supprimer la partie à la modération 
     * @param [objet] $connexion integer $id
     */
    public function moderateComment($connexion, $id)
    {
        try {

            $commentSql = "DELETE FROM commentaire WHERE id=?";
            $rqtResultComment = $connexion->prepare($commentSql);
            $rqtResultComment->execute(array($id));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
    }
    /**
     * fonction permettant de supprimer la partie à la modération 
     * @param [objet] $connexion integer $id
     */
    public function addBlacklist($connexion, $ip, $navigateur)
    {
        try {
            $data = [
                "ip" => $ip,
                "date_attempt" => date('Y-m-d H:i:s'),
                "navigateur" => $navigateur
            ];
            $insertSql = "INSERT INTO blacklist (ip,date_attempt,navigateur) VALUES(:ip,:date_attempt,:navigateur)";
            $insert = $connexion->prepare($insertSql);
            $insert->execute($data);
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
    }
}
