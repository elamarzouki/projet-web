<?php
include '../Controller/Utilisateur.php';
$Utilisateur = new Utilisateur();
$list = $Utilisateur->listUtilisateurs();
?>


<html>

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
         
      <div class="float-right">
            <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5" width="80px" 
            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <span style="color: white;" class="font-weight-bold"><?php session_start(); echo $_SESSION['login']; ?></span>
            </div>
        </div>
         
    <center>
        <h1>La liste des utilisateurs</h1>
        <h2>
            <a href="AddUtilisateur.php">Ajouter un utilisateur</a>
        </h2>
    </center>
    <div class="table-responsive">
        <table class="table table-hover table-striped tm-table-striped-even mt-3">
        <thead>
            <tr class="tm-bg-gray">
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col" class="text-center">Prénom</th>
                <th scope="col" class="text-center">Mot de passe</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        
        <?php
        foreach ($list as $utilisateur) {
        ?>
            <tr>
                <td><?= $utilisateur['ID']; ?></td>
                <td><?= $utilisateur['Nom']; ?></td>
                <td><?= $utilisateur['Prénom']; ?></td>
                <td><?= $utilisateur['MDP']; ?></td>
                <td><?= $utilisateur['Email']; ?></td>
                <td><?= $utilisateur['Role']; ?></td>
                <td align="center">
                    <form method="POST" action="UpdateUtilisateur.php">
                        <input class="btn btn-primary" type="submit" name="update" value="Modifier">
                        <input type="hidden" value=<?PHP echo $utilisateur['ID']; ?> name="ID">
                    </form>
                </td>
                <td>
                    <a class="btn btn-danger" href="DeleteUtilisateur.php?ID=<?php echo $utilisateur['ID']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
</body>

</html>