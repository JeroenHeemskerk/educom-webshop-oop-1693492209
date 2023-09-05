<?php
include_once "../views/ProductDoc.php";

class WebshopDoc extends ProductDoc {
    protected function showContent(){echo '
        <div class="webshopitem">
        <p>naam: </p>
        <a href="index.php?page=webshopitem&row=" width="50%" height="50%"></a>
        </div>';
    }
}