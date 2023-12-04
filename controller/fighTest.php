<?php
$personnage1 = new personnage();
$personnage1->id = 21;
$ken = $personnage1->getPersonnageById();

$personnage2 = new personnage();
$personnage2->id = 20;
$ryu = $personnage2->getPersonnageById();
$personnage2->deadAttack($ken);
