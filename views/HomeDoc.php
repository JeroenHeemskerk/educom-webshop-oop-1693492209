<?php
include_once "views/BasicDoc.php";

class HomeDoc extends BasicDoc {
    protected function showHeader(){
        echo "Home";
    }
    protected function showContent(){
        ?>
        <p>Welkom bij de website.</p>
        <p>We hopen dat u ervan geniet.</p>
        <?php
    }
}