<h3><?= $pageTitle ?></h3>

<form method="post">
    <div class="row">
        <fieldset class="col">
            <legend>Personne</legend>

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" name="person[firstName]">
            </div>

            <div class="form-group">
                <label>Nom de famille</label>
                <input type="text" class="form-control" name="person[personName]">
            </div>

            <div class="form-group">
                <label>Profession</label>
                <input  type="text" 
                        class="form-control" name="person[profession]" 
                        list="professions">

                <datalist id="professions">
                    <?php foreach ($professionList as $profession): ?>
                        <option value="<?= $profession["profession_name"] ?>"></option>
                    <?php endforeach ?>
                </datalist>

            </div>

        </fieldset>

        <fieldset class="col">
            <legend>Adresse</legend>

            <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control" name="address[street]">
            </div>
            <div class="form-group">
                <label>Code postal</label>
                <input type="text" class="form-control" name="address[zipCode]">
            </div>

            <div class="form-group">
                <label>Ville</label>
                <input type="text" class="form-control" name="address[city]">
            </div>
        </fieldset>
    </div>
    <div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">
            Valider
        </button>
    </div>


</form>