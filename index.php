<?php
$firstname = $name = $email = $phone = $message = "";
$firtsnameError = $nameError = $emailError = $phoneError = $messageError = "";
$isSuccess = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = verifyInput($_POST["firstname"]);
    $name = verifyInput($_POST["name"]);
    $email = verifyInput($_POST["email"]);
    $phone = verifyInput($_POST["phone"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = true;

    if(empty($firstname)){
        $firtsnameError = "Je veux connaitre ton prénom";
        $isSuccess = false;
    }
    if(empty($name)){
        $nameError = "Je veux connaitre ton nom";
        $isSuccess = false;
    }
    if(empty($message)){
        $messageError = "Je veux connaitre ton message";
        $isSuccess = false;
    }
    if(!isEmail($email)){
    $emailError = "Email invalide";
    $isSuccess = false;
    }
    if(!isPhone($phone)){
        $phoneError = "Telephone invalide";
        $isSuccess = false;
        }
    if($isSuccess){
        //envoi de l'email
    }
}
function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}
function isPhone($var){
    return preg_match("/^[0-9]{10}+$/", $var);
}

function verifyInput($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-moi !</title>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="contact-form" method="post" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstname">Prénom <span class="blue"> *</span></label>
                            <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" id="firstname" value="<?php echo $firstname; ?>">
                            <p class="comments"><?php echo $firtsnameError;?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Nom <span class="blue"> *</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Votre nom" id="name" value="<?php echo $name; ?>">
                            <p class="comments"><?php echo $nameError;?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email <span class="blue"> *</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Votre email" id="email" value="<?php echo $email; ?>">
                            <p class="comments"><?php echo $emailError;?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="tel">Téléphone </label>
                            <input type="text" name="phone" class="form-control" placeholder="Votre téléphone" id="phone" value="<?php echo $phone; ?>">
                            <div class="comments"><?php echo $phoneError;?></div>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message <span class="blue"> *</span></label>   
                            <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="4" value="<?php echo $message; ?>"></textarea> 
                            <p class="comments"><?php echo $messageError;?></p>                          
                        </div>
                        <div class="col-md-12">
                            <p class="blue"><strong>* Ces informations sont requises</strong></p>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" value="Envoyer" class="button1">
                        </div>
                    </div>
                    <p class="thank-you" style="display: <?php if($isSuccess) echo 'block'; else echo 'none';?>">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>