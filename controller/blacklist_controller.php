<?php
$connexion = connexion();
$forbiddenWord = array("select", "truncate", "drop", "alter", "delete");
$blacklist = new Admin;
if ($_SERVER['REQUEST_URI']) {
    $request = strtolower($_SERVER['REQUEST_URI']);
    foreach ($forbiddenWord as $word) {
        if (strpos($request, $word) !== false) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $navigateur = $_SERVER['HTTP_USER_AGENT'];
            $blacklist->addBlacklist($connexion, $ip, $navigateur);
            /*envoi du mail ***************************************/
            $nom = "bdd";
            $email = "projeremylegendre@gmail.com";
            $message = "Alerte blacklist";
            //destinataire du mail 
            $destinataire = "projeremylegendre@gmail.com";
            //préparation du mail 
            $sujet = "Message de contact de " . $nom;
            // Construire le corps du message
            $corpsMessage = "De: $nom\n";
            $corpsMessage .= "Email: $email\n";
            $corpsMessage .= "Message:\n$message";
            // En-têtes de l'e-mail
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            // Envoyer l'e-mail
            mail($destinataire, $sujet, $corpsMessage, $headers);
            /*envoi du mail ***************************************/
            header('location: http://www.staggeringbeauty.com');
        }
    }
}
