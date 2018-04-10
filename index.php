<?php
//add variables
if(isset($_POST['valider'])){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $id = $prenom.' '.$nom;
    $objet=$_POST['objet'];
    $msg= 'Vous avez reçu un message de la part de '.$id.'     message: '.$_POST['message'];
    $message=$_POST['message'];
    $to= 'psaulay@gmail.com';
    $error= false;

    // Check email input 
    if (empty($objet)) {
        $error=true;
        $error_object = 'Vous n\'avez pas indiqué l\'objet. <BR>';
    }
    //Check if the input prenom is empty
    if (empty($prenom)) {
        $error=true;
        $error_prenom = 'Vous n\'avez pas indiqué votre prénom. <BR>';
    }
    //Check if the input nom is empty
    if (empty($nom)) {
        $error=true;
        $error_nom = 'Vous n\'avez pas indiqué votre nom <BR>';
    }
    //Check if the input message is empty
    if (empty($message)) {
        $error=true;
        $error_message = 'Vous avez oublié de rédiger un message ! <BR>';
    } 
    if ($error== false) {
        mail($to, $objet, $msg);
        $confirm_message ='Message envoyé !';
    }
}
?>

<html>
    <head>
    <title>Formulaire PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Formulaire PHP</h1>
        <form name="formulaire" method="post" action="index.php">
            Nom : <br/><input class="form-control col-6" type="text" name="nom" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
            <p style="color:red;"><?php if(isset($error_nom)) echo $error_nom; ?></p>
            Prénom : <br/><input class="form-control col-6" type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/>
            <p style="color:red;"><?php if(isset($error_prenom)) echo $error_prenom; ?></p>
            Objet du message :<br/> <input class="form-control col-6" type="text" name="objet" value="<?php if (isset($_POST['objet'])){echo $_POST['objet'];} ?>"/>
            <p style="color:red;"><?php if(isset($error_object)) echo $error_object; ?></p>
            Message : <br/><input class="form-control col-10" type="text" id="message"name="message" value="<?php if (isset($_POST['message'])){echo $_POST['message'];} ?>"/> </input><br/>
            <p style="color:red;"><?php if(isset($error_message)) echo $error_message; ?></p>
            <p style="color:green; font-size:30px;"><?php if(isset($confirm_message)) echo $confirm_message; ?></p>
            <input class="btn " id="submit"type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>