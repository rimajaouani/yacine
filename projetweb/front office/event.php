<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Événements</title>
  <!-- Ajoutez ici les liens vers les fichiers CSS nécessaires -->
  <link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
	<link href="css/global.css" rel="stylesheet">
	<link href="css/event.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz@9..144&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"> </script>
  <script>
    function showFullDescription(element) {
        const descriptionContainer = element.parentElement;
        const shortContent = descriptionContainer.querySelector('.short-content');
        const moreContent = descriptionContainer.querySelector('.more-content');
        const readMore = descriptionContainer.querySelector('.read-more');

        shortContent.style.display = 'none';
        moreContent.style.display = 'inline';
        readMore.style.display = 'none';
    }
  </script>


</head>
<body>
  <section id="header">
    <nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
      <div class="container-xl">
        <a class="navbar-brand fs-2 p-0 fw-bold text-white" href="index.html"><i class="fa fa-pencil col_pink me-1 align-middle"></i> art <span class="col_pink span_1">WEB</span> <br> <span class="font_12 span_2">DIGITAL ART</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mb-0 ms-auto">
          
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
        <li class="nav-item">
              <a class="nav-link" href="about.html">About </a>
            </li>
        
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                event
              </a>
              <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="event.html"> event</a></li>
                <li><a class="dropdown-item border-0" href="detail.html"> event Detail</a></li>
              </ul>
            </li>
        
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Blog
              </a>
              <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="blog.html"> Blog</a></li>
                <li><a class="dropdown-item border-0" href="blog_detail.html"> Blog Detail</a></li>
              </ul>
            </li>
        
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="cart.html"> Shopping Cart</a></li>
                <li><a class="dropdown-item border-0" href="checkout.html"> Checkout</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="event.html"> event</a></li>
                <li><a class="dropdown-item border-0" href="checkout.html"> Checkout</a></li>
              </ul>
            </li>
            
        <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
        
          </ul>
        </div>
      </div>
    </nav>
    </section>
    
    <section id="center" class="center_o bg_gray pt-2 pb-2">
     <div class="container-xl">
      <div class="row center_o1">
       <div class="col-md-5">
         <div class="center_o1l">
        <h2 class="mb-0">event</h2>
       </div>
       </div>
       <div class="col-md-7">
         <div class="center_o1r text-end">
        <h6 class="mb-0"><a href="#">Home</a> <span class="me-2 ms-2"><i class="fa fa-caret-right"></i></span> event</h6>
       </div>
       </div>
       <div class="center_o1r search-bar">
                    <form class="d-flex" method="GET" action="search.php"> <!-- Assurez-vous d'ajuster l'action selon votre besoin -->
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by event name" aria-label="Search">
                        <button type="submit" class="search-btn">&#128269;</button>
                    </form>
       </div>
      </div>
     </div>
    </section>
    
    <section id="event" class="p_4">
     <div class="container-xl">
      <div class="row event">
       <div class="col-md-9">
         <div class="event_1l">
          <p class="mb-0 mt-2">Showing 1–12 of 23 results</p>
       </div>
       </div>
       <div class="col-md-3">
         <div class="event">
            <select name="categories" class="form-select bg_gray col_light" required="">
          <option value="">Default Sorting</option>
          <option>Computer</option>
          <option>Business</option>
          <option>Chemistry</option>
          <option>Physics</option>
          <option>Photoshop</option>
          <option>Management</option>
          </select>
       </div>
       </div>
      </div>
 <!--Partie crud-->
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
        <th>IdEvenement</th>
        <th>Nom</th>
        <th>Description</th>
        <th>image</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Lieu</th>
    </tr>
    <?php
    foreach ($tab as $evenement) {
    ?>

        <tr>
            <td><?= $evenement['idEvenement']; ?></td>
            <td><?= $evenement['nom']; ?></td>
            <td>
              <div class="description-container">
              <img src="<?= basename($evenement['image']); ?>" class="event-image" alt="<?= $evenement['nom']; ?> image">
              <div class="description-short">
              <span class="short-content"><?= substr($evenement['description'], 0, 100); ?></span>
              <span class="more-content"><?= substr($evenement['description'], 100); ?></span>
              <span class="read-more" onclick="showFullDescription(this)">...</span>
              </div>
              <div class="description-full"><?= $evenement['description']; ?></div>
              </div>
            </td>
            <td><?= $evenement['image']; ?></td>
            <td><?= $evenement['date']; ?></td>
            <td><?= $evenement['heure']; ?></td>
            <td><?= $evenement['lieu']; ?></td>
            
            
        </tr>
    <?php
    }
    ?>
    

            </td>
        </tr>
   
</table>
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

    th, td {
      background-color: black;
      color: white;
    }

    .description-container {
      position: relative;
      height: auto;
      overflow: hidden;
    }

    .description-full {
      display: none;
    }

    .description-short {
      display: block;
    }

    .more-content {
      display: none;
    }

    .read-more {
      cursor: pointer;
      color: blue;
      display: inline;
    }

    .event-image {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 10px;
    }
  </style>
</body>
</html>
