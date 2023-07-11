<form action="<?= site_url().'/user/insert' ?>" method="post">
    <p>Nom: <input type="text" name="nom"></p>
    <p>Email:<input type="text" name="email"> </p>
    <p>Password: <input type="password" name="mdp"></p>
    <p>Genre: 
        <select name="idgenre">
            <option value="1">Masculin</option>
            <option value="2">Féminin</option>
        </select>
    </p>
    <p>Poids: <input type="number" name="poids"> </p>
    <p>Taille: <input type="number" name="taille"></p>
    <p><button type="submit">Valider</button></p>
</form>