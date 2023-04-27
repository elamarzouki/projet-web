<?php
include '../Controller/Utilisateur.php';
$error = "";
$result=null;

// create an instance of the controller
$utilisateur = new Utilisateur();
if (
    isset($_POST["MDP"]) &&
    isset($_POST["Email"])
) {
    if (
        !empty($_POST["MDP"]) &&
        !empty($_POST["Email"])
    ) {
      
        $result=$utilisateur->checkUserExist($_POST["Email"],$_POST["MDP"]);
        if (!empty ($result))
        {
            session_start();
            $_SESSION['login'] = $result;
            header('Location:ListUtilisateur.php'); 
        }
        else{
            $error = "Utilisateur Introuvable";
        }
    } else
        $error = "Champs obligatoires";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="info.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Compte</title>
    <script type="text/javascript">
		function generateCaptcha() {
			var captcha = "";
			var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			for (var i = 0; i < 6; i++) {
				captcha += characters.charAt(Math.floor(Math.random() * characters.length));
			}
			document.getElementById("captcha").innerHTML = captcha;
		}
		
		function checkCursorMovement() {
			var x = event.clientX;
			var y = event.clientY;
			var element = document.getElementById("captcha");
			var rect = element.getBoundingClientRect();
			var left = rect.left;
			var top = rect.top;
			var right = rect.right;
			var bottom = rect.bottom;
			if (x < left || x > right || y < top || y > bottom) {
				alert("Cursor moved outside the captcha box. Please try again.");
				generateCaptcha();
			}
		}
	</script>
</head>

<body  onload="generateCaptcha()">
    <section id="header">
        <img src="C:\Users\33629\Downloads\Ciné-Là\images\logo.png" height="90" width="90">
        <a href="home.html">
            <h2>Ciné-Là</h2> 
        </a>
        
        

        <div>
            <ul id="navbar">
                <li><a href="home.html">Acceuil</a></li>
                <li><a href="shop.html">Films</a></li>
                <li><a class="active" href="Compte.html">Compte</a></li>
                <li><a href="about.html">Abonnement</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    </section>
    <div class="error">
                    <?php echo $error; ?> 
                </div>
    <div class="hello">
        <div class="form-box">
            <div class="button-box">
                <div id="btn-Compte"></div>
                <CENTER><button type="button" class="toggle-btn" onclick="register()">Inscription</button></CENTER>
            </div>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-google"></i>
            </div>
            <form id="login" action="" method="POST" class="input-group">
                <input type="text" class="input-field" placeholder="Email" name="Email" id="Email">
                <input type="password" class="input-field" placeholder="Mot de passe" name="MDP" id="MDP">
                </br>
                <div id="captcha" style="border: 1px solid black; margin : 5px; padding: 5px; display: inline-block;" onmouseout="checkCursorMovement()"></div>
                </br>           
                <button type="submit" class="submit-btn"> Connexion</button>
                </br>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>