<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <input type="text" name="chLogin" id="chTxtLogin"><br>
        <input type="password" name="chPassword" id="chTxtPassword"><br>
        <input type="date" name="chDateNaissance" id="chTxtDateNaissance"><br>
        <input type="file" name"chAvatar" id="chFicAvatar"><br>
        <select name="chGenre" id="chCbGenre">
            <option value="0">-- sélectionner --</option>
            <opton value="1">Femme</opton>
            <option value="2">Homme</option>
        </select><br>
        <input type="radio" name="chPublic" id="chRdPublic1">-18
        <input type="radio" name="chPublic" id="chRdPublic2">18
        <input type="radio" name="chPublic" id="chRdPublic3">+77
        <br>
        <input type="checkbox" name="chActivite1" id="chActivite1">Cuisine
        <input type="checkbox" name="chActivite2" id="chActivite2">Sport
        <input type="checkbox" name="chActivite3" id="chActivite3">Sieste
        <br>
        <button type="submit">Valider</button>
    </form>
    
</body>
</html>