<?php 
include_once('../database/connection.php');
session_start();
if (!isset($_SESSION['username'])){
    die("Página Privada");
}
$username=$_SESSION['username'];
$user = getUserByUsername($username);
if (!isset($_GET['station'])){
    die("Não Autorizado");
}
$station = GetStationByID($_GET['station']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "Esquadra " . $station['name'] ?></title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/layout.css" rel="stylesheet">
</head>

<div class="container">
<?php include_once('../common/header_aside.php'); ?>

<body>
    <div id="station_info">
        <h1> <?php echo $station['name']?> </h1>
        <p> Morada: <?php echo $station['adress'] ?> </p>
        <p> Cidade: <?php echo $station['city'] ?> </p>
        <?php $chief=getUserByUsername($station['chief']) ?>
        <p> Chefe de Esquadra: <?php echo $chief['fullname'] ?> </p>
    </div>
  
    <div id="personnel">
        <h2>Equipa: </h2>
        
        <?php $position="Detetive";
        $detectives=GetPersonnelStation($position,$station["id"])?>
        <p> Detetives: </p>
             <ul>
             <?php foreach($detectives as $detective) { ?>
                    <li> <?php echo $detective['fullname'] ?> </li> 
            <?php } ?>
            </ul>

        <?php $position="Polícia";
        $polices=GetPersonnelStation($position,$station["id"])?> 
        <p> Polícias: </p>
             <ul>
             <?php foreach($polices as $police) { ?>
                    <li> <?php echo $police['fullname'] ?> </li> 
            <?php } ?>
            </ul>
    </div>
</body>

<?php include_once('../common/footer.php'); ?>
</div>
</html>