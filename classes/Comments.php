<?php

class Comments
{
    /**
     * fonction permettant d'afficher les commentaires d'une partie
     *
     * @param [objet] $connexion
     * @param integer $id
     */
    function getCommentForOneGame($connexion, $id)
    {
        try {
            $sql = "SELECT * , commentaire.id, comment, date_publication, pseudo, id_partie FROM commentaire 
        INNER JOIN partie on partie.id = id_partie 
        INNER JOIN utilisateur on utilisateur.id = commentaire.id_utilisateur 
        WHERE commentaire.id_partie = ? AND commentaire.id_statut = 2 order by commentaire.id ASC";
            $stmt = $connexion->prepare($sql);
            $stmt->execute(array(
                $id
            ));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    /**
     * fonction permettant d'ajouter un commentaire en base de donnée 
     *
     * @param [objet] $connexion
     */
    public function addCommentr($connexion)
    {
        try {
            $data = [
                "comment" => strip_tags($_POST["comment"]),
                "date_publication" => date('Y-m-d H:i:s'),
                'id_utilisateur' => $_SESSION['id'],
                'id_statut' => 1,
                'id_partie' => strip_tags($_POST['id_partie']),

            ];
            $insertSql = "insert into commentaire (comment,date_publication,id_utilisateur,id_statut,id_partie) values(:comment,:date_publication,:id_utilisateur,:id_statut,:id_partie)";
            $insert = $connexion->prepare($insertSql);
            $insert->execute($data);
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
    }
}
