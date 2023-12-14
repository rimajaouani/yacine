<?php

require_once 'C:\xampp\htdocs\projet\projetweb\back office\controller\eventC.php';
require_once 'C:\xampp\htdocs\projet\projetweb\back office\model\events.php';

$error = "";

// create
$events = null;


// create an instance of the controller
$eventC = new eventC();
if (
    isset($_POST["idEvenement"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["image"]) &&
    isset($_POST["date"])&&
    isset($_POST["heure"])&&
    isset($_POST["lieu"])
) {
    if (
        !empty($_POST['idEvenement']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["image"])&&
        !empty($_POST["date"])&&
        !empty($_POST["heure"]) &&
        !empty($_POST["lieu"]) 
    ) {
        var_dump($_POST['date']);
        $heure = intval($_POST['heure']);
        $events = new evenement(
            
            $_POST['idEvenement'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['image'],
            new DateTime($_POST['date']),
            $heure,
            $_POST['lieu']
        );
        $eventC->addevent($events);
        header('Location:listeevent.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>events </title>
    <script src="js/bootstrap.bundle.min.js">
      function showFullDescription(element) {
       const descriptionContainer = element.parentElement;
       const shortDescription = descriptionContainer.querySelector('.description-short');
       const fullDescription = descriptionContainer.querySelector('.description-full');

       shortDescription.style.display = 'none';
       fullDescription.style.display = 'block';
              }
  </script>
</head>

<body>
    <a href="listeevent.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="idEvenement">idEvenement:</label></td>
                <td>
                    <input type="number" id="idEvenement" name="idEvenement" />
                    <input type="hidden" name="idEvenement" value="0">
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom">nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurnom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="image">image :</label></td>
                <td>
                    <input type="text" id="image" name="image" />
                    <span id="erreurimage" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="heure">heure :</label></td>
                <td>
                    <input type="time" id="heure" name="heure" />
                    <span id="erreurheure" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="lieu">lieu :</label></td>
                <td>
                    <input type="text" id="lieu" name="lieu" />
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
</body>

</html>