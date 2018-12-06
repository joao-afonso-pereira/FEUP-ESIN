<?php 
include_once('database/connection.php');
?>

<!DOCTYPE html>
<html>
<title>Polícia Nacional</title>

<header id="header_public">
    <a href="public.php"><h2>Polícia Nacional</h2></a>
    <button type="log_in" onclick="location.href='log_in.php'">Entrar</button>
<header>

<body>
    <h1>Submeter pessoa desaparecida</h1>
    <div class="image_container">
        <form class="edit_image" action="action_upload.php" method="post" enctype="multipart/form-data">
        <h3>Imagem</h3>
        <label>Escolha um ficheiro</label>
            <input type="file" name="image">
            <input type="submit" value="Inserir">
        </form>
    </div>
    <div class="person_info">
        <form id="missing_person" action="missing_person_action.php" method="post">
            <label>Sexo:</label>
            <label><input type="radio" name="gender" value="male">Masculino</label>
            <label><input type="radio" name="gender" value="female">Feminino</label><br>
            <label>Nome:<input type="text" name="name"></label><br>
            <label>Morada:<input type="text" name="adress"></label><br>
            <label>Descrição física:</label><br>
            <textarea name="physical_description" cols="40" rows="5"></textarea>
            <p>Dica: Use palavras ou frases chave separadas por ponto e vírgula.</p>
            <label>Local do desaparecimento:<input type="text" name="local"></label><br>
            <label>Data do desaparecimento:<input type="date" name="date"></label><br>
            <label>Associar esquadra:</label>
            <p><select name="station">
                    <?php
                    $stations=GetStations();
                    foreach ($stations as $station){?>
                        <option value= <?=$station['id']?>> <?= $station['name'] ?> </option>
                    <?php } ?>          
            </select></p>
            <input type="submit" value="Submeter">
        </form>
    </div>
</body>