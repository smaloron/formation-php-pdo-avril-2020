
<div class="text-right mb-4">
    <a class="btn btn-success" href="/?page=personForm">Ajouter une personne</a>
</div>

<table class="table">
    <tr>
        <th>Nom</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Actions</th>
    </tr>

    <?php foreach($personList as $person): ?>
        <tr>
            <td>
                <?= $person["full_name"]?>
            </td>
            <td>
                <?= $person["zip_code"] ?>
            </td>
            <td>
                <?= $person["city"] ?>
            </td>
            <td>
                <a href="/?page=personDeleteWithAddress&id=<?=$person["id"]?>" class="btn btn-danger">Supprimer</a>
            </td>

        </tr>
    <?php endforeach ?>
</table>