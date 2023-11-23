<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "je récupère des données en POST";
    //récup des données de formualire 
    $nom = strip_tags($_POST["nom"]);
    $email = strip_tags($_POST["mail"]);
    $message = strip_tags($_POST["message"]);
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
    if (mail($destinataire, $sujet, $corpsMessage, $headers)) {
        // header('location: ../contact.php?send=0');
        $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/contact.php?send=0';
        header('location: ' . $redirect_url);
    } else {
        // header('location: ../contact.php?send=1');
        $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . '/chess_community/contact.php?send=1';
        header('location: ' . $redirect_url);
    }
}
