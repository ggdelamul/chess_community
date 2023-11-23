<?php
class Authentification
{
    /**
     * fonction permettant de récupérer tout les utilisateurs de la bdd
     * @param [objet] $connexion
     */
    public function allUser($connexion)
    {
        try {
            $sql = "SELECT * FROM utilisateur";
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * fonction permettant de récupérer d'ajouter un utilisateur dans la base de donnée 
     * @param [objet] $connexion
     */
    public function addUser($connexion)
    {
        $hashedPassword = hash('sha256', $_POST["password"]);
        try {
            $data = [
                "pseudo" => htmlspecialchars($_POST["pseudo"]),
                "mail" => htmlspecialchars($_POST["mail"]),
                "mot_de_passe" => $hashedPassword,
                "role_utilisateur" => "inscrit"
            ];
            $insertSql = "INSERT INTO utilisateur (pseudo,mail,mot_de_passe,role_utilisateur) VALUES(:pseudo,:mail,:mot_de_passe,:role_utilisateur)";
            $insert = $connexion->prepare($insertSql);
            $insert->execute($data);
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
    }
    /**
     * fonction permettant de récupérer l'utilisateur via son pseudo et son mot de passe 
     * @param [objet] $connexion, string $pseudo , string $password
     */
    public function oneUser($connexion, $pseudo, $password)
    {
        try {
            $sql = "SELECT * FROM utilisateur WHERE pseudo = ? AND mot_de_passe = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array($pseudo, $password));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
