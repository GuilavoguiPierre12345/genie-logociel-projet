<?php
 function matiere_semestre(array $liste_matiere)
 {
   ?>
    <select name="" id="">
        <?php foreach($liste_matiere as $valeur) ?>
            <option value="<?=$valeur?>"><?=$valeur?></option>
        <?php ?>
    </select>
   <?php
 }