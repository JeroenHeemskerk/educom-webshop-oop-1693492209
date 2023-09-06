<?php
include_once "views/BasicDoc.php";

class AboutDoc extends BasicDoc {
    protected function showTitleName(){
        echo 'about';
    }
    protected function showHeader(){
        echo "About";
    }
    protected function showContent(){
        ?>
        <p>Mijn naam is Stijn Engelmoer, Ik ben 19 jaar en ik zit nu bezig met een website te maken</p>
        <p>Mijn hobby's zijn:</p>
        <ul>
            <li>Formule 1 kijken</li>
            <li>lezen</li>
            <li>gamen</li>
        </ul>
        <?php
    }
}