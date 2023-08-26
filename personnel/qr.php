<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Comment créer un QR Code en JavaScript ?</title>
</head>
<body>
<img src="https://chart.googleapis.com/chart?cht=qr&chl=https://www.1formatik.com&chs=200x200&chld=L|0" id="qrcode">
<br>
<input type="text" size="60" id="url" placeholder="Contenu du QR Code" />
<button type="button" onclick="creerQRC();">Créer le QR Code</button>
<script>
function creerQRC() {
var url = document.getElementById("url").value;
var qrcode = 'https://chart.googleapis.com/chart?cht=qr&chl=' + encodeURIComponent(url) + '&chs=200x200&choe=UTF-8&chld=L|0';
document.getElementById("qrcode").src = qrcode;
}
</script>
</body>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Comment modifier un lien hypertexte href en JavaScript ?</title>
</head>
<body>
<a href="https://www.google.com" id="lien">Aller sur Google.com</a>
<script>
document.getElementById('lien').href ="https://www.1formatik.com";
document.getElementById("lien").textContent = "Aller sur 1FORMATIK.com";
</script>
</body>
</html>