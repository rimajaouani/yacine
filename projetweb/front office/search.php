<?php
require_once 'C:\xampp\htdocs\projet\projetweb\back office\controller\eventC.php';

$c = new eventC();
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$tab = $c->searchEventByName($searchTerm); // Ajoutez cette méthode à votre classe eventC

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Ajoutez ici les liens vers les fichiers CSS nécessaires -->
  <link href="css/bootstrap.min.css" rel="stylesheet" >
  <link href="css/font-awesome.min.css" rel="stylesheet" >
  <link href="css/global.css" rel="stylesheet">
  <link href="css/event.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz@9..144&display=swap" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- Ajoutez le contenu de votre page ici -->
  <center>
    <h1>Search Results</h1>
  </center>
  <table border="1" align="center" width="70%">
    <tr>
        <th>IdEvenement</th>
        <th>Nom</th>
        <th>Description</th>
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
  <!-- Ajoutez le style CSS ici -->
  <style>
    table {
        border-collapse: collapse;
        width: 70%;
        margin: auto;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: black;
        color: white;
    }

    td {
        background-color: black;
        color: white;
    }
  </style>
</body>
</html>
