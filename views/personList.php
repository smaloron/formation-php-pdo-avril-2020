<table class="table">
    <tr>
        <th>Nom</th>
    </tr>

    <?php foreach($personList as $person): ?>
        <tr>
            <td>
                <?= $person["first_name"]?> <?= $person["person_name"] ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>