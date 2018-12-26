<?php 
include_once('../database/connection.php');
session_start();
if (!isset($_SESSION['username'])){
    die("Página Privada");
}
$username = $_SESSION['username'];
$user = getUserByUsername($username);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Atualizar Foto Pessoal </title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/layout.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
</head>

<div class="container">
<?php include_once('../common/header_aside.php'); ?>

<body>
    <div class="image_container">
        <form class="edit_image" action="../actions/action_upload_profile_pic.php" method="post" enctype="multipart/form-data" >
        <h1>Atualizar Foto Pessoal</h1>
        <label>Selecionar ficheiro pretendido:</label>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <label for="imageUpload" class="button here"> => Clique para escolher imagem <= </label>
            <p><input type="file" name="image" id="imageUpload" style="display: none"> </p>
            <p><input type="submit" value="Submeter Imagem"></p>
        </form>
    </div>  
</body>

<?php include_once('../common/footer.php'); ?>
</div>
</html>