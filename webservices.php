<?php
$page_title = "logga in";
include("includes/config.php"); ?>
<?php
/* DB-anslutning */
$db = mysqli_connect(DBHOST, DBUSER, DBPASS, DBDATABASE) or die('Fel vid anslutning');

/* Kontrollera om något argument angetts i adressraden */
$antal = 999; // Maxvärde
if(isset($_GET['antal'])) {
    $antal = intval($_GET['antal']);
}

/* SQL-fråga */
$sql = "SELECT * FROM guestbookpostsv2 LIMIT $antal";
$result = mysqli_query($db, $sql) or die('Fel vid SQL-fråga');

/* Spara resultatet som en associativ array */
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

/* Konvertera till JSON */
$json = json_encode($rows, JSON_PRETTY_PRINT);

/* Utskrift */
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

echo $json;

?>