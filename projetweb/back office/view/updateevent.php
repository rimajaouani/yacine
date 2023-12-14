<?php

require_once 'C:\xampp\htdocs\projet\projetweb\back office\controller\eventC.php';
require_once 'C:\xampp\htdocs\projet\projetweb\back office\model\events.php';
$error = "";

// create client
$evenement = null;
// create an instance of the controller
$eventC = new eventC();


if (
    isset($_POST["idEvenement"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["image"]) &&
    isset($_POST["date"])&&
    isset($_POST["heure"]) &&
    isset($_POST["lieu"]) 
) {
    if (
        !empty($_POST['idEvenement']) &&
        !empty($_POST['nom']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["heure"])&&
        !empty($_POST["lieu"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        echo "Reached here 1";
        $evenement = new evenement(
            null,
            $_POST['idEvenement'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['image'],
            new DateTime($_POST['date']),
            $_POST['heure'],
            $_POST['lieu']
        );
        var_dump($evenement);
         echo "Reached here 2";
    
        
        $eventC->updateevent($evenement, $_POST['idEvenment']);

        header('Location:listeevent.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listeevent.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idEvenement'])) {
        $evenement = $eventC->showevent($_POST['idEvenement']);
        
    ?>

            <form action="" method="POST" ...>
            <table>
            <tr>
                    <td><label for="idEvenement">idEvenement :</label></td>
                    <td>
                        <input type="number" id="idEvenement" name="idEvenement" value="<?php echo $_POST['idEvenement'] ?>" readonly />
                        <span id="erreuridEvenement" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $evenement['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $evenement['description'] ?>" />
                        <span id="erreurdescription" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">image :</label></td>
                    <td>
                        <input type="text" id="image" name="image" value="<?php echo $evenement['image'] ?>" />
                        <span id="erreurimage" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date">date :</label></td>
                    <td>
                      <input type="date" id="date" name="date" value="<?php echo $evenement['date']->format('Y-m-d'); ?>" />
                        <span id="erreurdate" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="heure">heure :</label></td>
                    <td>
                        <input type="time" id="heure" name="heure" value="<?php echo $evenement['heure'] ?>" />
                        <span id="erreurheure" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="lieu">lieu :</label></td>
                    <td>
                        <input type="text" id="lieu" name="lieu" value="<?php echo $evenement['lieu'] ?>" />
                        <span id="erreurlieu" style="color: red"></span>
                    </td>
                </tr>


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>