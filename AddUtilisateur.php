<?php

include '../Controller/Utilisateur.php';
include '../Model/UtilisateurModel.php';

$error = "";

// create utilisateur
//$utilisateur = null;

// create an instance of the controller
$utilisateur = new Utilisateur();
if (
    isset($_POST["Prénom"]) &&
    isset($_POST["Nom"]) &&
    isset($_POST["MDP"]) &&
    isset($_POST["Email"])&&
    isset($_POST["Role"])
) {
    if (
        !empty($_POST['Prénom']) &&
        !empty($_POST["Nom"]) &&
        !empty($_POST["MDP"]) &&
        !empty($_POST["Email"])&&
        !empty($_POST["Role"])
    ) {
        $UtilisateurModel = new UtilisateurModel(
            null,
            $_POST['Prénom'],
            $_POST['Nom'],
            $_POST['MDP'],
            $_POST['Email'],
            $_POST['Role']
        );
        $utilisateur->addUtilisateur($UtilisateurModel);
        header('Location:ListUtilisateur.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body>
    <a href="ListUtilisateurs.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">
        <tr>
                <td>
                    <label for="ID">ID:
                    </label>
                </td>
                <td><input type="int" name="ID" id="ID" maxlength="20"></td>
            </tr>

            <tr>
                <td>
                    <label for="Prenom">Prénom:
                    </label>
                </td>
                <td><input type="text" name="Prénom" id="Prénom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="Nom">Nom:
                    </label>
                </td>
                <td><input type="text" name="Nom" id="Nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="MDP">Mot de passe:
                    </label>
                </td>
                <td>
                    <input type="text" name="MDP" id="MDP">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Email">Email:
                    </label>
                </td>
                <td>
                    <input type="text" name="Email" id="Email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Role">Role:
                    </label>
                </td>
                <td>
                    <input type="text" name="Role" id="Role">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input class="btn btn-primary" type="submit" value="Ajouter">
                </td>
                <td>
                    <input class="btn btn-primary" type="reset" value="Annuler">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>