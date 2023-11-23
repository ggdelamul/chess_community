<?php
class Publication
{
    /**
     * fonction permettant de récupérer des informations pour le compte du joueur  
     * @param [objet] $connexion string $filePath
     */
    function addGame($connexion, $filePath)
    {
        try {
            $data = [
                'couleur_joue' => strip_tags($_POST['color']),
                'elo_utilisateur' => strip_tags($_POST['myElo']),
                'elo_adversaire' => strip_tags($_POST['opponentElo']),
                'file_path' => strip_tags($filePath),
                'date_de_publication' => date('Y-m-d H:i:s'),
                'id_utilisateur' => $_SESSION['id'],
                'id_statut' => 1,
            ];
            $insertSql = "INSERT  INTO partie 
            (couleur_joue,elo_utilisateur,elo_adversaire,
            file_path,date_de_publication,id_utilisateur,id_statut) 
            VALUES
            (:couleur_joue,:elo_utilisateur,:elo_adversaire,
            :file_path,:date_de_publication,:id_utilisateur,:id_statut)";
            $insert = $connexion->prepare($insertSql);
            $insert->execute($data);
        } catch (Exception $e) {
            echo "probleme dans l'envoi de donnée";
            var_dump($e);
        }
    }
}
