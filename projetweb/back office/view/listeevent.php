<?php
require_once 'C:\xampp\htdocs\projet\projetweb\back office\controller\eventC.php';

$c = new eventC();
$tab = $c->listeevent();
?>

<center>
    <h1>List of events</h1>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>idEvenement</th>
        <th>Nom</th>
        <th>Description</th>
        <th>image</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Lieu</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach ($tab as $evenement) {
    ?>

        <tr>
            <td><?= $evenement['idEvenement']; ?></td>
            <td><?= $evenement['nom']; ?></td>
            <td><?= $evenement['description']; ?></td>
            <td><?= $evenement['image']; ?></td>
            <td><?= $evenement['date']; ?></td>
            <td><?= $evenement['heure']; ?></td>
            <td><?= $evenement['lieu']; ?></td>
            <td align="center">
                <form method="POST" action="addevent.php">
                    <input type="submit" name="add" value="Add">
                    <input type="hidden" value="<?= $evenement['idEvenement']; ?>" name="idEvenement">
                </form>

                <form method="POST" action="updateevent.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $evenement['idEvenement']; ?>" name="idEvenement">
                </form>

                <a href="deleteevent.php?idEvenement=<?php echo $evenement['idEvenement']; ?>">Delete</a>


            </td>
        </tr>
    <?php
    }
    ?>
</table>
