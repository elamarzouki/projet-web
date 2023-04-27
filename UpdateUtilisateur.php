<?php

include '../Controller/Utilisateur.php';
include '../Model/UtilisateurModel.php';


$error = "";

// create utilisateur
//******* $utilisateurModel = null;
  $util = null;

// create an instance of the controller
//******* $utilisateur = new Utilisateur();
$utilisateur = new Utilisateur();

if (
    isset($_POST["ID"]) &&
    isset($_POST["Nom"]) &&
    isset($_POST["Prénom"]) &&
    isset($_POST["MDP"]) &&
    isset($_POST["Email"])&&
    isset($_POST["Role"])
) {
    if (
        !empty($_POST["ID"]) &&
        !empty($_POST['Nom']) &&
        !empty($_POST["Prénom"]) &&
        !empty($_POST["MDP"]) &&
        !empty($_POST["Email"])&&
        !empty($_POST["Role"])
    ) {
        //*******$utilisateurModel = new UtilisateurModel(
            $util = new UtilisateurModel(
            $_POST['ID'],
            $_POST['Nom'],
            $_POST['Prénom'],
            $_POST['MDP'],
            $_POST['Email'],
            $_POST['Role']
        );
        $utilisateur->updateUtilisateur($util/*$utilisateurModel*/, $_POST["ID"]);
        header('Location:ListUtilisateur.php');
    } else
    echo("error");
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
    <button><a href="ListUtilisateur.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['ID'])) {
        /*$utilisateurModel*/ $util = $utilisateur->showUtilisateur($_POST['ID']);
    

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
            <tr>
                    <td>
                        <label for="ID">ID:
                        </label>
                    </td>
                    <td><input type="text" name="ID" id="ID" value="<?php echo /*$utilisateurModel*/ $util['ID']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom">Prénom:
                        </label>
                    </td>
                    <td><input type="text" name="Prénom" id="Prénom" value="<?php echo /*$utilisateurModel*/ $util['Prénom']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" value="<?php echo /*$utilisateurModel*/ $util['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="MDP">Mot de passe:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="MDP" value="<?php echo /*$utilisateurModel*/ $util['MDP']; ?>" id="MDP">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Email">Email:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Email" id="Email" value="<?php echo /*$utilisateurModel*/ $util['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Role">Role:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Role" id="Role" value="<?php echo /*$utilisateurModel*/ $util['Role']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>