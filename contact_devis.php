
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>I&H Polymer Engineering </title>
	<link rel="icon" href="img/favicon (1).png" />
	<style>
	
		.success-message {
  text-align: center;
  max-width: 500px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.body{
	font-family: "Roboto", sans-serif;
}
.success-message__icon {
  max-width: 75px;
}

.success-message__title {
  color: #3DC480;
  transform: translateY(25px);
  opacity: 0;
  transition: all 200ms ease;
}
.active .success-message__title {
  transform: translateY(0);
  opacity: 1;
}

.success-message__content {
 
  transform: translateY(25px);
  opacity: 0;
  transition: all 200ms ease;
  transition-delay: 50ms;
}
.success-message__content a{
	color: #B8BABB;
	text-decoration:none;
}
.active .success-message__content {
  transform: translateY(0);
  opacity: 1;
}

.icon-checkmark circle {
  fill: #3DC480;
  transform-origin: 50% 50%;
  transform: scale(0);
  transition: transform 200ms cubic-bezier(0.22, 0.96, 0.38, 0.98);
}
.icon-checkmark path {
  transition: stroke-dashoffset 350ms ease;
  transition-delay: 100ms;
}
.active .icon-checkmark circle {
  transform: scale(1);
}

</style>

</head>
<body>
	

<div class="success-message">
    <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
        <circle cx="38" cy="38" r="36"/>
        <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>
    </svg>
    <h1 class="success-message__title">Message Envoyé</h1>
    <div class="success-message__content">
        <a href="index.html"><p>Page d'accueil</p></a>
    </div>
</div>

<?php

$to = "heithemkacem2019@gmail.com";
$from = $_POST['email'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$cadresse = $_POST['address'];
$cnumber = $_POST['phone'];
$cetab = $_POST['etab'];
$cactivite = $_POST['activite'];
$cposte = $_POST['post_o'];
$survey_one = $_POST['survey_one'];
$survey_two = $_POST['survey_two'];
$survey_three = $_POST['survey_three'];
$descdevis= $_POST['message_devis']


$headers = "From: $from";
  $headers = "From: " . $from . "\r\n";
  $headers .= "Reply-To: ". $from . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "Vous avez un message de votre site ! (Devis)";

$logo = './Images/logo.png';
$link = 'https://ihpolymereng.000webhostapp.com/';
$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "</td></tr></thead><tbody><tr>";
$body .= "<td style='border:none;'><strong>First name:</strong> {$fname}</td>";
$body .= "<td style='border:none;'><strong>Last name:</strong> {$lname}</td>";
$body .= "</tr>";

$body .= "<tr><td style='border:none;'><strong>Adresse:</strong> {$cadresse}</td>";
$body .= "<td style='border:none;'><strong>Phone:</strong> {$phone}</td>";
$body .= "</tr>";

$body .= "<tr><td style='border:none;'><strong>Etablissment:</strong> {$cetab}</td>";
$body .= "<td style='border:none;'><strong>Activite:</strong> {$cactivite}</td>";
$body .= "</tr>";

$body .= "<tr><td style='border:none;'><strong>Poste occupe:</strong> {$cposte}</td>";
$body .= "</tr>";

$body .= "<tr><td style='border:none;'><strong>Seriez-vous intéressé par licence d’essai ?:</strong> {$survey_one}</td>";
$body .= "<td style='border:none;'><strong>Acceptez-vous de remplir un questionnaire sur l’utilisation de Nons solutions logicielles ?:</strong> {$survey_two}</td>";
$body .= "<td style='border:none;'><strong>Seriez-vous intéressé par un séminaire ou une formation ? :</strong> {$survey_three}</td>";
$body .= "</tr>";

$body .= "<tr><td></td></tr>";

$body .= "</tbody></table>";
$body .= "</body></html>";

$send = mail($to, $subject, $body, $headers);

?>
</body>
<script>
	function PathLoader(el) {
	this.el = el;
    this.strokeLength = el.getTotalLength();
	
    // set dash offset to 0
    this.el.style.strokeDasharray =
    this.el.style.strokeDashoffset = this.strokeLength;
}

PathLoader.prototype._draw = function (val) {
    this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
}

PathLoader.prototype.setProgress = function (val, cb) {
	this._draw(val);
    if(cb && typeof cb === 'function') cb();
}

PathLoader.prototype.setProgressFn = function (fn) {
	if(typeof fn === 'function') fn(this);
}

var body = document.body,
    svg = document.querySelector('svg path');

if(svg !== null) {
    svg = new PathLoader(svg);
    
    setTimeout(function () {
        document.body.classList.add('active');
        svg.setProgress(1);
    }, 200);
}

document.addEventListener('click', function () {
    
    if(document.body.classList.contains('active')) {
        document.body.classList.remove('active');
        svg.setProgress(0);
		document.location.href='index.html';
        return;

    }
    document.body.classList.add('active');
    svg.setProgress(1);
	document.location.href='index.html';
});
</script>
</html>
