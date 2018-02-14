<?php 

if (isset($_POST['foi'])){
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['messages']["warning"][] = "Ton email n&rsquo;est pas valide";
    }else{
        $subject = '[ONLINE FORM] candidature CA';
        $message = $_POST["name"].' '.$_POST["foi"];
        $headers = 'From: membres@lelefan.org' . "\r\n" .
        'Reply-To: '. $_POST["email"] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($to_email, $subject, $message, $headers);
        $page = "thanks";
        $_SESSION['messages']["success"][] = "Merci, ta candidature a bien été prise en compte. A très bientôt.";
    }
};
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Candidature CA l&rsquo;éléfàn</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <?php foreach ($_SESSION['messages']["success"] as $value) { ?>
                    <div class="card-panel green lighten-1"><?php echo $value ?></div>
                <?php } ?>
                <?php foreach ($_SESSION['messages']["error"] as $value) { ?>
                    <div class="card-panel red lighten-1"><?php echo $value ?></div>
                <?php } ?>
                <?php foreach ($_SESSION['messages']["warning"] as $value) { ?>
                    <div class="card-panel orange lighten-1"><?php echo $value ?></div>
                <?php } ?>
                <?php unset($_SESSION['messages']["success"]); ?>
                <?php unset($_SESSION['messages']["error"]); ?>
                <?php unset($_SESSION['messages']["warning"]); ?>
<?php if ($page != "thanks") : ?>
<div class="container">
  <h1 class="header center orange-text">Candidature CA l'éléfàn</h1>
  <div class="row center">
    <h5 class="header col s12 light">Formulaire d'inscription et de présentation des candidats au Conseil d'Administration de l'éléfàn 2018.</h5>
<p>
Les administrateurs sont des bénévoles volontaires qui ont été élus par l'Assemblée Générale et sont donc mandatés par elle pour gérer l'association au quotidien. Si l'Assemblée Générale reste donc l'organe souverain pour toutes les décisions importantes, ce sont bien les administrateurs élus qui mette en oeuvre ces décisions.
<br><br>
Et dans le concret, ça veut dire quoi ?<br>
<ul class="browser-default">
<li>Les administrateurs sont chargés de prendre des décisions importantes, et de valider les décisions des commissions. </li>
<li>Les administrateurs ont une vision globale de la structure (enjeux stratégiques, gouvernance, finances, philosophie et valeurs).</li>
<li>Les administrateurs doivent veiller au bon fonctionnement de l'association : ce qui implique de suivre les comptes et prendre les bonnes décisions pour que l'association reste en bonne santé financière, veiller à une bonne passation des informations, veiller à la sécurité et au bien-être des adhérents, au respect des réglementations qui incombent à une association...</li>
<li>Les administrateurs sont responsables juridiquement (très rarement en leur nom propre, sauf en cas de faute volontaire, généralement en tant que représentants de la personne morale)</li>
<li>Les administrateurs portent la fonction employeur : ce qui veut dire qu'ils décident de si et de qui il faut embaucher ou licencier, et qu'ils veillent au respect du cadre légal et du suivi administratif et humain qui incombent à cette fonction.</li>
<li>Être administrateur c'est donc porter une grande responsabilité, mais c'est aussi avoir un pouvoir important. Un bon administrateur peut également veiller au bon partage du pouvoir pour impliquer au mieux l'ensemble des adhérents d'un projet.</li>
</ul>
<br>
Toute les membres de l'éléfàn vous remercient d'ores et déjà de votre implication.</p>
  </div>
</div>
  <div class="container">
    <div class="section">
        <div class="row">
            <form class="col s12" action="#" method="POST" id="form">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" name="name" type="text" class="validate" value="<?php echo $_POST['name']; ?>">
                        <label for="name">Ton nom &amp; prénom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate" value="<?php echo $_POST['email']; ?>">
                        <label for="email">Ton email</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="foi" name="foi" maxlength="500" class="materialize-textarea"><?php echo $_POST['foi']; ?></textarea>
                        <label for="foi">Ta profession de foi</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Maximum 500 caractères</span>
                    </div>
                    <div class="center">
                        <a class="waves-effect waves-light btn" onclick="document.getElementById('form').submit();"><i class="material-icons left">check</i>Valider</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <form class="col s12">
              <div class="row">
                
            </form>
        </div>
    </div>
  </div>
  <?php else : ?>
<?php endif; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
