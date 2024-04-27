<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8" http-equiv="Refresh" content="8; url=strona.html" >
<title>Formularz</title>
</head>
<body>
<?php

if(!isSet($_GET['imie']) || !isSet($_GET['nazwisko']) || !isSet($_GET['plec']) || !isSet($_GET['wynik'])) {
	exit("Brak danych.</body></html>");
}
if($_GET['imie'] == '' || $_GET['nazwisko'] == '' || $_GET['plec'] == '' || $_GET['wynik'] == '') {
	exit("Braaaaak danych.</body></html>");
}

$imie = $_GET['imie'];
$nazwisko = $_GET['nazwisko'];
$plec = $_GET['plec'];
$wynik = $_GET['wynik'];

if (!$db_lnk = mysqli_connect("localhost", "root", "")){
	echo('Wystąpił błąd podczas próby połączenia z serwerem MySQL...<br />');
	echo("</body></html>");
	exit; 
}
if(!mysqli_select_db($db_lnk, "baza")){
	echo('Wystąpił błąd podczas wyboru bazy danych: baza<br />');
	echo("</body></html>");
	exit;
}
else{
	echo('Została wybrana baza danych: baza<br />');
}
$query = "INSERT INTO baza VALUES('$imie', '$nazwisko', '$plec', '$wynik')";

if(!$result = mysqli_query($db_lnk, $query)) {
	@mysqli_close($db_lnk);
	echo ('Wystąpił błąd: zapytanie zostało odrzucone...<br />');
	echo("</body></html>");
	exit;
}

$rowsNo = mysqli_affected_rows($db_lnk);

echo("Liczba dodanych rekordów: $rowsNo <br />");

if(!mysqli_close($db_lnk)){
	echo ('Wystąpił błąd podczas zamykania połączenia z serwerem MySQL');
	echo("</body></html>");
	exit;
}
?>
</body>
</html>