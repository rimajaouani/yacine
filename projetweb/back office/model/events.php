<?php

class evenement {
  public ?int $idEvenement = null;
  public ?string $nom = null;
  public ?string $description = null;
  public ?string $image= null;
  public ?DateTime $date = null;
  public ?string $heure = null;
  public ?string $lieu = null;

  public function __construct($idEvenement, $nom, $description,$image, DateTime $date, $heure, $lieu) {
    $this->idEvenement = $idEvenement;
    $this->nom = $nom;
    $this->description = $description;
    $this->image= $image;

    // Convertir la chaîne de date en un objet DateTime
    $this->date = $date;

    $this->heure = $heure;
    $this->lieu = $lieu;
  }

  // Les autres méthodes restent inchangées...



  public function getidEvenement() {
    return $this->idEvenement;
  }

  public function setidEvenement($idEvenement) {
    $this->idEvenement = $idEvenement;
  }

  public function getnom() {
    return $this->nom;
  }

  public function setnom($nom) {
    $this->nom = $nom;
  }

  public function getdescription() {
    return $this->description;
  }

  public function setdescription($description) {
    $this->description= $description;
  }
  public function getimage() {
    return $this->image;
  }

  public function setimage($image) {
    $this->image= $image;
  }

  public function getdate() {
    return $this->date;
  }

  public function setdate($date) {
    $this->date = $date;
  }

  public function getheure() {
    return $this->heure;
  }

  public function setheure($heure) {
    $this->heure = $heure;
  }

  public function getlieu() {
    return $this->lieu;
  }

  public function setlieu($lieu) {
    $this->lieu = $lieu;
  }
  public function show() {
    echo "<table>";
    echo "<tr><th>idEvenement</th><th>nom</th><th>description</th><th>date</th><th>heure</th><th>lieu</th></tr>";
    echo "<tr><td>" . $this->idEvenement . "</td><td>" . $this->nom . "</td><td>" . $this->description. "</td><td>" .$this->image. "</td><td>" . $this->date. "</td><td>" . $this->heure. "</td><td>" . $this->lieu . "</td></tr>";
    echo "</table>";
  }
}

?>