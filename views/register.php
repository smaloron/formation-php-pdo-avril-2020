<h1>Inscrivez-vous</h1>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors as $message): ?>
                <li><?= $message ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form method="post">

    <div class="form-group">
        <label>Votre nom</label>
        <input type="text" name="userName" class="form-control">
    </div>

    <div class="form-group">
        <label>Votre email</label>
        <input type="email" name="userEmail" class="form-control">
    </div>
    <div class="form-group">
        <label>Votre mot de passe</label>
        <input type="password" name="userPassword" class="form-control">
    </div>

    <button class="btn btn-primary btn-block" type="submit" name="submit">
        Valider
    </button>

</form>